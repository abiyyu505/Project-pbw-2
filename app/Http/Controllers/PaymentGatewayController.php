<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Midtrans\Notification;

class PaymentGatewayController extends Controller
{
    public function pay(Request $request){
        $room = Room::findOrFail($request->room_id);

        $days = max(1, (strtotime($request->check_out) - strtotime($request->check_in)) / 86400);


        $pricePerNight = $request->with_breakfast
            ? $room->price + (80000 * $room->capacity)
            : $room->price;

        $price = $pricePerNight * $days;

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'price' => $price,
        ]);

        $orderId = 'BOOK-' . $booking->id . '-' . time();

        // SSL anjing gw bypass lu bangsat
        putenv('CURL_SSL_NO_VERIFY=1');

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$is3ds = false;

        \Midtrans\Config::$curlOptions = [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER => [],
        ];
        // 2 jam cuman error SSL anjing

        try {
            $snapToken = \Midtrans\Snap::getSnapToken([
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int) round($price)
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                ]
            ]);
            Log::info('SNAP TOKEN', ['token' => $snapToken]);

            $payment = Payment::create([
                'booking_id' => $booking->id,
                'order_id' => $orderId,
                'amount' => $price,
                'snap_token' => $snapToken,
                'status' => 'pending'
            ]);
            

            return response()->json([
                'snap_token' => $snapToken
            ]);

        } catch (\Exception $e) {
            Log::error('MIDTRANS ERROR', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json([
                'message' => 'Failed to create payment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function callback(Request $request){
        Log::info('MIDTRANS CALLBACK RAW', $request->all());

        $notif = new Notification();

        $orderId = $notif->order_id;
        $transactionStatus = $notif->transaction_status;
        $paymentType = $notif->payment_type;
        $fraudStatus = $notif->fraud_status ?? null;

        $payment = Payment::where('order_id', $orderId)->first();

        if (! $payment) {
            Log::error('PAYMENT NOT FOUND', ['order_id' => $orderId]);
            return response()->json(['message' => 'Payment not found'], 404);
        }

        $booking = $payment->booking;

        if ($transactionStatus == 'capture') {
            if ($paymentType == 'credit_card' && $fraudStatus == 'challenge') {
                $payment->update(['status' => 'pending']);
            } else {
                $payment->update(['status' => 'paid']);
                $booking->update(['status' => 'confirmed']);
            }
        } elseif ($transactionStatus == 'settlement') {
            $payment->update(['status' => 'paid']);
            $booking->update(['status' => 'confirmed']);
        } elseif (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
            $payment->update(['status' => 'failed']);
            $booking->update(['status' => 'cancelled']);
        }

        return response()->json(['message' => 'OK']);
    }
}

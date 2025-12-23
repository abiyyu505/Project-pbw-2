<div class="w-full flex flex-col">
    <div class="w-full bg-white rounded-xl h-96 mt-8 px-10 py-5 flex flex-col shadow-xl z-10">
        <h1 class="text-xl font-semibold">All History</h1>
        {{-- history section --}}
            <div class="flex w-full h-full mt-10 ">
                <div class="flex flex-col gap-5">
                    @if ($bookings_history->isEmpty())
                        <div>
                            <p>You haven't booked yet, try booking some!</p>
                        </div>
                    @else
                    <table class="w-full border-collapse overflow-y-auto max-h-60 flex rounded-lg">
                        <tr class="">
                            <th class="px-4 bg-blue-700 text-white  py-3 text-center">No</th>
                            <th class="px-4 bg-blue-700 text-white  py-3 text-center">Hotel Name</th>
                            <th class="px-4 bg-blue-700 text-white  py-3 text-center">Room Type</th>
                            <th class="px-4 bg-blue-700 text-white  py-3 text-center">Check In</th>
                            <th class="px-4 bg-blue-700 text-white  py-3 text-center">Check Out</th>
                            <th class="px-4 bg-blue-700 text-white  py-3 text-center">Status</th>
                        </tr>
                        @foreach ($bookings_history as $booking)
                        @if ($loop->iteration % 2 == 0)
                            <tr class="bg-gray-100">
                                <td class="px-11 py-3 text-center"> {{ $loop->iteration }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->room->hotel->name }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->room->room_type }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->check_in }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->check_out }} </td>
                                <td class="px-11 py-3 text-center"><span x-data="{status: '{{ $booking->status }}'}" :class="{'bg-green-300 text-green-700': status === 'completed' || status === 'paid', 'bg-gray-300 text-gray-700': status === 'pending', 'bg-red-300 text-red-700': status === 'canceled'}" class="flex items-center justify-center px-1 font-semibold rounded-full">{{ $booking->status }}</span></td>
                            </tr>
                        @else
                            <tr class="bg-white hover:bg-gray-100">
                                <td class="px-11 py-3 text-center"> {{ $loop->iteration }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->room->hotel->name }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->room->room_type }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->check_in }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->check_out }} </td>
                                <td class="px-11 py-3 text-center"><span x-data="{status: '{{ $booking->status }}'}" :class="{'bg-green-300 text-green-700': status === 'completed' || status === 'paid', 'bg-gray-300 text-gray-700': status === 'pending', 'bg-red-300 text-red-700': status === 'canceled'}" class="flex items-center justify-center px-1 font-semibold rounded-full">{{ $booking->status }}</span></td>
                            </tr>
                        @endif
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
    </div>
</div>
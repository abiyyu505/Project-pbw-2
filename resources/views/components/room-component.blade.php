<div class="border border-gray-300 w-full rounded-xl px-10 py-5">
    <h1 class="text-2xl font-bold"> {{ $room->room_type }} </h1>
    <div class="flex gap-10">
        <div class=" overflow-hidden rounded-xl w-80 mt-5 h-52">
            <img src="{{ asset('assets/room-pict.webp') }}" class=" object-cover w-full h-full" alt="">
        </div>
        <div class="mt-5 rounded-xl overflow-hidden">
            <table class="border-collapse w-full rounded-xl">
                <tr class="bg-gray-100">
                    <th class="pr-20 pl-2 py-2 border">Room Option(s)</th>
                    <th class="px-20 py-2 border">Guest(s)</th>
                    <th class="pl-20 pr-2 py-2 border">Price/room/night</th>
                    <th class="px-20 py-2 border"></th>
                </tr>


                {{-- without breakfast --}}
                <tr>
                    <td class="pr-20 pl-2 pb-10 pt-3 border">
                        <p class="text-xs"> {{ $room->room_type . ' - Room Only' }} </p>
                        <p class="mt-2 font-bold text-sm">Without Breakfast</p>
                        <div class="flex text-xs mt-2 items-center gap-1">
                            @php
                                $bed = 1;
                                if ($room->capacity > 2) {
                                    $bed = 2;
                                }
                            @endphp
                            @for ($i = 1; $i <= $bed; $i++)
                                <i class="" data-lucide="bed-single"></i>
                            @endfor
                            <p> {{ $bed . ' queen bed' }} </p>
                        </div>
                    </td>
                    <td class="px-20 py-2 border">
                        <p class="flex text-center items-center justify-center  text-gray-400">  
                            @for ($i = 1; $i <= $room->capacity; $i++)
                                @svg('bi-person-fill')
                            @endfor
                        </p>
                    </td>
                    <td class=" pl-24 pr-2 text-end  py-2 border font-bold text-blue-700 text-lg">
                        @php
                            $priceWithoutBreakfastRaw = $room->price;
                            $priceWithoutBreakfastFormat = number_format($priceWithoutBreakfastRaw, 0, ',', '.');
                        @endphp
                        <p class="">{{ 'Rp ' . $priceWithoutBreakfastFormat }} </p>
                        <p class="text-black text-xs font-medium ">Exclude taxes & fees</p>
                    </td>
                    <td class="px-10 py-2 border">
                        <div x-data="paymentHandler({
                                roomId: {{ $room->id }},
                                basePrice: {{ $room->price }},
                                breakfastPrice: {{ $room->price + (80000 * $room->capacity) }},
                                withBreakfast: false
                            })">
                            <div @click="open = true" class=" cursor-pointer py-1 bg-blue-700 w-max text-center text-white rounded-md px-2 hover:bg-blue-800 transition-all duration-300">
                                <p>Book Now</p>
                            </div>

                            <div x-cloak x-show="open" @click="open = false" class="fixed bg-black/20 w-full h-full top-0 left-0 z-10"></div>

                            {{-- payment form modal --}}
                            <div x-cloak x-show="open" @click.outside="open = false" class="  px-20 py-10 flex flex-col z-20 fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white w-[1000px] h-[600px] rounded-xl shadow-lg ">
                                
                                <div class="flex items-center">
                                    {{-- choose check in date --}}
                                    <div x-init="
                                        flatpickr($refs.checkinPicker, {
                                            inline: true,
                                            dateFormat: 'Y-m-d',
                                            minDate: 'today',
                                            onChange: (dates, dateStr) => checkInDate = dateStr
                                        })"
                                        class=" w-full h-full flex flex-col items-center gap-2">
                                        <h1 class=" text-xl font-bold ">Choose Check In Date</h1>
                                        <div x-ref="checkinPicker" class="calendar-modal w-full"></div>
                                    </div>
    
                                    {{-- choose check out date --}}
                                    <div x-init="
                                        flatpickr($refs.checkoutPicker, {
                                            inline: true,
                                            dateFormat: 'Y-m-d',
                                            minDate: checkInDate,
                                            onChange: (dates, dateStr) => checkOutDate = dateStr
                                        })"
                                        class=" w-full h-full flex flex-col items-center gap-2 ">
                                        <h1 class=" text-xl font-bold ">Choose Check Out Date</h1>
                                        <div x-ref="checkoutPicker" class="calendar-modal w-full"></div>
                                    </div>
                                </div>


                                {{-- total amount --}}
                                <div class="  w-full  flex items-center justify-between mt-auto">
                                    <p class="text-xl font-bold">Total Amount</p>
                                    <p class="text-blue-700 text-xl font-bold" x-text="`Rp ${totalPrice.toLocaleString('id-ID')}`"></p>
                                </div>

                                {{-- pay now button --}}
                                <div @click="payNow()" :style="{backgroundColor: nights > 0 ? '#1d4ed8' : '#88909f',cursor: nights > 0 && !loading ? 'pointer' : 'not-allowed'}" class="w-full py-3 mt-5 transition-all duration-300 flex rounded-md items-center justify-center text-white font-bold text-xl">
                                    <p>Pay Now</p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>


                {{-- with breakfast --}}
                <tr>
                    <td class="pr-20 pl-2 pb-10 pt-3 border">
                        <p class="text-xs"> {{ $room->room_type . ' - Room Only' }} </p>
                        <p class="mt-2 font-bold text-sm"> {{ 'Breakfast for ' . $room->capacity }} </p>
                        <div class="flex text-xs mt-2 items-center gap-1">
                            @php
                                $bed = 1;
                                if ($room->capacity > 2) {
                                    $bed = 2;
                                }
                            @endphp
                            @for ($i = 1; $i <= $bed; $i++)
                                <i class="" data-lucide="bed-single"></i>
                            @endfor
                            <p> {{ $bed . ' queen bed' }} </p>
                        </div>
                    </td>
                    <td class="px-20 py-2 border">
                        <p class="flex text-center items-center justify-center  text-gray-400">  
                            @for ($i = 1; $i <= $room->capacity; $i++)
                                @svg('bi-person-fill')
                            @endfor
                        </p>
                    </td>
                    <td class=" pl-24 pr-2 text-end  py-2 border font-bold text-blue-700 text-lg">
                        @php
                            $priceWithBreakfastRaw = $room->price + 80000 * $room->capacity;
                            $priceWithBreakfastFormat = number_format($priceWithBreakfastRaw, 0, ',', '.');
                        @endphp
                        <p class="">{{ 'Rp ' . $priceWithBreakfastFormat }} </p>
                        <p class="text-black text-xs font-medium ">Exclude taxes & fees</p>
                    </td>
                    <td class="px-10 py-2 border">
                        <div x-data="paymentHandler({
                                roomId: {{ $room->id }},
                                basePrice: {{ $room->price }},
                                breakfastPrice: {{ $room->price + (80000 * $room->capacity) }},
                                withBreakfast: true
                            })">
                            <div @click="open = true" class=" cursor-pointer py-1 bg-blue-700 w-max text-center text-white rounded-md px-2 hover:bg-blue-800 transition-all duration-300">
                                <p>Book Now</p>
                            </div>

                            <div x-cloak x-show="open" @click="open = false" class="fixed bg-black/20 w-full h-full top-0 left-0 z-10"></div>

                            {{-- payment form modal --}}
                            <div x-cloak x-show="open" @click.outside="open = false" class="  px-20 py-10 flex flex-col z-20 fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white w-[1000px] h-[600px] rounded-xl shadow-lg ">
                                
                                <div class="flex items-center">
                                    {{-- choose check in date --}}
                                    <div x-init="
                                        flatpickr($refs.checkinPicker, {
                                            inline: true,
                                            dateFormat: 'Y-m-d',
                                            minDate: 'today',
                                            onChange: (dates, dateStr) => checkInDate = dateStr
                                        })"
                                        class=" w-full h-full flex flex-col items-center gap-2">
                                        <h1 class=" text-xl font-bold ">Choose Check In Date</h1>
                                        <div x-ref="checkinPicker" class="calendar-modal w-full"></div>
                                    </div>
    
                                    {{-- choose check out date --}}
                                    <div x-init="
                                        flatpickr($refs.checkoutPicker, {
                                            inline: true,
                                            dateFormat: 'Y-m-d',
                                            minDate: checkInDate,
                                            onChange: (dates, dateStr) => checkOutDate = dateStr
                                        })"
                                        class=" w-full h-full flex flex-col items-center gap-2">
                                        <h1 class=" text-xl font-bold ">Choose Check Out Date</h1>
                                        <div x-ref="checkoutPicker" class="calendar-modal w-full"></div>
                                    </div>
                                </div>


                                {{-- total amount --}}
                                <div class="  w-full  flex items-center justify-between mt-auto">
                                    <p class="text-xl font-bold">Total Amount</p>
                                    <p class="text-blue-700 text-xl font-bold" x-text="`Rp ${totalPrice.toLocaleString('id-ID')}`"></p>
                                </div>

                                {{-- pay now button --}}
                                <div @click="payNow()" :style="{backgroundColor: nights > 0 ? '#1d4ed8' : '#88909f',cursor: nights > 0 && !loading ? 'pointer' : 'not-allowed'}" class="w-full py-3 mt-5 transition-all duration-300 flex rounded-md items-center justify-center text-white font-bold text-xl">
                                    <p>Pay Now</p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script>
function paymentHandler(room) {
    return {
        checkInDate: null,
        checkOutDate: null,
        open: false,
        loading: false,

        roomId: room.roomId,
        basePrice: room.basePrice,
        breakfastPrice: room.breakfastPrice,
        withBreakfast: room.withBreakfast,

        get pricePerNight() {
            return this.withBreakfast
                ? this.breakfastPrice
                : this.basePrice;
        },

        get nights() {
            if (!this.checkInDate || !this.checkOutDate) return 0;
            const diff = (new Date(this.checkOutDate) - new Date(this.checkInDate)) / 86400000;
            return diff > 0 ? diff : 0;
        },

        get totalPrice() {
            return this.nights * this.pricePerNight;
        },

        async payNow() {
            if (this.nights === 0 || this.loading) return;

            this.loading = true;

            try {
                const res = await fetch('{{ route('payment.pay') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        room_id: this.roomId,
                        check_in: this.checkInDate,
                        check_out: this.checkOutDate,
                        with_breakfast: this.withBreakfast
                    })
                });

                if (!res.ok) {
                    console.error(await res.text());
                    alert('Payment failed');
                    return;
                }

                const data = await res.json();
                this.open = false;
                snap.pay(data.snap_token);

            } finally {
                this.loading = false;
            }
        }
    }
}
</script>


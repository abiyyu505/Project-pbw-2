<div class="w-full flex flex-col">
    <div class="w-full bg-white rounded-xl h-96 mt-8 px-10 py-5 flex flex-col shadow-xl z-10">
        {{-- overview button --}}
        <div x-data="{section: 'in progress'}" class="flex flex-col w-full">
            <div class="flex items-center justify-around w-full">
                <div @click="section = 'in progress'" :class="section === 'in progress' ? 'bg-blue-700/30' : 'bg-gray-100'" class="flex items-center border border-gray-300 rounded-full px-11 py-2 justify-center cursor-pointer hover:bg-blue-700/30 transition-all duration-300 text-lg font-semibold">
                    <button>In Progress</button>
                </div>
                <div @click="section = 'history'" :class="section === 'history' ? 'bg-blue-700/30' : 'bg-gray-100'" class="flex items-center border border-gray-300 rounded-full px-11 bg-gray-100 py-2 justify-center cursor-pointer hover:bg-blue-700/30 transition-all duration-300 text-lg font-semibold">
                    <button>History</button>
                </div>
                <div class="flex items-center border border-gray-300 rounded-full px-11 bg-gray-100 py-2 justify-center cursor-pointer hover:bg-blue-700/30 transition-all duration-300 text-lg font-semibold">
                    <button>Complited</button>
                </div>
                <div class="flex items-center border border-gray-300 rounded-full px-11 bg-gray-100 py-2 justify-center cursor-pointer hover:bg-blue-700/30 transition-all duration-300 text-lg font-semibold">
                    <button>Canceled</button>
                </div>
                <div class="flex items-center border border-gray-300 rounded-full px-11 bg-gray-100 py-2 justify-center cursor-pointer hover:bg-blue-700/30 transition-all duration-300 text-lg font-semibold">
                    <button>Draf</button>
                </div>
            </div>


            <div class="flex w-full h-full mt-10 " x-show="section === 'in progress'">
                <div class="flex flex-col gap-5">
                    @if ($bookings_pending->isEmpty())
                        <div>
                            <p>You haven't booked yet, try booking some!</p>
                        </div>
                    @else
                    <table class="w-full border-collapse overflow-y-auto max-h-60 flex rounded-lg">
                        <tr>
                            <th class="px-6 bg-blue-700 text-white  py-3 text-center">No</th>
                            <th class="px-6 bg-blue-700 text-white  py-3 text-center">Hotel Name</th>
                            <th class="px-6 bg-blue-700 text-white  py-3 text-center">Room Type</th>
                            <th class="px-6 bg-blue-700 text-white  py-3 text-center">Check In Date</th>
                            <th class="px-6 bg-blue-700 text-white  py-3 text-center">Check Out Date</th>
                            <th class="px-6 bg-blue-700 text-white  py-3 text-center">Status</th>
                        </tr>
                        @foreach ($bookings_pending as $booking)
                        @if ($loop->iteration % 2 == 0)
                            <tr class="bg-gray-200">
                                <td class="px-10 py-2 text-center"> {{ $loop->iteration }} </td>
                                <td class="px-10 py-2 text-center"> {{ $booking->room->hotel->name }} </td>
                                <td class="px-10 py-2 text-center"> {{ $booking->room->room_type }} </td>
                                <td class="px-10 py-2 text-center"> {{ $booking->check_in }} </td>
                                <td class="px-10 py-2 text-center"> {{ $booking->check_out }} </td>
                                <td class="px-10 py-2 text-center"> {{ $booking->status }} </td>
                            </tr>
                        @else
                            <tr class="bg-white hover:bg-gray-200">
                                <td class="px-10 py-2 text-center"> {{ $loop->iteration }} </td>
                                <td class="px-10 py-2 text-center"> {{ $booking->room->hotel->name }} </td>
                                <td class="px-10 py-2 text-center"> {{ $booking->room->room_type }} </td>
                                <td class="px-10 py-2 text-center"> {{ $booking->check_in }} </td>
                                <td class="px-10 py-2 text-center"> {{ $booking->check_out }} </td>
                                <td class="px-10 py-2 text-center"> {{ $booking->status }} </td>
                            </tr>
                        @endif
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            <div class="flex w-full h-full mt-10 bg-blue-500" x-show="section === 'history'">
                <p>ini history</p>
            </div>


        </div>
    </div>
</div>
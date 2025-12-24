<div class="w-full flex flex-col">
    <div class="w-full bg-white rounded-xl h-96 mt-8 px-10 py-5 flex flex-col shadow-xl z-10">
        {{-- overview button --}}
        <div x-data="{section: 'in progress'}" class="flex flex-col w-full">
            <div class="flex items-center justify-around w-full">
                <div @click="section = 'in progress'" :class="section === 'in progress' ? 'bg-blue-700/30' : 'bg-gray-100'" class="flex items-center border border-gray-300 rounded-full px-11 py-2 justify-center cursor-pointer hover:bg-blue-700/30 transition-all duration-300 text-lg font-semibold">
                    <button>In Progress</button>
                </div>
                <div @click="section = 'completed'" :class="section === 'completed' ? 'bg-green-700/30 text-green-700' : 'bg-gray-100'" class="flex items-center border border-gray-300 rounded-full px-11 py-2 justify-center cursor-pointer hover:bg-blue-700/30 transition-all duration-300 text-lg font-semibold">
                    <button>Completed</button>
                </div>
                <div @click="section = 'canceled'" :class="section === 'canceled' ? 'bg-red-700/30 text-red-700' : 'bg-gray-100'" class="flex items-center border border-gray-300 rounded-full px-11 py-2 justify-center cursor-pointer hover:bg-blue-700/30 transition-all duration-300 text-lg font-semibold">
                    <button>Canceled</button>
                </div>
                <div @click="section = 'history'" :class="section === 'history' ? 'bg-blue-700/30' : 'bg-gray-100'" class="flex items-center border border-gray-300 rounded-full px-11 py-2 justify-center cursor-pointer hover:bg-blue-700/30 transition-all duration-300 text-lg font-semibold">
                    <button>History</button>
                </div>
                <div class="flex items-center border border-gray-300 rounded-full px-11 py-2 justify-center cursor-pointer hover:bg-blue-700/30 transition-all duration-300 text-lg font-semibold">
                    <button>Draf</button>
                </div>
            </div>

            
            {{-- progress section --}}
            <div class="flex w-full h-full mt-10 " x-cloak x-show="section === 'in progress'">
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
                            <th class="px-6 bg-blue-700 text-white  py-3 text-center">Check In</th>
                            <th class="px-6 bg-blue-700 text-white  py-3 text-center">Check Out</th>
                            <th class="px-6 bg-blue-700 text-white  py-3 text-center">Status</th>
                        </tr>
                        @foreach ($bookings_pending as $booking)
                        @if ($loop->iteration % 2 == 0)
                            <tr class="bg-gray-100">
                                <td class="px-11 py-2 text-center"> {{ $loop->iteration }} </td>
                                <td class="px-11 py-2 text-center"> {{ $booking->room->hotel->name }} </td>
                                <td class="px-11 py-2 text-center"> {{ $booking->room->room_type }} </td>
                                <td class="px-11 py-2 text-center"> {{ $booking->check_in }} </td>
                                <td class="px-11 py-2 text-center"> {{ $booking->check_out }} </td>
                                <td class="px-11 py-2 text-center"><span x-data="{status: '{{ $booking->status }}'}" :class="{'bg-green-300 text-green-700': status === 'completed', 'bg-green-300 text-green-700': status === 'paid', 'bg-gray-300 text-gray-700': status === 'pending', 'bg-red-300 text-red-700': status === 'canceled'}" class=" flex items-center justify-center px-10 font-semibold rounded-full">{{ $booking->status }}</span></td>
                            </tr>
                        @else
                            <tr class="bg-white hover:bg-gray-100">
                                <td class="px-11 py-2 text-center"> {{ $loop->iteration }} </td>
                                <td class="px-11 py-2 text-center"> {{ $booking->room->hotel->name }} </td>
                                <td class="px-11 py-2 text-center"> {{ $booking->room->room_type }} </td>
                                <td class="px-11 py-2 text-center"> {{ $booking->check_in }} </td>
                                <td class="px-11 py-2 text-center"> {{ $booking->check_out }} </td>
                                <td class="px-11 py-2 text-center"><span x-data="{status: '{{ $booking->status }}'}" :class="{'bg-green-300 text-green-700': status === 'completed', 'bg-green-300 text-green-700': status === 'paid', 'bg-gray-300 text-gray-700': status === 'pending', 'bg-red-300 text-red-700': status === 'canceled'}" class=" flex items-center justify-center px-10  font-semibold rounded-full">{{ $booking->status }}</span></td>
                            </tr>
                        @endif
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>


            {{-- history section --}}
            <div class="flex w-full h-full mt-10 " x-cloak x-show="section === 'history'">
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


            {{-- completed section --}}
            <div class="flex w-full h-full mt-10 " x-cloak x-show="section === 'completed'">
                <div class="flex flex-col gap-5">
                    @if ($bookings_completed->isEmpty())
                        <div class="bg-transparent">
                            <p>You haven't booked yet, try booking some!</p>
                        </div>
                    @else
                    <table class="w-full border-collapse overflow-y-auto max-h-60 flex rounded-lg">
                        <tr class="bg-blue-700">
                            <th class="px-4 text-white  py-3 text-center">No</th>
                            <th class="px-4 text-white  py-3 text-center">Hotel Name</th>
                            <th class="px-4 text-white  py-3 text-center">Room Type</th>
                            <th class="px-4 text-white  py-3 text-center">Check In</th>
                            <th class="px-4 text-white  py-3 text-center">Check Out</th>
                            <th class="px-4 text-white  py-3 text-center">Status</th>
                        </tr>
                        @foreach ($bookings_completed as $booking)
                        @if ($loop->iteration % 2 == 0)
                            <tr class="bg-gray-100">
                                <td class="px-11 py-3 text-center"> {{ $loop->iteration }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->room->hotel->name }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->room->room_type }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->check_in }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->check_out }} </td>
                                <td class="px-11 py-3 text-center"><span x-data="{status: '{{ $booking->status }}'}" :class="{'bg-green-300 text-green-700': status === 'completed', 'bg-gray-300 text-gray-700': status === 'pending', 'bg-red-300 text-red-700': status === 'canceled'}" class="flex items-center justify-center px-1 font-semibold rounded-full">{{ $booking->status }}</span></td>
                            </tr>
                        @else
                            <tr class="bg-white hover:bg-gray-100">
                                <td class="px-11 py-3 text-center"> {{ $loop->iteration }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->room->hotel->name }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->room->room_type }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->check_in }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->check_out }} </td>
                                <td class="px-11 py-3 text-center"><span x-data="{status: '{{ $booking->status }}'}" :class="{'bg-green-300 text-green-700': status === 'completed', 'bg-gray-300 text-gray-700': status === 'pending', 'bg-red-300 text-red-700': status === 'canceled'}" class="flex items-center justify-center px-1 font-semibold rounded-full">{{ $booking->status }}</span></td>
                            </tr>
                        @endif
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>


            {{-- canceled section --}}
            <div class="flex w-full h-full mt-10 " x-cloak x-show="section === 'canceled'">
                <div class="flex flex-col gap-5">
                    @if ($bookings_canceled->isEmpty())
                        <div class="bg-transparent">
                            <p>You haven't booked yet, try booking some!</p>
                        </div>
                    @else
                    <table class="w-full border-collapse overflow-y-auto max-h-60 flex rounded-lg">
                        <tr class="bg-blue-700">
                            <th class="px-4 text-white  py-3 text-center">No</th>
                            <th class="px-4 text-white  py-3 text-center">Hotel Name</th>
                            <th class="px-4 text-white  py-3 text-center">Room Type</th>
                            <th class="px-4 text-white  py-3 text-center">Check In</th>
                            <th class="px-4 text-white  py-3 text-center">Check Out</th>
                            <th class="px-4 text-white  py-3 text-center">Status</th>
                        </tr>
                        @foreach ($bookings_canceled as $booking)
                        @if ($loop->iteration % 2 == 0)
                            <tr class="bg-gray-100">
                                <td class="px-11 py-3 text-center"> {{ $loop->iteration }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->room->hotel->name }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->room->room_type }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->check_in }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->check_out }} </td>
                                <td class="px-11 py-3 text-center"><span x-data="{status: '{{ $booking->status }}'}" :class="{'bg-green-300 text-green-700': status === 'complete', 'bg-gray-300 text-gray-700': status === 'pending', 'bg-red-300 text-red-700': status === 'canceled'}" class="flex items-center justify-center px-1 font-semibold rounded-full">{{ $booking->status }}</span></td>
                            </tr>
                        @else
                            <tr class="bg-white hover:bg-gray-100">
                                <td class="px-11 py-3 text-center"> {{ $loop->iteration }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->room->hotel->name }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->room->room_type }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->check_in }} </td>
                                <td class="px-11 py-3 text-center"> {{ $booking->check_out }} </td>
                                <td class="px-11 py-3 text-center"><span x-data="{status: '{{ $booking->status }}'}" :class="{'bg-green-300 text-green-700': status === 'complete', 'bg-gray-300 text-gray-700': status === 'pending', 'bg-red-300 text-red-700': status === 'canceled'}" class="flex items-center justify-center px-1 font-semibold rounded-full">{{ $booking->status }}</span></td>
                            </tr>
                        @endif
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
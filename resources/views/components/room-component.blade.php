<div class="border border-gray-300 w-full h-96 rounded-xl px-10 py-5">
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
                <tr>
                    <td class="pr-20 pl-2 pb-10 pt-3 border">
                        <p class="text-xs"> {{ $room->room_type . ' - Room Only' }} </p>
                        <p class="mt-2 font-bold text-sm">Without Breakfast</p>
                        <div class="flex text-xs mt-2">
                            <i class="" data-lucide="bed-single"></i>
                            <p>1 queen bed</p>
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
                        <p class="">{{ 'Rp ' . number_format(($room->price), 0, ',', '.') }} </p>
                        <p class="text-black text-xs font-medium ">Exclude taxes & fees</p>
                    </td>
                    <td class="px-10 py-2 border">
                        <div class=" cursor-pointer py-1 bg-blue-700 w-max text-center text-white rounded-md px-2 hover:bg-blue-800 transition-all duration-300">Book Now</div>
                    </td>
                </tr>
                <tr>
                    <td class="pr-20 pl-2 pb-10 pt-3 border">
                        <p class="text-xs"> {{ $room->room_type . ' - Room Only' }} </p>
                        <p class="mt-2 font-bold text-sm"> {{ 'Breakfast for ' . $room->capacity }} </p>
                        <div class="flex text-xs mt-2">
                            <i class="" data-lucide="bed-single"></i>
                            <p>1 queen bed</p>
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
                        <p class="">{{ 'Rp ' . number_format(($room->price + 80000), 0, ',', '.') }} </p>
                        <p class="text-black text-xs font-medium ">Exclude taxes & fees</p>
                    </td>
                    <td class="px-10 py-2 border">
                        <div class=" cursor-pointer py-1 bg-blue-700 w-max text-center text-white rounded-md px-2 hover:bg-blue-800 transition-all duration-300">Book Now</div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
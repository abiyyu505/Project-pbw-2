<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel - detail</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#ededed] scroll-smooth">
    <div class="w-full relative overflow-hidden px-20 py-10">
        {{-- banner background --}}
        <div class=" w-full absolute -z-10 inset-0 h-96 overflow-hidden bg-cover">
            <div class="bg-black/25 inset-0 top-0 left-0 absolute w-full h-full object-cover"></div>
            <img class=" object-cover w-full h-full" src="{{ asset('assets/dark-blue-sky.webp') }}" alt="">
        </div>

        <div class="w-full flex gap-20 items-center">
            <div class="">
                <a href="{{ route('user.main') }}" class="backdrop-blur-sm flex items-center shadow-xl gap-3 bg-white/5 text-blue-700 hover:text-white rounded-full text-center px-5 text-md py-2 hover:bg-blue-500 font-bold transition-all duration-300"> <x-heroicon-o-home class="w-6 h-6" /> <span>Home</span></a>
            </div>

            {{-- user profile --}}
            <div class=" ml-auto">
                <div class="flex items-center w-full">

                    {{-- user profile button --}}
                    <x-dropdown align="right" width="48" > 
                        <x-slot name='trigger'>
                            <button class=" backdrop-blur-lg flex space-x-3 items-center shadow-xl bg-white/5 text-white rounded-full text-center px-5 text-md py-2 hover:bg-blue-500 transition-all duration-300">
                                <div class="w-8 h-8 rounded-full bg-white overflow-hidden shrink-0 text-gray-700 flex justify-center items-center">
                                    @svg('bi-person-fill')
                                </div>
    
                                <span class="">{{ Auth::user()->name }}</span>
                                <div class="flex w-5 h-5 ">
                                    @svg('eva-arrow-ios-downward-outline')
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" class="text-red-500 font-semibold hover:bg-red-500 hover:text-white"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>

        <div class="w-full bg-white rounded-2xl overflow-hidden mt-20">
            {{-- image of hotel --}}
            <div class="w-full h-80  grid grid-cols-5 grid-rows-2 gap-2 ">
                <div class="overflow-hidden col-span-2 row-span-2 group relative">
                    <div class="absolute top-0 left-0 group-hover:bg-black/30 transition-all duration-300 w-full h-full"></div>
                    <img src="{{ asset('assets/big-detail.png') }}" class="  object-cover w-full h-full" alt="">
                </div>
                
                <div class="overflow-hidden group relative">
                    <div class="absolute top-0 left-0 group-hover:bg-black/30 transition-all duration-300 w-full h-full"></div>
                    <img src="{{ asset('assets/detail-1.png') }}" class=" object-cover w-full h-full " alt="">
                </div>
                <div class="overflow-hidden group relative">
                    <div class="absolute top-0 left-0 group-hover:bg-black/30 transition-all duration-300 w-full h-full"></div>
                    <img src="{{ asset('assets/detail-2.png') }}" class=" object-cover w-full h-full " alt="">
                </div>
                <div class="overflow-hidden group relative">
                    <div class="absolute top-0 left-0 group-hover:bg-black/30 transition-all duration-300 w-full h-full"></div>
                    <img src="{{ asset('assets/detail-3.png') }}" class=" object-cover w-full h-full " alt="">
                </div>

                <div class="overflow-hidden group relative">
                    <div class="absolute top-0 left-0 group-hover:bg-black/30 transition-all duration-300 w-full h-full"></div>
                    <img src="{{ asset('assets/detail-4.png') }}" class=" object-cover w-full h-full " alt="">
                </div>
                <div class="overflow-hidden group relative">
                    <div class="absolute top-0 left-0 group-hover:bg-black/30 transition-all duration-300 w-full h-full"></div>
                    <img src="{{ asset('assets/detail-5.png') }}" class=" object-cover w-full h-full " alt="">
                </div>
                <div class="overflow-hidden group relative">
                    <div class="absolute top-0 left-0 group-hover:bg-black/30 transition-all duration-300 w-full h-full"></div>
                    <img src="{{ asset('assets/detail-6.png') }}" class=" object-cover w-full h-full " alt="">
                </div>
            </div>


            {{-- container of hotel --}}
            <div class="mt-10 px-10  py-5">

                {{-- hotel name --}}
                <div class="w-full flex justify-between">
                    <div class="flex flex-col gap-3">
                        <h1 class="text-3xl font-bold "> {{ $hotel->name }} </h1>
                        <div class="flex items-center">
                            <p class="bg-blue-700/10 text-sm px-2  text-blue-600 w-max rounded-full">Hotels</p>
                            @php
                                if ($priceAvg < 200000) {
                                    $bintang = 1;
                                }elseif ($priceAvg >= 200000 && $priceAvg < 300000) {
                                    $bintang = 2;
                                }
                                 elseif ($priceAvg >= 300000 && $priceAvg < 600000) {
                                    $bintang = 3;
                                }
                                elseif ($priceAvg >= 600000 && $priceAvg < 1000000) {
                                    $bintang = 4;
                                }
                                elseif ($priceAvg >= 1000000) {
                                    $bintang = 5;
                                }
                            @endphp
                            
                            <div class="flex items-center ml-3">
                                @for ($i = 1; $i <= $bintang; $i++)
                                    <p class="text-yellow-500 text-2xl">★</p>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <p class="text-2xl text-blue-700 font-bold">Rp {{ number_format($priceAvg, 0, ',', '.') }}</p>
                        <a  href="#select-room" class="text-white font-bold bg-blue-700 px-2 py-2 rounded-md text-xl cursor-pointer hover:bg-blue-800 transition-all duration-300">
                            <p>Select Room</p>
                        </a>
                    </div>
                </div>


                {{-- description --}}
                <div class="w-full grid grid-cols-3 h-96 gap-3 mt-10">
                    
                    {{-- description container --}}
                    <div class="border px-5 py-5 rounded-xl border-gray-300">
                        <div class="flex items-center gap-3">
                            <p class="text-3xl text-blue-700 font-semibold ">9,0<span class="text-sm font-medium">/10</span></p>
                            <div>
                                <p class="font-semibold text-xl">Exceptional</p>
                                <p class="text-blue-700 font-bold">1.303 reviews</p>
                            </div>
                        </div>
                        <h1 class="font-bold text-xl mt-5">Hotel Description</h1>
                        <p> {{ $hotel->description }} </p>
                        
                        {{-- static review --}}
                        <div class="flex flex-col border mt-3 border-gray-300 rounded-md px-2 py-2">
                            <div class="flex items-center justify-between  ">
                                <p class="font-bold">Yudi P.</p>
                                <p class="bg-blue-700/10 text-blue-700 px-1 rounded-lg text-sm font-semibold">10,0/10</p>
                            </div>
                            <div class="">
                                {{ $hotel->name }} provides a very satisfying stay. The breakfast is impressive, offering a wide variety—from coffee and herbal tea to …
                            </div>
                        </div>
                    </div>

                    {{-- location --}}
                    <div class="border px-5 py-5 rounded-xl border-gray-300">
                        <div>
                            <p class="text-xl font-bold">In the Area</p>
                            <p class="px-3 mt-3"> {{ $hotel->address . ', ' . $hotel->location->city . ', ' . $hotel->location->state . ', ' . $hotel->location->country}} </p>
                            <p class="px-2 bg-blue-700/10 mt-3 font-semibold rounded-full w-max text-sm">Near area</p>
                            <div class="flex flex-col gap-3 mt-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <x-heroicon-o-map-pin class="w-4 h-4" />
                                        <p class="font-semibold">Pasar Senen Station</p>
                                    </div>
                                    <p class="text-gray-500 font-semibold text-sm">1,56 km</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <x-heroicon-o-map-pin class="w-4 h-4" />
                                        <p class="font-semibold">National Monument</p>
                                    </div>
                                    <p class="text-gray-500 font-semibold text-sm">1,57 km</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <x-heroicon-o-map-pin class="w-4 h-4" />
                                        <p class="font-semibold">Istiqlal Mosque</p>
                                    </div>
                                    <p class="text-gray-500 font-semibold text-sm">1,91 km</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <x-heroicon-o-map-pin class="w-4 h-4" />
                                        <p class="font-semibold">Baraya Cikini</p>
                                    </div>
                                    <p class="text-gray-500 font-semibold text-sm">160 m</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <x-heroicon-o-map-pin class="w-4 h-4" />
                                        <p class="font-semibold">Menteng Huis</p>
                                    </div>
                                    <p class="text-gray-500 font-semibold text-sm">168 m</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <x-heroicon-o-map-pin class="w-4 h-4" />
                                        <p class="font-semibold">Whiz Hotel</p>
                                    </div>
                                    <p class="text-gray-500 font-semibold text-sm">434 m</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- static facility --}}
                    <div class="border px-5 py-5 rounded-xl border-gray-300">
                        <div>
                            <h1 class="text-xl font-bold">Main Facilities</h1>
                            <div class="grid grid-cols-2 grid-rows-4 mt-5 gap-5">
                                <div class="flex gap-2 items-center">
                                    <i class="text-blue-700" data-lucide="air-vent"></i>
                                    <p class="text-xs font-semibold">AC</p>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <i class="text-blue-700" data-lucide="fork-knife"></i>
                                    <p class="text-xs font-semibold">Restaurant</p>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <i class="text-blue-700" data-lucide="arrow-up-down"></i>
                                    <p class="text-xs font-semibold">Elevator</p>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <i class="text-blue-700" data-lucide="waves" ></i>
                                    <p class="text-xs font-semibold">Swimming Pool</p>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <i class="text-blue-700" data-lucide="parking-square"></i>
                                    <p class="text-xs font-semibold">Parking Area</p>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <i class="text-blue-700" data-lucide="wifi"></i>
                                    <p class="text-xs font-semibold">Wifi</p>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <i class="text-blue-700" data-lucide="tv"></i>
                                    <p class="text-xs font-semibold">TV</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- hotel rooms --}}
                <div id="select-room" class="w-full mt-20">
                    @if ($hotel->rooms->isEmpty())
                        <h1 class="text-2xl font-bold mt-40 flex items-center justify-center">There Are No Rooms Available at {{ $hotel->name }} </h1>
                    @else
                        <h1 class="text-2xl font-bold">Available Room Types in {{ $hotel->name }}</h1>
                        @foreach ($hotel->rooms as $room)
                        <div class="mt-10 w-full">
                            @include('components.room-component')
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>


    <script>
        lucide.createIcons();
    </script>
    
</body>
</html>
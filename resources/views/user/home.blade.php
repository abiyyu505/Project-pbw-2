<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ROOMIFY</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#ededed]">
    <div class="w-full relative overflow-hidden px-20 py-10">
        {{-- banner background --}}
        <div class=" w-full absolute -z-10 inset-0 h-96 overflow-hidden bg-cover">
            <div class="bg-black/25 inset-0 top-0 left-0 absolute w-full h-full object-cover"></div>
            <img class=" object-cover w-full h-full" src="{{ asset('assets/dark-blue-sky.webp') }}" alt="">
        </div>
        
        <div class="flex">
            {{-- sidebar --}}
            @include("components.side-landing-login")
            
            {{-- container --}}
            <div class="w-full flex flex-col">
                
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

                <div class="flex ml-20 mt-10 flex-col">

                    {{-- section component --}}
                    <div class="flex items-center gap-5">
                        <a href="" class="flex flex-col items-center text-white bg-blue-500 rounded-md px-4 py-1">
                            <x-heroicon-o-home-modern class=""/>
                            HOTEL
                        </a>
                        <a href="" class="flex flex-col items-center  text-white px-4 py-1 hover:bg-blue-500 hover:rounded-md transition-all duration-300">
                            <x-heroicon-o-building-office-2 class=""/>
                            VILLA
                        </a>
                    </div>

                    {{-- main section --}}
                    <div x-data="hotelSearch()" class="w-full bg-white rounded-xl h-96 mt-8 px-10 py-5 grid grid-cols-6 grid-rows-5 gap-5 shadow-xl z-10">

                        {{-- Search & search card --}}
                        <div x-data="{ open: false }" class=" col-span-6">
                            {{-- dump search --}}
                            <input type="text" @click="open = true" readonly class="border border-blue-500 w-full rounded-full outline-none transition-all duration-300 hover:bg-gray-100 px-10 cursor-pointer " placeholder="Search Hotel">

                            <div x-show="open" @click="open = false" class="bg-black/30 fixed w-full h-full top-0 left-0"></div>

                            {{-- real search --}}
                            <div x-show="open" @click.outside="open = false" class="bg-white flex flex-col fixed  rounded-md w-[800px] h-[500px] shadow-xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 px-10 py-5">
                                <div class="flex items-center gap-5">
                                    <input type="text" class="w-full h-10 rounded-full px-5 border-blue-700 focus:bg-gray-100" placeholder="Search Hotel">
                                    <div @click="open = false" class="w-6 h-6 cursor-pointer">
                                        @svg('heroicon-o-x-mark')
                                    </div>
                                </div>
                                <div class="w-full h-full py-10">
                                    {{-- <h1 class="font-bold text-4xl">Try to search something!</h1> --}}
                                    @foreach ($hotels as $hotel)
                                        <p> {{ $hotel->name }} </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- Location card --}}
                        <div x-data="{ open: false, location: 'Bandung', search: '' }"  readonly class="col-span-3 row-span-2">
                            
                            <div x-show="open" @click="open = false" class="bg-black/30 fixed w-full h-full top-0 left-0"></div>
                            
                            {{-- location card & search container --}}
                            <div x-show="open" @click.outside="open = false" class="bg-white flex flex-col fixed  rounded-md w-[800px] h-[500px] shadow-xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 px-10 py-5"  >
                                <div class="flex items-center gap-5">

                                    {{-- input search --}}
                                    <input x-model="search" type="text" class="w-full h-10 rounded-full px-5 border-blue-700 focus:bg-gray-100" placeholder="Search Location">
                                    <div @click="open = false" class="w-6 h-6 cursor-pointer">
                                        @svg('heroicon-o-x-mark')
                                    </div>
                                </div>
                                <div class="w-full max-h-96 overflow-y-scroll py-10 flex flex-col gap-3 px-5">
                                    @foreach ($locations as $location)
                                        
                                        {{-- view search --}}
                                        <template x-if="'{{ strtolower($location->city) }}'.includes(search.toLowerCase())">
                                            <p @click="location = '{{ $location->city }}'; open = false" class=" font-semibold text-lg cursor-pointer hover:text-blue-700 transition-all duration-300 ">{{ $location->city }}</p>
                                        </template>
                                    @endforeach
                                </div>
                            </div>

                            {{-- location card button --}}
                            <div @click="open = true" class="bg-[#f5f5f5] hover:bg-blue-700/20  border transition-all duration-300 border-gray-300 flex flex-col gap-3 rounded-xl w-full h-full px-10 py-5 cursor-pointer">
                                <p class="flex items-center text-gray-400">
                                    <x-heroicon-o-map-pin class="w-6 h-6" />
                                    Location
                                </p>
                                <div class="flex flex-col gap-3">
                                    <p x-text="location" class="text-xl font-bold"></p>
                                </div>
                            </div>
                        </div>

                        {{-- Room type card --}}
                        <div x-data="{ open: false, roomType: 'Suite', search: '' }" readonly class="col-span-2 row-span-2 ">

                           <div x-show="open" @click="open = false" class="bg-black/30 fixed w-full h-full top-0 left-0"></div>
                            
                            {{-- Room type card & search container --}}
                            <div x-show="open" @click.outside="open = false" class="bg-white flex flex-col fixed  rounded-md w-[800px] h-[500px] shadow-xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 px-10 py-5"  >
                                <div class="flex items-center gap-5">

                                    {{-- input search --}}
                                    <input x-model="search" type="text" class="w-full h-10 rounded-full px-5 border-blue-700 focus:bg-gray-100" placeholder="Search Room Type">
                                    <div @click="open = false" class="w-6 h-6 cursor-pointer">
                                        @svg('heroicon-o-x-mark')
                                    </div>
                                </div>
                                <div class="w-full max-h-96 overflow-y-scroll py-10 flex flex-col gap-3 px-5">
                                    @foreach ($hotels as $hotel)
                                        
                                        {{-- view search --}}
                                        <template x-if="'{{ strtolower($hotel->room_type) }}'.includes(search.toLowerCase())">
                                            <p @click="roomType = '{{ $hotel->room_type }}'; open = false" class=" font-semibold cursor-pointer">{{ $hotel->room_type }}</p>
                                        </template>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Room Type card button --}}
                            <div @click="open = true" class="bg-[#f5f5f5] border hover:bg-blue-700/20 transition-all duration-300 border-gray-300 flex flex-col gap-3 rounded-xl w-full h-full px-10 py-5 cursor-pointer">
                                <p class="flex items-center text-gray-400 gap-2">
                                    <x-heroicon-o-home-modern class="w-6 h-6"/>
                                    Room Type
                                </p>
                                <div class="flex flex-col gap-3">
                                    <p x-text="roomType" class="text-xl font-bold"></p>
                                </div>
                            </div>
                        </div>

                        {{-- Person --}}
                        <div x-data="{open: false, person: '2 persons'}" class=" row-span-2">

                            <div x-show="open" @click="open = false" class="bg-black/30 fixed w-full h-full top-0 left-0"></div>

                            {{-- person container --}}
                            <div x-show="open" @click.outside="open = false" class="bg-white flex flex-col fixed rounded-md w-[800px] h-[500px] shadow-xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 px-10 py-5 ">
                                <div @click="open = false" class="w-6 h-6 cursor-pointer ml-auto">
                                        @svg('heroicon-o-x-mark')
                                </div>
                                <div @click="person = '1 Person'; open = false" class="flex w-full items-center gap-3 hover:bg-blue-700/20 transition-all duration-300 bg-white border border-gray-400 cursor-pointer h-20 rounded-md px-20 py-5 mt-5">
                                    <div class="text-blue-500">
                                        @svg('bi-person-fill', 'w-8 h-8')
                                    </div>
                                    <p class="text-xl font-bold">1 Person</p>
                                </div>
                                <div @click="person = '2 Persons'; open = false" class="flex w-full items-center gap-3 hover:bg-blue-700/20 transition-all duration-300 bg-white border border-gray-400 cursor-pointer h-20 rounded-md px-20 py-5 mt-5">
                                    <div class="text-blue-500 flex">
                                        @svg('bi-person-fill', 'w-8 h-8')
                                        @svg('bi-person-fill', 'w-8 h-8')
                                    </div>
                                    <p class="text-xl font-bold">2 Persons</p>
                                </div>
                                <div @click="person = '3 Persons'; open = false" class="flex w-full items-center gap-3 hover:bg-blue-700/20 transition-all duration-300 bg-white border border-gray-400 cursor-pointer h-20 rounded-md px-20 py-5 mt-5">
                                    <div class="text-blue-500 flex">
                                        @svg('bi-person-fill', 'w-8 h-8')
                                        @svg('bi-person-fill', 'w-8 h-8')
                                        @svg('bi-person-fill', 'w-8 h-8')
                                    </div>
                                    <p class="text-xl font-bold">3 Persons</p>
                                </div>
                                <div @click="person = '4 Persons'; open = false" class="flex w-full items-center gap-3 hover:bg-blue-700/20 transition-all duration-300 bg-white border border-gray-400 cursor-pointer h-20 rounded-md px-20 py-5 mt-5">
                                    <div class="text-blue-500 flex">
                                        @svg('bi-person-fill', 'w-8 h-8')
                                        @svg('bi-person-fill', 'w-8 h-8')
                                        @svg('bi-person-fill', 'w-8 h-8')
                                        @svg('bi-person-fill', 'w-8 h-8')
                                    </div>
                                    <p class="text-xl font-bold">4 Persons</p>
                                </div>
                            </div>

                            {{-- person button --}}
                            <div @click="open = true" class="bg-[#f5f5f5] border border-gray-300 cursor-pointer hover:bg-blue-700/20 transition-all duration-300 flex flex-col gap-3 w-full h-full rounded-xl px-5 py-3">
                                <p class="flex items-center text-sm text-gray-400 gap-2">
                                    @svg('bi-person-fill', 'w-6 h-6')
                                    Person
                                </p>
                                <div class="flex flex-col gap-3">
                                    <p x-text="person" class="text-xl font-bold"></p>
                                </div>
                            </div>
                        </div>

                        {{-- check in --}}
                        <div x-data="{
                                open: false,
                                checkInDate: '',
                                init() {
                                    flatpickr(this.$refs.calendar, {
                                        inline: true,          
                                        dateFormat: 'Y-m-d',
                                        defaultDate: new Date(),
                                        onChange: (checkInDates, dateStr) => {
                                            this.checkInDate = dateStr;
                                        }
                                    });
                                }
                            }" 
                            class="row-span-2 col-span-2"
                        >
                            
                            <div x-show="open" @click="open = false" class="bg-black/30 fixed w-full h-full top-0 left-0"></div>

                            {{-- modal --}}
                           <div x-show="open" @click.outside="open = false" class="bg-white flex flex-col fixed rounded-md w-[400px] h-[450px] shadow-xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 px-10 py-5 ">

                                <div class="flex items-center mb-4">
                                    <p class="font-bold text-2xl">Choose Check In Date</p>
                                    <div @click="open = false" class="w-6 h-6 cursor-pointer ml-auto">
                                        @svg('heroicon-o-x-mark')
                                    </div>
                                </div>

                                <!-- Kalender langsung tampil -->
                                    <div x-ref="calendar" class="calendar-modal w-full"></div>
                                    <button @click="open = false" class="mt-5 bg-blue-500 hover:bg-blue-600 px-3 py-2 rounded-md text-white font-semibold transition-all duration-300">Submit</button>
                            </div>

                            <div @click="open = true" class="bg-[#f5f5f5] border border-gray-300 flex flex-col gap-3 rounded-xl px-5 py-3 w-full h-full hover:bg-blue-700/20 transition-all duration-300 cursor-pointer">
                                <p class="flex items-center text-sm text-gray-400 gap-2">
                                    <x-heroicon-o-calendar class="w-6 h-6" />
                                    Check In
                                </p>
                                <div class="flex flex-col gap-3">
                                    <p class="text-xl font-bold" x-text="checkInDate ? new Date(checkInDate).toLocaleDateString('en-US', { day:'numeric', month:'short', year:'numeric' }) : 'Select Date'"></p>
                                    <p  x-text="checkInDate ? new Date(checkInDate).toLocaleDateString('en-US', { weekday:'long' }) : ''" class="text-sm text-gray-400"></p>
                                </div>
                            </div>
                        </div>

                        {{-- check out --}}
                        <div x-data="{
                                open: false,
                                checkOutDate: '',
                                init() {
                                    flatpickr(this.$refs.calendar, {
                                        inline: true,          
                                        dateFormat: 'Y-m-d',
                                        defaultDate: new Date(),
                                        onChange: (checkOutDates, dateStr) => {
                                            this.checkOutDate = dateStr;
                                        }
                                    });
                                }
                            }" 
                            class="row-span-2 col-span-2"
                        >
                            
                            <div x-show="open" @click="open = false" class="bg-black/30 fixed w-full h-full top-0 left-0"></div>

                            {{-- modal --}}
                           <div x-show="open" @click.outside="open = false" class="bg-white flex flex-col fixed rounded-md w-[400px] h-[450px] shadow-xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 px-10 py-5 ">

                                <div class="flex items-center mb-4">
                                    <p class="font-bold text-2xl">Choose Check Out Date</p>
                                    <div @click="open = false" class="w-6 h-6 cursor-pointer ml-auto">
                                        @svg('heroicon-o-x-mark')
                                    </div>
                                </div>

                                <!-- Kalender langsung tampil -->
                                <div x-ref="calendar" class="calendar-modal w-full"></div>
                                <button @click="open = false" class="mt-5 bg-blue-500 hover:bg-blue-600 px-3 py-2 rounded-md text-white font-semibold transition-all duration-300">Submit</button>
                            </div>

                            <div @click="open = true" class="bg-[#f5f5f5] border border-gray-300 flex flex-col gap-3 rounded-xl px-5 py-3 w-full h-full hover:bg-blue-700/20 transition-all duration-300 cursor-pointer">
                                <p class="flex items-center text-sm text-gray-400 gap-2">
                                    <x-heroicon-o-calendar class="w-6 h-6" />
                                    Check Out
                                </p>
                                <div class="flex flex-col gap-3">
                                    <p class="text-xl font-bold" x-text="checkOutDate ? new Date(checkOutDate).toLocaleDateString('en-US', { day:'numeric', month:'short', year:'numeric' }) : 'Select Date'"></p>
                                    <p  x-text="checkOutDate ? new Date(checkOutDate).toLocaleDateString('en-US', { weekday:'long' }) : ''" class="text-sm text-gray-400"></p>
                                </div>
                            </div>
                        </div>

                        {{-- Search button --}}
                        <div @click="searchHotels()" class="bg-gradient-to-br from-blue-500 to-[#002c89] cursor-pointer hover:bg-gradient-to-br hover:from-blue-600 hover:to-[#002679] transition-all duration-300 flex flex-col gap-3 items-center justify-center rounded-xl row-span-2 col-span-2  px-5 py-3">
                            <p class="flex items-center text-2xl text-center font-semibold text-white">
                                Search Hotel
                            </p>
                        </div>
                    </div>

                    {{-- special offer --}}
                    <div class="mt-10 z-0">
                        <p class="font-bold text-3xl">Special Offer</p>

                        {{-- hotels container --}}
                        <div class="mt-10 flex gap-5 max-w-5xl overflow-x-auto scrollbar-hide">
                            @include('components.hotel-card', [
                                'name' => 'Horison Ultima',
                                'image' => 'assets/img-horison.jpg',
                                'location' => 'Bandung'
                            ])
                            @include('components.hotel-card', [
                                'name' => 'Horison Ultima',
                                'image' => 'assets/img-horison.jpg',
                                'location' => 'Bandung'
                            ])
                            @include('components.hotel-card', [
                                'name' => 'Horison Ultima',
                                'image' => 'assets/img-horison.jpg',
                                'location' => 'Bandung'
                            ])
                            @include('components.hotel-card', [
                                'name' => 'Horison Ultima',
                                'image' => 'assets/img-horison.jpg',
                                'location' => 'Bandung'
                            ])
                            @include('components.hotel-card', [
                                'name' => 'Horison Ultima',
                                'image' => 'assets/img-horison.jpg',
                                'location' => 'Bandung'
                            ])

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function hotelSearch() {
            return {
                location: '',
                roomType: '',
                person: '',
                checkInDate: '',
                checkOutDate: '',

                showResult: false,
                hotels: [],

                async searchHotels() => {
                    const response = await fetch('/search-hotels', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            location: this.location,
                            room_type: this.roomType,
                            person: this.person,
                            check_in: this.checkInDate,
                            check_out: this.checkOutDate,
                        })
                    });

                    const data = await response.json();
                    this.hotels = data;
                    this.showResult = true;
                }
            }
        }
    </script>
</body>
</html>
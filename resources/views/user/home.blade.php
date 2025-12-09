<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ROOMIFY</title>
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
                    <div class="w-full bg-white rounded-xl h-96 mt-8 px-10 py-5 grid grid-cols-6 grid-rows-5 gap-5 shadow-xl">

                        {{-- Search & search card --}}
                        <div x-data="{ open: false }" class=" col-span-6 z-20">
                            {{-- dump search --}}
                            <input type="text" @click="open = true" readonly class="border border-blue-500 w-full rounded-full outline-none transition-all duration-300 hover:bg-gray-100 px-10 cursor-pointer" placeholder="Search Hotel">

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
                                    <h1 class="font-bold text-4xl">Try to search something!</h1>
                                </div>
                            </div>
                        </div>

                        {{-- Location card --}}
                        <div class="bg-[#f5f5f5] border border-gray-300 flex flex-col gap-3 rounded-xl col-span-3 row-span-2  px-10 py-3">
                            <p class="flex items-center text-gray-400">
                                <x-heroicon-o-map-pin class="w-6 h-6" />
                                Location
                            </p>
                            <div class="flex flex-col gap-3">
                                <p class="text-xl font-bold">Bandung, Indonesia</p>
                            </div>
                        </div>

                        {{-- Room type card --}}
                        <div class="bg-[#f5f5f5] border border-gray-300 flex flex-col gap-3 rounded-xl col-span-2 row-span-2  px-5 py-3">
                            <p class="flex items-center text-sm text-gray-400">
                                <x-heroicon-o-map-pin class="w-6 h-6" />
                                Room Type
                            </p>
                            <div class="flex flex-col gap-3">
                                <p class="text-xl font-bold">SUITE</p>
                            </div>
                        </div>

                        {{-- Person --}}
                        <div class="bg-[#f5f5f5] border border-gray-300 flex flex-col gap-3 rounded-xl row-span-2  px-5 py-3">
                            <p class="flex items-center text-sm text-gray-400">
                                <x-heroicon-o-map-pin class="w-6 h-6" />
                                Person
                            </p>
                            <div class="flex flex-col gap-3">
                                <p class="text-xl font-bold">2 Person</p>
                            </div>
                        </div>

                        {{-- check in --}}
                        <div class="bg-[#f5f5f5] border border-gray-300 flex flex-col gap-3 rounded-xl row-span-2 col-span-2  px-5 py-3">
                            <p class="flex items-center text-sm text-gray-400">
                                <x-heroicon-o-map-pin class="w-6 h-6" />
                                Check In
                            </p>
                            <div class="flex flex-col gap-3">
                                <p class="text-xl font-bold">7 Dec'25</p>
                                <p class="text-sm text-gray-400">Sunday</p>
                            </div>
                        </div>

                        {{-- check out --}}
                        <div class="bg-[#f5f5f5] border border-gray-300 flex flex-col gap-3 rounded-xl row-span-2 col-span-2  px-5 py-3">
                            <p class="flex items-center text-sm text-gray-400">
                                <x-heroicon-o-map-pin class="w-6 h-6" />
                                Check Out
                            </p>
                            <div class="flex flex-col gap-3">
                                <p class="text-xl font-bold">8 Dec'25</p>
                                <p class="text-sm text-gray-400">Monday</p>
                            </div>
                        </div>

                        {{-- Search button --}}
                        <div class="bg-gradient-to-br from-blue-500 to-[#002c89] cursor-pointer hover:bg-gradient-to-br hover:from-blue-600 hover:to-[#002679] transition-all duration-300 flex flex-col gap-3 items-center justify-center rounded-xl row-span-2 col-span-2  px-5 py-3">
                            <p class="flex items-center text-2xl text-center font-semibold text-white">
                                Search Hotel
                            </p>
                        </div>
                    </div>

                    {{-- special offer --}}
                    <div class="mt-10">
                        <p class="font-bold text-3xl">Special Offer</p>

                        {{-- hotels container --}}
                        <div class="mt-10 flex gap-5 max-w-5xl overflow-x-auto scrollbar-hide z-0">
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
</body>
</html>
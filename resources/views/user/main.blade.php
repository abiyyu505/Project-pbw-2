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
        
        <div class="w-full flex gap-20" x-data="{page: 'home'}">
            {{-- sidebar --}}
            @include("components.side-landing-login")

            <div class="flex flex-col w-full">
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
                <div class="flex mt-10 flex-col">
    
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
                </div>
                
                {{-- container --}}
                <div x-show="page === 'home'">
                    @include('user.home')
                </div>

                <div x-show="page === 'booking'">
                    @include('user.booking')
                </div>
            </div>
        </div>
    </div>

    <script>
        function hotelSearch() {
            return {
                location: 'Jakarta',
                roomType: 'Standard',
                person: '',
                checkInDate: '',
                checkOutDate: '',

                showResult: false,
                hotels: [],

                async searchHotels() {
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
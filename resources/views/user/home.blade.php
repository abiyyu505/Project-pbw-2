<div class="w-full flex flex-col">
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
            <div x-data="{ open: false, search: '' }"  readonly class="col-span-3 row-span-2">
                
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
                        <p x-text="location + ', ' + country" class="text-xl font-bold"></p>
                    </div>
                </div>
            </div>

            {{-- Room type card --}}
            <div x-data="{ open: false, search: '' }" readonly class="col-span-2 row-span-2 ">

                <div x-show="open" @click="open = false" class="bg-black/30 fixed w-full h-full top-0 left-0"></div>
                
                {{-- Room type card --}}
                <div x-show="open" @click.outside="open = false" class="bg-white flex flex-col fixed  rounded-md w-[800px] h-[500px] shadow-xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 px-10 py-5"  >
                    <div class="flex items-center justify-between">
                        {{-- close button --}}
                        <h1 class="text-xl font-semibold">Choose Room Type</h1>
                        <div @click="open = false" class="w-6 h-6 cursor-pointer">
                            @svg('heroicon-o-x-mark')
                        </div>
                    </div>
                    <div class="w-full max-h-96 py-10 flex flex-col gap-3 px-5">
                        <div @click="roomType = 'Standard'; open = false" class=" border border-gray-400 w-full h-20 px-20 py-5 rounded-md text-xl font-semibold flex items-center cursor-pointer hover:bg-blue-700/30 transition-all duration-300">
                            <p>Standard</p>
                        </div>
                        <div @click="roomType = 'Deluxe'; open = false" class=" border border-gray-400 w-full h-20 px-20 py-5 rounded-md text-xl font-semibold flex items-center cursor-pointer hover:bg-blue-700/30 transition-all duration-300">
                            <p>Deluxe</p>
                        </div>
                        <div @click="roomType = 'Suite'; open = false" class=" border border-gray-400 w-full h-20 px-20 py-5 rounded-md text-xl font-semibold flex items-center cursor-pointer hover:bg-blue-700/30 transition-all duration-300">
                            <p>Suite</p>
                        </div>
                        <div @click="roomType = 'Family Room'; open = false" class=" border border-gray-400 w-full h-20 px-20 py-5 rounded-md text-xl font-semibold flex items-center cursor-pointer hover:bg-blue-700/30 transition-all duration-300">
                            <p>Family Room</p>
                        </div>
                        <div @click="roomType = 'Executive'; open = false" class=" border border-gray-400 w-full h-20 px-20 py-5 rounded-md text-xl font-semibold flex items-center cursor-pointer hover:bg-blue-700/30 transition-all duration-300">
                            <p>Executive</p>
                        </div>
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
            <div x-data="{open: false, person: person = '2 persons'}" class=" row-span-2">

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
            
            {{-- modal for search hotel button --}}
            <div x-show="showResult" class="fixed" >

                <div x-show="showResult" @click="showResult = false" class="bg-black/30 fixed w-full h-full top-0 left-0"></div>

                <div @click.outside="showResult = false" class="fixed top-1/2 left-1/2 bg-white w-[800px] h-[500px] rounded-md shadow-xl p-10 -translate-x-1/2 -translate-y-1/2 overflow-y-scroll">
                    <h2 class="text-2xl font-bold mb-5">Hotels Results</h2>

                    <template x-if="hotels.length === 0">
                        <p class="text-gray-500">No hotels found.</p>
                    </template>

                    <div class="flex flex-col gap-5 ">
                        <template x-for="hotel in hotels" :key="hotel.id">
                            <a :href="`/hotel-detail/${hotel.id}`" class="py-3 cursor-pointer hover:bg-blue-700/30 transition-all duration-300 bg-white rounded-md border border-gray-200 px-10">
                                <p class="font-semibold text-xl" x-text="hotel.name"></p>
                                <p class="text-gray-600" x-text="hotel.location.city"></p>
                                <p class="text-gray-500">Room: <span x-text="hotel.rooms.length > 0 ? hotel.rooms[0].room_type : '-'"></span></p>
                            </a>
                        </template>
                    </div>
                </div>
            </div>
        </div>


        {{-- special offer --}}
        <div class="mt-10 z-0">
            <p class="font-bold text-3xl">Special Offer</p>

            {{-- hotels container --}}
            <div class="mt-10 flex gap-5 max-w-5xl overflow-x-auto scrollbar-hide">
                @foreach ($hotels as $hotel)
                @include('components.hotel-card', [
                    'name' => $hotel->name,
                    'image' => 'assets/img-horison.jpg',
                    'location' => $hotel->location->city
                ])
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
        function hotelSearch() {
            return {
                country: 'indonesia',
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
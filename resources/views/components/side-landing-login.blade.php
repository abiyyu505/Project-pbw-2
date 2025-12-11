<div class="w-max">
    {{-- side component --}}
    <div class="bg-gradient-to-br from-blue-500 to-[#002c89] w-60 h-[600px] z-10 rounded-lg px-10 py-5 flex flex-col justify-between">
        <div>

            <p class="text-white font-bold text-xl">ROOMIFY</p>
            <ul class="flex flex-col gap-3 text-lg text-white mt-10">
                <li @click="page = 'home'" class="bg-blue-500 rounded-full px-4 py-1 cursor-pointer">
                    <button  class="flex gap-3 items-center ">
                        <x-heroicon-o-home class="w-6 h-6 text-white" />
                        Home
                    </button>
                </li>
                <li @click="page = 'booking'" class="px-4 py-1 hover:bg-blue-500 hover:rounded-full transition-all duration-300 cursor-pointer">
                    <a  class="flex gap-3 items-center " >
                        <x-heroicon-o-clipboard-document class="w-6 h-6 text-white"  />
                        Booking
                    </a>
                </li>
                <li class="px-4 py-1 hover:bg-blue-500 hover:rounded-full transition-all duration-300">
                    <a href="" class="flex gap-3 items-center">
                        <x-heroicon-o-clock class="w-6 h-6 text-white"/>
                        History
                    </a>
                </li>
                <li class="px-4 py-1 hover:bg-blue-500 hover:rounded-full transition-all duration-300">
                    <a href="" class="flex gap-3 items-center">
                        <x-heroicon-o-map class="w-6 h-6 text-white"/>
                        Explore
                    </a>
                </li>
                <li class="px-4 py-1 hover:bg-blue-500 hover:rounded-full transition-all duration-300">
                    <a href="" class="flex gap-3 items-center">
                        <x-heroicon-o-question-mark-circle class="w-6 h-6 text-white"/>
                        Support
                    </a>
                </li>
            </ul>
        </div>

        <div class="w-full mb-5">
            <a class="px-4 py-2 flex gap-3 justify-center items-center bg-white rounded-full hover:bg-blue-500 transition-all duration-300 group text-blue-500 font-semibold hover:text-white" href="{{ route('profile.edit') }}">
                <x-heroicon-s-user class="w-6 h-6 text-blue-500 group-hover:text-white transition-all duration-300" />
                <span>{{ Auth::user()->name }}</span>
            </a>
        </div>
    </div>
</div>
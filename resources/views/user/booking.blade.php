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


            <div class="flex w-full h-full mt-10 bg-red-500" x-show="section === 'in progress'">
                <p>ini progress</p>
            </div>
            <div class="flex w-full h-full mt-10 bg-blue-500" x-show="section === 'history'">
                <p>ini history</p>
            </div>


        </div>
    </div>
</div>
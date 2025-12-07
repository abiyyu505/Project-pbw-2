<div class="bg-white rounded-lg w-96 h-40 flex px-7 py-5 gap-5 shadow-xl relative flex-shrink-0">
    <div class="bg-gray-500 w-24 h-28 rounded-lg overflow-hidden shadow-lg">
        <img class="object-cover w-full h-full" src="{{ asset($image) }}" alt="hotel image">
    </div>
    <div class="flex flex-col">
        <p class="text-xl font-bold"> {{ $name }} </p>
        <p class="text-sm text-gray-400 flex">
            <x-heroicon-o-map-pin class="w-6 h-6" />
            {{ $location }} 
        </p>
    </div>
    <a href="" class="absolute bottom-5 right-5 bg-blue-500 hover:bg-blue-600 transition-all duration-300 rounded-md px-2 py-1 text-white font-semibold mt-auto ml-auto">Book Now</a>
</div>
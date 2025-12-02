<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Lingian</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="">
        @include("components.navigation-landing")
        
        {{-- Top --}}
        <h1 class="flex gap-4 flex-col text-center absolute items-center top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2  text-white font-bold text-5xl">
            Make your self at home <span>in our hotel</span>
        </h1>
        <div class="w-full h-screen overflow-hidden">
            <img class="w-full h-full object-cover" src="{{ asset("assets/queenBed-for-landingPage.webp") }}" alt="">
        </div>

        {{-- about --}}
        <div class="relative px-20 py-20 grid grid-cols-2">

            <div>
                <div class="absolute bg-white w-40 h-20 bottom-24 left-[500px] z-20 shadow-2xl pt-2 pl-6 rounded-lg">
                    <h3 class="text-pink-700 font-bold">LINGIAN HOTEL</h3>
                    <p class="text-xs text-gray-500 font-medium">32 Employees</p>
                    <p class="text-xs text-gray-500 font-medium">24 Hours Service</p>
                </div>
                <div class="relative w-[500px] h-[550px] bg-gray-800 rounded-xl overflow-hidden">
                    <img class=" object-fit w-full h-full" src="{{ asset('assets/simple-lobby.jpg') }}" alt="">
                </div>
            </div>

            {{-- text about --}}
            <div class="">
                <h1 class="flex gap-3 font-semibold text-3xl py-14 text-gray-700">
                    About Us <span class="bg-pink-700 w-20 h-2 rounded-full mt-6"></span>
                </h1>
                <h1 class="text-5xl font-bold text-gray-700">
                    The best holidays <br>start here!
                </h1>
                <p class="w-[500px] mt-10">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi culpa dicta, sequi ad vel possimus dignissimos, laudantium velit architecto libero perspiciatis recusandae? Quo id, amet corporis modi numquam fugiat cum.
                </p>
                <p class="w-[500px] mt-5">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi culpa dicta, sequi ad vel possimus dignissimos, laudantium velit architecto libero perspiciatis recusandae? Quo id.
                </p>
            </div>
        </div>
    </div>

    @include("components.footer-landing")
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-[#ededed]">
        <div class="flex flex-col w-full relative overflow-hidden">

            {{-- banner background --}}
            <div class=" w-full absolute -z-10 inset-0 h-full overflow-hidden bg-cover">
                <div class="bg-black/25 inset-0 top-0 left-0 absolute w-full h-full object-cover"></div>
                <img class=" object-cover w-full h-full" src="{{ asset('assets/login-background.jpg') }}" alt="">
            </div>

            <div class="flex sm:justify-center items-center pt-6 sm:pt-0 min-h-[100vh] shadow-md">

                {{-- side get started --}}
                <div class="relative rounded-tl-md rounded-bl-md flex w-96 h-[500px] overflow-hidden">
                    <img class=" object-cover w-full h-full" src="{{ asset('assets/login-background.jpg') }}" alt="">
                    <div class="absolute left-[50%] ">
                        <p class=" text-xl font-bold text-white ">Get Started</p>
                    </div>
                </div>

                {{-- login form --}}
                <div class="w-96 h-[500px] px-6 py-4 bg-white overflow-hidden  rounded-tr-md rounded-br-md">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>

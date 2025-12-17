<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel - Map</title>

      <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    />

     <style>
        #map {
            height: 100vh;
            width: 100%;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- {{ dd($hotel->location) }} --}}
    <div class="absolute ml-20 mt-10 z-20">
        <a href="{{ route('hotel.detail', $hotel->id) }}" class=" bg-blue-700 text-white px-5 py-2 rounded-md hover:bg-blue-800 transition-all duration-300 font-semibold">Back</a>
    </div>

    <div id="map" class=" z-10"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        const hotel = {
            name: @json($hotel->name),
            lat: {{ $hotel->location->lat }},
            lng: {{ $hotel->location->lng }},
            city: @json($hotel->location->city),
            state: @json($hotel->location->state),
        };

        const map = L.map('map').setView([hotel.lat, hotel.lng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([hotel.lat, hotel.lng])
            .addTo(map)
            .bindPopup(`
                <b>${hotel.name}</b><br>
                ${hotel.city}, ${hotel.state}
            `)
            .openPopup();
    </script>
</body>
</html>
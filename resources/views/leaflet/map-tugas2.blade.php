@extends('layouts.sidebar')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        #map { 
            height: 700px; 
        }
    </style>
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-black">Tugas 2 - Cirlce<h2><div>
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <script>
        // const marker = L.marker([-2.2423416594473737, 111.10911353260076], 5).addTo(map);

        // const circle = L.circle([51.508, -0.11], {
        //     color: 'red',
        //     fillColor: '#f03',
        //     fillOpacity: 0.5,
        //     radius: 500
        // }).addTo(map);

        const map = L.map('map').setView([-8.645429164002962, 115.25432263477632], 18);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);


        var iconMarker = L.icon({
            iconUrl :"{{ asset('storage/marker/marker.png') }}",
            iconSize:     [50, 50], // size of the icon
            shadowSize:   [50, 50], // size of the shadow
            // iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            // shadowAnchor: [4, 62],  // the same for the shadow
            // popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        })
        var marker = L.marker([-8.645429164002962, 115.25432263477632],{
            icon:iconMarker,
            draggable : true
        })
        .bindPopup('Ada apa disini?')
        .addTo(map);

        // -8.796408453257625, 115.17634384739371
        

        const circle1 = L.circle([-8.645429164002962, 115.25432263477632], {
            color: 'green',
            fillColor: 'green',
            fillOpacity: 0.5,
            radius: 50
        }).addTo(map).bindPopup('Circle 1');


        const circle2 = L.circle([-8.644950108791932, 115.25065865969252], {
            color: 'red',
            fillColor: 'red',
            fillOpacity: 0.5,
            radius: 100
        }).addTo(map).bindPopup('Circle 2');

        

         // Membuat popup baru
        var popup = L.popup({ 
            offset: [0, -20],
            minWidth:240,
            maxWidth: 500
        })
            .setLatLng(marker.getLatLng())
            .setContent('Ini adalah marker di Bali!');
        
        // Binding popup ke marker
        marker.bindPopup(popup);

        // Format popup content
        formatContent = function(lat, lng){
            return `
                <div class="wrapper">
                    <div class="row">
                        <div class="cell merged" style="text-align:center"><b>Koordinat</b></div>
                    </div>
                    <div class="row">
                        <div class="col">Latitude</div>
                        <div class="col">${lat}</div>
                    </div>
                    <div class="row">
                        <div class="col">Longitude</div>
                        <div class="col">${lng}</div>
                    </div>
                </div>
            `;
        }
        
        // Menambahkan event listener pada marker
        marker.on('click', function() {
            popup.setLatLng(marker.getLatLng()),
            popup.setContent(formatContent(marker.getLatLng().lat,marker.getLatLng().lng));
        });

        // Menambahkan event listener pada marker
        marker.on('drag', function(event) {
            popup.setLatLng(marker.getLatLng()),
            popup.setContent(formatContent(marker.getLatLng().lat,marker.getLatLng().lng));
            marker.openPopup();
        });

        setTimeout(function () {
            window.dispatchEvent(new Event("resize"));
        }, 500);

    </script>
@endpush







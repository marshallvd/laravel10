@extends('layouts.sidebar')

@section('css')
    <!-- Menambahkan stylesheet Leaflet -->
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
                        <!-- Judul Tugas -->
                        <h2 class="text-black">Tugas 3 - Polygon<h2><div>
                    <div class="card-body">
                        <!-- Tempat menampilkan peta -->
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <!-- Menambahkan script Leaflet -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <script>
        // Membuat objek peta dengan titik tengah dan level zoom tertentu
        const map = L.map('map').setView([-8.645429164002962, 115.25432263477632], 18);

        // Menambahkan tile layer (peta dasar) dari OpenStreetMap
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Membuat ikon marker kustom
        var iconMarker = L.icon({
            iconUrl :"{{ asset('storage/marker/marker.png') }}",
            iconSize:     [50, 50], // ukuran ikon
        })

        // Membuat marker dengan ikon kustom
        var marker = L.marker([-8.645429164002962, 115.25432263477632],{
            icon:iconMarker,
            draggable : true // Mengaktifkan fitur drag untuk marker
        })
        .bindPopup('Ada apa disini?') // Menambahkan popup pada marker
        .addTo(map); // Menambahkan marker ke peta

        // Membuat lingkaran 1
        const circle1 = L.circle([-8.645429164002962, 115.25432263477632], {
            color: 'green',
            fillColor: 'green',
            fillOpacity: 0.5,
            radius: 50
        }).addTo(map).bindPopup('Circle 1'); // Menambahkan popup pada lingkaran 1

        // Membuat lingkaran 2
        const circle2 = L.circle([-8.644950108791932, 115.25065865969252], {
            color: 'red',
            fillColor: 'red',
            fillOpacity: 0.5,
            radius: 100
        }).addTo(map).bindPopup('Circle 2'); // Menambahkan popup pada lingkaran 2


        //Membuat Polygon
        const polygon = L.polygon([
            [-8.644531134310702, 115.25254693481176],
            [-8.648678430809323, 115.24786916259878],
            [-8.64688587091655, 115.25431719264468]
	    ]).addTo(map).bindPopup('I am a polygon.');



        // Membuat popup baru
        var popup = L.popup({ 
            offset: [0, -20], // Penyesuaian posisi popup
            minWidth:240,
            maxWidth: 500
        })
            .setLatLng(marker.getLatLng())
            .setContent('Ini adalah marker di Bali!');
        
        // Binding popup ke marker
        marker.bindPopup(popup);

        // Format isi popup
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
        
        // Menambahkan event listener pada marker untuk menampilkan popup dengan koordinat
        marker.on('click', function() {
            popup.setLatLng(marker.getLatLng()),
            popup.setContent(formatContent(marker.getLatLng().lat,marker.getLatLng().lng));
        });

        // Menambahkan event listener pada marker untuk menampilkan popup saat marker di-drag
        marker.on('drag', function(event) {
            popup.setLatLng(marker.getLatLng()),
            popup.setContent(formatContent(marker.getLatLng().lat,marker.getLatLng().lng));
            marker.openPopup();
        });

        // Mengatur ulang peta setelah beberapa saat
        setTimeout(function () {
            window.dispatchEvent(new Event("resize"));
        }, 500);

    </script>
@endpush

@extends('layouts.frontend')
@extends('layouts.sidebar')
@extends('layouts.header')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.fullscreen@2.4.0/Control.FullScreen.min.css">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        #map { 
            height: 700px; 
        }
    </style>
@endsection

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h2>Maps</h2></div>
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h2>Detail Tempat</h2></div>
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img class="img-fluid rounded " style="max-width: 100%;" src="{{ $spot->getImageAsset() }}" alt="">
                        </div>
                        <h3 class="text-center"><b>{{ $spot->nama_rs }}</b></h3>
                        <p class="text-center">{{ $spot->koordinat }}</p>
                        <div style="display: flex; align-items: center margin-bottom: 2rem;">
                            <i class="fas fa-map-marker-alt me-2" style="font-size: 1.25rem;"></i>
                            <h5 style="margin-bottom: 1; font-size: 1rem;">{{ $spot->alamat }}</h5>
                        </div>
                        <div style="display: flex; align-items: flex-start;">
                            <i class="fas fa-info-circle me-2" style="font-size: 1.25rem;"></i>
                            <h5 style="margin-bottom: 0; font-size: 1rem;">Deskripsi</h5>
                        </div>
                        <div style="margin-left: 2rem;">
                            <p style="margin-bottom: 0; font-size: 1rem;">{{ $spot->deskripsi }}</p>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body d-flex justify-content-center">
                <a href="{{ route('spots') }}" class=" btn btn-warning btn-sm ">Kembali</a>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.fullscreen@2.4.0/Control.FullScreen.min.js"></script>

    <script>
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });

    var Stadia_Dark = L.tileLayer(
        'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
            maxZoom: 20,
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        });

    var Esri_WorldStreetMap = L.tileLayer(
        'https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
        });

    // Membuat ikon marker kustom
    var iconMarker = L.icon({
        iconUrl :"{{ asset('storage/marker/marker.png') }}",
        iconSize:     [50, 50], // ukuran ikon
    })

    

    var map = L.map('map', {
        center: [{{ $spot->koordinat }}],
        zoom: 15,
        layers: [osm],
        fullscreenControl: {
            pseudoFullscreen: false
        }
    })

    var baseMaps = {
        'Openstreetmap': osm,
        'StadiaDark': Stadia_Dark,
        'Esri': Esri_WorldStreetMap
    }

    const layerControl = L.control.layers(baseMaps).addTo(map)
        var curLocation = [{{ $spot->koordinat }}] 
        var marker = new L.marker(curLocation,{
            draggable:false,
            icon:iconMarker
    })
    map.addLayer(marker)

        
    </script>
@endpush
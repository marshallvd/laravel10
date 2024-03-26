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
                        <h2 class="text-black">Tugas 8 - GeoJSON<h2>
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
        // const map = L.map('map').setView([-8.64356881820705, 115.26822935833701], 15);

        // Menambahkan tile layer (peta dasar) dari OpenStreetMap
        const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            
            maxZoom: 20,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        var Esri_World = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
        });

        var Esri_Map = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; National Geographic, Esri, DeLorme, NAVTEQ, UNEP-WCMC, USGS, NASA, ESA, METI, NRCAN, GEBCO, NOAA, iPC',
            maxZoom: 16
        });

        var Stadia_Dark = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.{ext}', {
            minZoom: 0,
            maxZoom: 20,
            attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            ext: 'png'
        });

        const tourism = L.layerGroup();
        const public = L.layerGroup();

        var map = L.map('map',{
            center:[-8.454068513179749, 115.3563600140712],
            minZoom:8,
            zoom:17,
            layers:[osm]
        })


        const hospital =
            {
                "type": "FeatureCollection",
                "features": [
                    {
                    "type": "Feature",
                    "properties": {
                        "popupContent":"RSJ Provinsi Bali"
                    },
                    "geometry": {
                        "coordinates": [
                        [
                            [
                            115.35095386625528,
                            -8.453644221755255
                            ],
                            [
                            115.35095036303841,
                            -8.4544827883892
                            ],
                            [
                            115.35219750834693,
                            -8.454507044420808
                            ],
                            [
                            115.35227107590754,
                            -8.453741246087915
                            ],
                            [
                            115.35095386625528,
                            -8.453644221755255
                            ]
                        ]
                        ],
                        "type": "Polygon"
                    }
                    },
                    {
                    "type": "Feature",
                    "properties": {
                        "popupContent":"RSUD Bangli"
                    },
                    "geometry": {
                        "type": "Polygon",
                        "coordinates": [
                        [
                            [
                            115.35252968801137,
                            -8.455803993250386
                            ],
                            [
                            115.3524857368575,
                            -8.455806128958454
                            ],
                            [
                            115.35244220897579,
                            -8.45581251551469
                            ],
                            [
                            115.3523995235622,
                            -8.455823091413277
                            ],
                            [
                            115.35235809169924,
                            -8.45583775480287
                            ],
                            [
                            115.35231831239734,
                            -8.455856364467467
                            ],
                            [
                            115.352280568752,
                            -8.455878741186382
                            ],
                            [
                            115.3522452242544,
                            -8.455904669460217
                            ],
                            [
                            115.35221261929102,
                            -8.455933899586205
                            ],
                            [
                            115.35218306786531,
                            -8.455966150062977
                            ],
                            [
                            115.35215685457379,
                            -8.456001110301527
                            ],
                            [
                            115.35213423186524,
                            -8.456038443616336
                            ],
                            [
                            115.35211541760934,
                            -8.456077790467809
                            ],
                            [
                            115.35210059299865,
                            -8.45611877192481
                            ],
                            [
                            115.35208990080339,
                            -8.456160993313969
                            ],
                            [
                            115.35208344399646,
                            -8.456204048020565
                            ],
                            [
                            115.35208128476195,
                            -8.456247521404443
                            ],
                            [
                            115.3520834438958,
                            -8.456290994793228
                            ],
                            [
                            115.35208990060588,
                            -8.456334049514346
                            ],
                            [
                            115.35210059271195,
                            -8.456376270927088
                            ],
                            [
                            115.35211541724445,
                            -8.45641725241583
                            ],
                            [
                            115.35213423143615,
                            -8.456456599305978
                            ],
                            [
                            115.35215685409702,
                            -8.45649393266491
                            ],
                            [
                            115.35218306735918,
                            -8.456528892951338
                            ],
                            [
                            115.35221261877494,
                            -8.4565611434779
                            ],
                            [
                            115.35224522374826,
                            -8.456590373653682
                            ],
                            [
                            115.3522805682752,
                            -8.456616301975393
                            ],
                            [
                            115.35231831196828,
                            -8.456638678738432
                            ],
                            [
                            115.35235809133435,
                            -8.456657288441706
                            ],
                            [
                            115.35239952327548,
                            -8.456671951863038
                            ],
                            [
                            115.35244220877831,
                            -8.45668252778521
                            ],
                            [
                            115.35248573675682,
                            -8.456688914355968
                            ],
                            [
                            115.35252968801137,
                            -8.45669105006894
                            ],
                            [
                            115.35257363926594,
                            -8.456688914355968
                            ],
                            [
                            115.35261716724445,
                            -8.45668252778521
                            ],
                            [
                            115.35265985274727,
                            -8.456671951863038
                            ],
                            [
                            115.35270128468842,
                            -8.456657288441706
                            ],
                            [
                            115.35274106405448,
                            -8.456638678738432
                            ],
                            [
                            115.35277880774755,
                            -8.456616301975393
                            ],
                            [
                            115.35281415227452,
                            -8.456590373653682
                            ],
                            [
                            115.3528467572478,
                            -8.4565611434779
                            ],
                            [
                            115.3528763086636,
                            -8.456528892951338
                            ],
                            [
                            115.35290252192574,
                            -8.45649393266491
                            ],
                            [
                            115.35292514458659,
                            -8.456456599305978
                            ],
                            [
                            115.35294395877831,
                            -8.45641725241583
                            ],
                            [
                            115.35295878331083,
                            -8.456376270927088
                            ],
                            [
                            115.35296947541688,
                            -8.456334049514346
                            ],
                            [
                            115.35297593212698,
                            -8.456290994793228
                            ],
                            [
                            115.35297809126082,
                            -8.456247521404443
                            ],
                            [
                            115.35297593202628,
                            -8.456204048020565
                            ],
                            [
                            115.35296947521938,
                            -8.456160993313969
                            ],
                            [
                            115.3529587830241,
                            -8.45611877192481
                            ],
                            [
                            115.35294395841342,
                            -8.456077790467809
                            ],
                            [
                            115.35292514415754,
                            -8.456038443616336
                            ],
                            [
                            115.35290252144897,
                            -8.456001110301527
                            ],
                            [
                            115.35287630815746,
                            -8.455966150062977
                            ],
                            [
                            115.35284675673175,
                            -8.455933899586205
                            ],
                            [
                            115.35281415176837,
                            -8.455904669460217
                            ],
                            [
                            115.35277880727078,
                            -8.455878741186382
                            ],
                            [
                            115.35274106362542,
                            -8.455856364467467
                            ],
                            [
                            115.35270128432353,
                            -8.45583775480287
                            ],
                            [
                            115.35265985246058,
                            -8.455823091413277
                            ],
                            [
                            115.35261716704699,
                            -8.45581251551469
                            ],
                            [
                            115.35257363916526,
                            -8.455806128958454
                            ],
                            [
                            115.35252968801137,
                            -8.455803993250386
                            ]
                        ]
                        ]
                    }
                    }
                ]
                }

        const sekolah = {
        "type": "FeatureCollection",
        "features": [
            {
            "type": "Feature",
            "properties": {
                "popupCOntent" : "SD 2 Kawan"
            },
            "geometry": {
                "coordinates": [
                [
                    [
                    115.3549813825183,
                    -8.461554584235245
                    ],
                    [
                    115.3549813825183,
                    -8.462010819471487
                    ],
                    [
                    115.35525044873106,
                    -8.462010819471487
                    ],
                    [
                    115.35525044873106,
                    -8.461554584235245
                    ],
                    [
                    115.3549813825183,
                    -8.461554584235245
                    ]
                ]
                ],
                "type": "Polygon"
            }
            },
            {
            "type": "Feature",
            "properties": {
                "popupCOntent" :"SMA Negeri 1 Bangli"
            },
            "geometry": {
                "coordinates": [
                [
                    [
                    115.3515792275013,
                    -8.46255576234573
                    ],
                    [
                    115.3515792275013,
                    -8.463117935970715
                    ],
                    [
                    115.35231430930742,
                    -8.463117935970715
                    ],
                    [
                    115.35231430930742,
                    -8.46255576234573
                    ],
                    [
                    115.3515792275013,
                    -8.46255576234573
                    ]
                ]
                ],
                "type": "Polygon"
            }
            }
        ]
        }

            function onEachFeature(feature, layer){
                let popupContent = `Data GeoJSON ${feature.geometry.type}  `;
                if(feature.properties && feature.properties.popupContent){
                    popupContent += feature.properties.popupContent;
                }
                layer.bindPopup(popupContent);
            }


        const geoJson = L.geoJson([hospital,sekolah],{
            style(feature){
                return feature.properties && feature.properties.style 
            },
            onEachFeature,

        }).addTo(map)
        
        // Membuat ikon marker kustom
        var iconMarker = L.icon({
            iconUrl :"{{ asset('storage/marker/marker.png') }}",
            iconSize:     [50, 50], // ukuran ikon
        })

        // Membuat marker dengan ikon kustom
        var marker = L.marker([-8.454068513179749, 115.3563600140712],{
            icon:iconMarker,
            draggable : true // Mengaktifkan fitur drag untuk marker
        })
        .bindPopup('Ada apa disini?') // Menambahkan popup pada marker
        .addTo(map); // Menambahkan marker ke peta

        // var marker2 = L.marker([-8.486668932611492, 115.3173047121189],{
        //     icon:iconMarker,
        //     draggable : true
        // })
        // .bindPopup('Marker 2')
        // .addTo(tourism);

        // var marker3 = L.marker([-8.467268260694425, 115.37084147277473],{
        //     icon:iconMarker,
        //     draggable : true
        // })
        // .bindPopup('Marker 3')
        // .addTo(tourism);
        
        // var marker4 = L.marker([-8.463235720208237, 115.38830801672603],{
        //     icon:iconMarker,
        //     draggable : true
        // })
        // .bindPopup('Marker 4')
        // .addTo(tourism);

        // var marker5 = L.marker([-8.45423663551003, 115.3847031280481],{
        //     icon:iconMarker,
        //     draggable : true
        // })
        // .bindPopup('Marker 5')
        // .addTo(tourism);

        // var marker6 = L.marker([-8.447794725914598, 115.38016590877855],{
        //     icon:iconMarker,
        //     draggable : true
        // })
        // .bindPopup('Marker 6')
        // .addTo(public);


        // // Membuat lingkaran 1
        // var circle = L.circle([-8.645429164002962, 115.25432263477632], {
        //     color: 'green',
        //     fillColor: 'green',
        //     fillOpacity: 0.5,
        //     radius: 50
        // }).addTo(map).bindPopup('Circle'); // Menambahkan popup pada lingkaran 1

        


        // //Membuat Polygon
        // var polygon = L.polygon([
        //     [-8.644531134310702, 115.25254693481176],
        //     [-8.648678430809323, 115.24786916259878],
        //     [-8.64688587091655, 115.25431719264468]
	    // ]).addTo(map).bindPopup('I am a polygon.');


        // //  Membuat Polyline
        // var latlng =[
        //     [-8.649450890832753, 115.25999491195525],
        //     [-8.64833420537685, 115.27081653757861],
        //     [-8.646623148659561, 115.27537109381738],
        //     [-8.64688921071602, 115.27490955541373],
        // ]
        // var polyline = L.polyline(latlng).bindPopup('contoh polyline').addTo(map)
        // map.fitBounds(polyline.getBounds())



        // // Membuat Rectangle
        // const koordinat =[
        //     [-8.642182272017498, 115.25638215799657],
        //     [-8.643459354219631, 115.26479699188323],
        //     [-8.647436525353614, 115.25604999350104],
        //     [-8.646122968887697, 115.26553513520663]
	    // ]
        // var rectangle = L.rectangle(koordinat,{
        //         weight:2, 
        //         fillColor:'yellow'
        //     })
        //     .bindPopup('Contoh rectangle')
        //     .addTo(map)
        // map.fitBounds(koordinat)



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


        var baseMaps ={
            'Open Street Map' : osm,
            'Esri World Imaginary Map' : Esri_World,
            'Esri Nat Geo World Imaginary Map' : Esri_Map,
            'Stadia Alidade Dark Map':Stadia_Dark
        }
        
        // var overlayers ={
        //     'Marker':marker,
        //     'Circle':circle,
        //     'Polygon':polygon,
        //     'Polyline':polyline,
        //     'Rectangle':rectangle,
        //     'Tourism':tourism,
        //     'Public':public
            
        // }
        L.control.layers(baseMaps).addTo(map)

        
    </script>
@endpush

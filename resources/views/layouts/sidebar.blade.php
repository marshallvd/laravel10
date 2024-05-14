<!DOCTYPE html>
<html lang="en">

@extends('layouts.header')

<body>

    <nav class="navbar navbar-dark bg-oldmoney-darkest-charcoal px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="../../index.html">
            <img src="{{ asset('storage/volt/html&css/assets/img/brand/hmti.png') }}"
                    class="card-img-top rounded-circle border-white" alt="Bonnie Green">
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-oldmoney-darkest-charcoal text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div
                class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
                <div class="d-flex align-items-center">
                    <div class="avatar-lg me-4">
                        <img src="{{ asset('storage/volt/html&css/assets/img/brand/hmti.png') }}"
                            class="card-img-top rounded-circle border-white" alt="Bonnie Green">
                    </div>
                    {{-- <div class="d-block">
                        <h2 class="h5 mb-3">Hi, Jane</h2>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Sign Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div> --}}
                </div>
                <div class="collapse-close d-md-none">
                    <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                        aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!--SIDEBAR NAV-->
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item">
                    <a href="{{ route('spots') }}" class="nav-link" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon">
                            <img src="{{ asset('storage/volt/html&css/assets/img/brand/hmti.png') }}" height="20"
                                width="20" >
                        </span>
                        <span class="mt-1 ms-1 sidebar-text">SI - GIS</span>
                    </a>
                </li>

                <!--SIDEBAR MENU-->
                <li class="nav-item {{ Request::is('home') ?'active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>

                
                <li class="nav-item">
                    <span
                        class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#submenu-components">
                        <span>
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        </span> 
                            <span class="sidebar-text">Task List</span>
                        </span>
                        <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </span>
                    </span>
                    <div class="multi-level collapse " role="list"
                        id="submenu-components" aria-expanded="false">
                        <ul class="flex-column nav">
                        <li class="nav-item {{ Request::is('map-tugas1') }}">
                            <a class="nav-link" href="{{ route('map-tugas1') }}">
                            <span class="sidebar-text">Map and Marker</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('map-tugas2') }}">
                            <a class="nav-link" href="{{ route('map-tugas2') }}">
                            <span class="sidebar-text">Circle</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('map-tugas3') }} ">
                            <a class="nav-link" href="{{ route('map-tugas3') }}">
                            <span class="sidebar-text">Polygon</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('map-tugas4') }} ">
                            <a class="nav-link" href="{{ route('map-tugas4') }}">
                            <span class="sidebar-text">Polyline</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('map-tugas5') }}">
                            <a class="nav-link" href="{{ route('map-tugas5') }}">
                            <span class="sidebar-text">Rectangle</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('map-tugas6') }}">
                            <a class="nav-link" href="{{ route('map-tugas6') }}">
                            <span class="sidebar-text">Leaflet Control</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('map-tugas7') }}">
                            <a class="nav-link" href="{{ route('map-tugas7') }}">
                            <span class="sidebar-text">Layer Group</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('map-tugas8') }}">
                            <a class="nav-link" href="{{ route('map-tugas8') }}">
                            <span class="sidebar-text">GeoJSON</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('map-tugas9') }}">
                            <a class="nav-link" href="{{ route('map-tugas9') }}">
                            <span class="sidebar-text">Get Koordinat</span>
                            </a>
                        </li>
                        </ul>
                    </div>
                    </li>

                    <li class="nav-item">
                        <span
                            class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse" data-bs-target="#submenu-data">
                            <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            </span> 
                                <span class="sidebar-text">Master Data</span>
                            </span>
                            <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            </span>
                        </span>
                        <div class="multi-level collapse " role="list"
                            id="submenu-data" aria-expanded="false">
                            <ul class="flex-column nav">
                            <li class="nav-item {{ Request::is('centre-point.index') }}">
                                <a class="nav-link" href="{{ route('centre-point.index') }}">
                                <span class="sidebar-text">Center Point</span>
                                </a>
                            </li>

                            <li class="nav-item ">
                            <a class="nav-link" href="{{route('spot.index')}}">
                                <span class="sidebar-text">Spot</span>
                            </a>
                            </li>
                            
                            </ul>
                        </div>
                        </li>

                <!--SIDEBAR MENU-->

                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
                
                <li class="nav-item ">
                    <a href="{{ route('belum-buat') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Settings</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault(); console.log('Logout link clicked'); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </li>
            
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
            <!--HEADER NAV-->
            
        </div>
    </nav>

    <main class="content">

        <!--HEADER NAV-->
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                        <!-- Search form -->
                        <form class="navbar-search form-inline" id="navbar-search-main">
                            <div class="input-group input-group-merge search-bar">
                                <span class="input-group-text" id="topbar-addon">
                                    <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <input type="text" class="form-control" id="topbarInputIconLeft"
                                    placeholder="Search" aria-label="Search" aria-describedby="topbar-addon">
                            </div>
                        </form>
                        <!-- / Search form -->
                    </div>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center">
                        
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="media d-flex align-items-center">
                                    <img class="avatar rounded-circle" alt="Image placeholder"
                                        src="{{ asset('storage/volt/html&css/assets/img/team/marshall1.jpg') }}">
                                    <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                        <span class="mb-0 font-small fw-bold text-gray-900">Made Marshall Vira Deva</span>
                                    </div>
                                </div>
                            </a>
                            
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <br>
        <!--HEADER NAV-->

        <!--DROPDOWN MENU-->
        {{-- <div class="py-4">
            <div class="dropdown">
                <button class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    New Task
                </button>
                <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                            </path>
                        </svg>
                        Add User
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                            </path>
                        </svg>
                        Add Widget
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                            </path>
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                        </svg>
                        Upload Files
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Preview Security
                    </a>
                    <div role="separator" class="dropdown-divider my-1"></div>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Upgrade to Pro
                    </a>
                </div>
            </div>
        </div> --}}
        <!--DROPDOWN MENU-->

        <!--DISPLAY CONTENT-->
        <div class="row">
        
            @yield('content')
        </div>

        @extends('layouts.footer')
        <!--DISPLAY CONTENT-->

        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const sidebarToggle = document.querySelector('.navbar-toggler');
                sidebarToggle.addEventListener('click', function () {
                    document.getElementById('sidebar').classList.toggle('collapse');
                });
                @if(session('status'))
                    toastr.success('{{ session('status') }}');
                @endif
            });
        </script>
</body>

</html>

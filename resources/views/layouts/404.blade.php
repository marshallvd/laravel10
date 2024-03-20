<!--

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

@extends('layouts.header')

<body>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
    

    <main>
        <section class="vh-100 d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center d-flex align-items-center justify-content-center">
                        <div>
                            <img class="img-fluid w-100" src="storage/volt/html&css/assets/img/illustrations/404.svg" alt="404 not found">
                            <h1 class="mt-5">Page not <span class="fw-bolder text-primary">found</span></h1>
                            <p class="lead my-4">Hehee.. Sepertinya tugas belum dibuat :v</p>
                            <a href="{{ route('home') }}" class="btn btn-gray-800 d-inline-flex align-items-center justify-content-center mb-4">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                                Back to homepage
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


@extends('layouts.footer')
</body>

</html>

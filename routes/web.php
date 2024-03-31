<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// Route::get('/', function () {
//     return view('spots');
// });

Route::get('/', [\App\Http\Controllers\HomeController::class, 'spots']);


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/belum-buat', [App\Http\Controllers\HomeController::class, 'belum_buat'])->name('belum-buat');


Route::get('/map-tugas1', [App\Http\Controllers\HomeController::class, 'map_tugas1'])->name('map-tugas1');

Route::get('/map-tugas2', [App\Http\Controllers\HomeController::class, 'map_tugas2'])->name('map-tugas2');

Route::get('/map-tugas3', [App\Http\Controllers\HomeController::class, 'map_tugas3'])->name('map-tugas3');

Route::get('/map-tugas4', [App\Http\Controllers\HomeController::class, 'map_tugas4'])->name('map-tugas4');

Route::get('/map-tugas5', [App\Http\Controllers\HomeController::class, 'map_tugas5'])->name('map-tugas5');

Route::get('/map-tugas6', [App\Http\Controllers\HomeController::class, 'map_tugas6'])->name('map-tugas6');

Route::get('/map-tugas7', [App\Http\Controllers\HomeController::class, 'map_tugas7'])->name('map-tugas7');

Route::get('/map-tugas8', [App\Http\Controllers\HomeController::class, 'map_tugas8'])->name('map-tugas8');

Route::get('/map-tugas9', [App\Http\Controllers\HomeController::class, 'map_tugas9'])->name('map-tugas9');


// Route Datatable
Route::get('/centre-point/data', [\App\Http\Controllers\Backend\DataController::class, 'centrepoint'])->name('centre-point.data');


Route::get('/spot/data', [\App\Http\Controllers\Backend\DataController::class, 'spot'])->name('spot.data');


Route::resource('centre-point', (\App\Http\Controllers\Backend\CentrePointController::class));

Route::resource('spot', (\App\Http\Controllers\Backend\SpotController::class));


Route::get('/spots',[\App\Http\Controllers\HomeController::class,'spots'])->name('spots');

Route::get('/detail-spot/{id}',[\App\Http\Controllers\HomeController::class,'detailSpot'])->name('detail-spot');
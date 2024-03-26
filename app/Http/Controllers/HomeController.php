<?php

namespace App\Http\Controllers;

use App\Models\Centre_Point;
use App\Models\Spot;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function belum_buat(){
        return view('layouts.404');
    }

    public function map_tugas1(){
        return view('leaflet.map-tugas1');
    }
    
    public function map_tugas2(){
        return view('leaflet.map-tugas2');
    }

    public function map_tugas3(){
        return view('leaflet.map-tugas3');
    }

    public function map_tugas4(){
        return view('leaflet.map-tugas4');
    }
    
    public function map_tugas5(){
        return view('leaflet.map-tugas5');
    }

    public function map_tugas6(){
        return view('leaflet.map-tugas6');
    }

    public function map_tugas7(){
        return view('leaflet.map-tugas7');
    }

    public function map_tugas8(){
        return view('leaflet.map-tugas8');
    }

    public function map_tugas9(){
        return view('leaflet.map-tugas9');
    }

    public function spots(){
        $centerPoint = Centre_Point::get()->first();
        $spot =Spot::get();

        return view('frontend.home',[
            'centerPoint'=>$centerPoint,
            'spot'=>$spot
        ]);
    }

    public function detailSpot($id){
        $spot =Spot::findOrFail('id',$id)->first();
        return view('frontend.detail',['spot'=>$spot]);
    }
}

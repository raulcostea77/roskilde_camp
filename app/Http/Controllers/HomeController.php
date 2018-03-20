<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GoogleMaps;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        $request->user()->authorizeRoles(['masturbator', 'pimp']);


        // $response = \GoogleMaps::load('geolocate')->get();
        // print_r($response);
        
        

        return view('home');
    }
}

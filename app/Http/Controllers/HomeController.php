<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GoogleMaps;
use App\Camp;
use JavaScript;

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
        $camp = Camp::where('name','=','Long Dick')->first();


        JavaScript::put([
            'savedCampLat' => $camp->latitude,
            'savedCampLong' => $camp->longitude,
         ]);    

        return view('home')->with('role',$request->user()->roles()->first()->name);
    }
}

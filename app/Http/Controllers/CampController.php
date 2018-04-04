<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camp;

class CampController extends Controller
{
    public function saveCamp(Request $request){

        $camp =  Camp::where('name','=','Long Dick')->first();
        if($camp === null){
            $camp = new Camp;
        }
        
        $camp->latitude = $request->camp_latitude;
        $camp->longitude = $request->camp_longitude;
        $camp->save();


        return view('home')->with('role',$request->user()->roles()->first()->name);

    }
}

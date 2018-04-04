<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camp;
use GoogleMaps;


class CampController extends Controller
{
    public function saveCamp(Request $request){

      /*  $place = GoogleMaps::load('placeadd')
                ->setParam([
                   'location' => [
                        'lat'  => $request->camp_latitude,
                        'lng'  => $request->camp_longitude
                      ],
                   'accuracy'           => 0,
                   "name"               =>  "Camp Long Dick",
                   "address"            => "Roskilde, Denmark",
                   "types"              => ["dick_store"],
                   "website"            => "",
                   "language"           => "",
                   "phone_number"       =>  "(42) LONG DICK"                       
                          ])
                  ->get();

        var_dump($place);
        exit;  
*/





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

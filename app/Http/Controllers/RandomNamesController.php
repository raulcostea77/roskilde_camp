<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Random_names;

class RandomNamesController extends Controller
{

    public function index(){
        $randomNames = new Random_names;
        if($randomNames::count() == 6) {
            $nextVisible = 0;
            $startVisible = 1;
        }
        else{
            $nextVisible = 1;
            $startVisible = 0; 
        }

        return view('random')->with('startVisible',$startVisible)->with('nextVisible',$nextVisible);
    }

    public function startNewGame(){
        $nextVisible = 1;


        $players = array(
            array('id'=>'1', 'playa'=>'Raul'),
            array('id'=>'2', 'playa'=>'Oliver'),
            array('id'=>'3', 'playa'=>'Andrei'),
            array('id'=>'4', 'playa'=>'Teo'),
            array('id'=>'5', 'playa'=>'Emil'),
            array('id'=>'6', 'playa'=>'Jones'),
        );

        $randomNames = new Random_names;

        if (!$randomNames->first()) { 
            $randomNames::insert($players);
        }

        return view('random')->with('startVisible',0)->with('nextVisible',$nextVisible);

    }

    public function nextLoser(){
        $nextVisible = 1;
        $randomNames = new Random_names;
        $idiotsCount = $randomNames::count();
        if($idiotsCount){
            if($idiotsCount == 1){
                $nextVisible = -1;
            }
            $randomUser = $randomNames::inRandomOrder()->first();
            $randomUser->delete();

        }
        return view('random')->with('randomUser', $randomUser->playa)->with('startVisible',0)->with('nextVisible',$nextVisible);
    }
}

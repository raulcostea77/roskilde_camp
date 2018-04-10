<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GoogleMaps;
use App\Camp;
use JavaScript;
use App\Group;
use App\User;

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

        $groups = auth()->user()->groups;
        $users = User::where('id', '<>', auth()->user()->id)->get();
        $user = auth()->user();


        JavaScript::put([
            'savedCampLat' => $camp->latitude,
            'savedCampLong' => $camp->longitude,
         ]);

         // var_dump('users:'. $users);    
         // var_dump('user:'.$user);    
         // // var_dump('groups:'.$groups);
         // exit;    

        return view('home' ,[   
                                'groups' => $groups, 
                                'users' => $users, 
                                'user' => $user, 
                                'role' => $request->user()->roles()->first()->name  
                            ]);
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

     public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }


     public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $existingUser =  User::where('email', '=', $user->getEmail())->first();

        if ($existingUser === null) {
            
            $newUser = new User;
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->avatar = $user->getAvatar();
            
            $newUser->save();
        }


        // $user->token;
    }
}

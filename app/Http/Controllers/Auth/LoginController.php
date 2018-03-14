<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

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
        var_dump($user->getName());
        exit;

        // $user->token;
    }
}

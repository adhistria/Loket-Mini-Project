<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback()
    {
        $check_user = Socialite::driver('twitter')->user();
        $access_token = $check_user->token;
        $access_token_secret = $check_user->tokenSecret;
        $twitter_id = $check_user->getId();
        $find_user = User::where('twitter_id', '=', $twitter_id)->first();
        if ($find_user) {
            $user = $find_user;
        } else {
            $user = User::create([
                'name' => ucwords(strtolower($check_user->getName())),
                'email' => $check_user->getEmail(),
                'twitter_id' => $twitter_id,
                'remember_token' => $access_token
            ]);
            $user->save();
        }
//        setcookie("access_token", " ", time()-3600);
        setcookie("access_token", $access_token, time()+10000000);
//        setcookie("access_token_secret", " ", time()-3600);
        setcookie("access_token_secret", $access_token_secret, time()+10000000);
        auth()->login($user);
        return redirect()->to('/dashboard');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}

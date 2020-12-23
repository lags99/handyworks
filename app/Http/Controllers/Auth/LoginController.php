<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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





    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['guest', 'guest:admin'])->except('logout');
    }
    protected function redirectTo()
    {
        if (auth()->user()->status === "Not Complete") {
            return RouteServiceProvider::INCOMPLETE;
        } else {
            return RouteServiceProvider::HOME;
        }
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $userGoogle = Socialite::driver('google')->user();

        $findUser = User::where('email', $userGoogle->getEmail())->first();
        if ($findUser) {
            Auth::login($findUser);
            if ($findUser->status === "Not Complete") {
                return redirect(route('complete_profile'));
            } else {
                return redirect(route('home'));
            }
        } else {
            return redirect()->route('pre_register')->withInput([
                'full_name' => $userGoogle->getName(),
                'email' => $userGoogle->getEmail(),
                'profile_picture' => $userGoogle->getAvatar(),
            ])->with('success', 'We got the credentials, please complete the form.');
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        $userFacebook = Socialite::driver('facebook')->user();
        $findUser = User::where('email', $userFacebook->getEmail())->first();
        if ($findUser) {
            Auth::login($findUser);
            if ($findUser->status === "Not Complete") {
                return redirect(route('complete_profile'));
            } else {
                return redirect(route('home'));
            }
        } else {
            return redirect()->route('pre_register')->withInput([
                'full_name' => $userFacebook->getName(),
                'email' => $userFacebook->getEmail(),
                'profile_picture' => $userFacebook->getAvatar(),
            ])->with('success', 'We got the credentials, please complete the form.');
        }
    }
}

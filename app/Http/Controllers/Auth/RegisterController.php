<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\City;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    protected function redirectTo()
    {
        if (auth()->user()->status === "Not Complete") {
            return RouteServiceProvider::INCOMPLETE;
        } else {
            return RouteServiceProvider::HOME;
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'full_name.regex' => 'Please enter your full name'
        ];
        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:255', 'regex:/(?:(\w+-?\w+)) (?:(\w+))(?: (\w+))?$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users',],
            'birth_date' => ['required', 'date', 'date_format:Y-m-d'],
            'gender' => ['required',],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'city' => ['required']
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'full_name' => $data['full_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'birth_date' => date_format(date_create($data['birth_date']), 'Y-m-d h:i:s'),
            'city_id' => $data['city'],
            'password' => Hash::make($data['password']),
            'profile_picture' => $data['profile_picture']
        ]);
    }
    public function registerForm()
    {
        $cities = City::orderBy('name', 'asc')->get();
        return view('auth.register', ['cities' => $cities]);
    }
}

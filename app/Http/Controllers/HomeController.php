<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function complete_profile()
    {
        $services = Service::orderBy('service_name', 'asc')->get();
        return view('auth.complete-profile', ['services' => $services]);
    }
    public function upload_profile(Request $request)
    {
        $currentUser = auth()->user();
        $messages = [
            'profile_picture.max' => "File size should be maximum of 2MB "
        ];
        $this->validate($request, [
            "profile_picture" => ["required", "max:1999", "image"]
        ], $messages);
        if ($request->hasFile('profile_picture')) {
            $fileNameWithExt = $request->profile_picture->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $fileExt = $request->profile_picture->getClientOriginalExtension();

            $fileNameToUpload = $fileName . '_' . time() . '.' . $fileExt;

            $request->profile_picture->storeAs('public/profile_pictures', $fileNameToUpload);
        }

        $user = User::find($currentUser->id);

        if ($request->hasFile('profile_picture')) {
            $user->profile_picture = $fileNameToUpload;
        }

        $user->save();
        return redirect()->back();
    }
    public function add_personal_info(Request $request)
    {
        $currentUser = auth()->user();
        $messages = [
            'phone.regex' => "This should not be greater than 12 characters",
            'postal_code.regex' => "This should not be greater than 4 characters",
        ];
        $this->validate($request, [
            'street_address' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'numeric', 'regex:/^\d{10,12}$/'],
            'postal_code' => ['required', 'numeric', 'regex:/^\d{1,4}$/'],
        ], $messages);

        $user = User::find($currentUser->id);
        $user->street_address = $request->street_address;
        $user->phone = $request->phone;
        $user->postal_code = $request->postal_code;

        $user->save();
        return redirect()->back();
    }
    public function set_complete(Request $request)
    {
        if ($request->user()->checkIfCompleted()) {
            $request->user()->status = "Profile Complete";
            $request->user()->save();
            return redirect(route('home'))->with('profile_finished', "Profile Completed");
        }
        return redirect()->back()->with('error', "Profile Not Completed");
    }
}

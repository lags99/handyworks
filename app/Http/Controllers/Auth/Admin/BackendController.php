<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ProfileUnaccepted;
use App\Models\User;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Post;

class BackendController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // GET
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->with(['specializations', 'interview'])->paginate(10);
        return view('auth.admin.dashboard', ['users' => $users]);
    }

    public function view_posts()
    {

        return view('pages.admin.posts');
    }

    public function view_user(User $user)
    {
        return view('auth.admin.view-profile', ['user' => $user]);
    }

    //POST / PUT / DELETE
    public function set_approved(Request $request, Specialization $specialization)
    {
        $specialization->approved = $request->approved;
        $specialization->save();

        return redirect()->back();
    }
    public function not_accepted(User $user)
    {
        $user->status = "Not Accepted";
        $user->save();
        Mail::to($user)->send(new ProfileUnaccepted());
        return redirect()->back()->with('success', 'User Not Accepted');
    }
}

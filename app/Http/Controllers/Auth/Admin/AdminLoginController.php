<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['guest:admin', 'guest']);
    }

    public function index()
    {
        return view('pages.admin.index');
    }
    public function admin_login(Request $request)
    {
        $this->validate($request, [
            'username' => ['required', 'string', 'exists:admins,username'],
            'password' => ['required', 'min:8']
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended(route('backend'));
        }
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        // dd($request);
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Wrong Credentials');
        }
    }

    public function logout()
    {
        auth::logout();
        return redirect('/');
    }
}

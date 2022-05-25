<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    public function index()
    {
        return view('site.modules.user.index');
    }

    public function update(User $user, Request $request)
    {
        $user->update($request->all());
        return redirect()->back()->with('success', 'User updated Successfully');
    }

    
}

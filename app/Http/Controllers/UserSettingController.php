<?php

namespace App\Http\Controllers;

use App\Models\ReservationTime;
use Illuminate\Http\Request;

class UserSettingController extends Controller
{
    public function index()
    {
        return view('site.modules.user.appointments');
    }
}

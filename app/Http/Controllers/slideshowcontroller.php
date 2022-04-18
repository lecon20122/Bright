<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class slideshowcontroller extends Controller
{
    public function slideshow()
    {
        return view('slideshow');
    }
}

<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageHelper
{
    public static function uploadImage($image)
    {
        $fileName   = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = 'app/public/images';
        $filePath = $destinationPath .  '/' . $fileName;
        $image->move(public_path($destinationPath), $fileName);
        return $filePath;
    }
}

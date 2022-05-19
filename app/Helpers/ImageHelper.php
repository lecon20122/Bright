<?php

namespace App\Helpers;


class ImageHelper
{
    public static function uploadImage($image)
    {
        $fileName   = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = 'images/users';
        $image->move(public_path($destinationPath), $fileName);
        return $fileName;
    }
}

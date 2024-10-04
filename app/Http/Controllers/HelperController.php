<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class HelperController extends Controller
{
    public static function getSlug($string){
        return Str::slug($string);
    }
}

<?php

namespace app\CPU;

use Illuminate\Support\Str;

class Helpers{
    public static function getSlug($string){
        return Str::slug($string);
    }
}
?>
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    // use HasFactory;
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts(){
        $this->hasMany(posts::class, 'category', 'slug');
    }
}

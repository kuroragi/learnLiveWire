<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $guard = 'id';

    protected $fillable = [
        'content_title', 'content', 'header_image' 
    ];
}

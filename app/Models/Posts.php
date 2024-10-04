<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $guarded = 'id';

    protected $fillable = [
        'content_title', 'content', 'header_image' 
    ];

    public function comments(){
        $this->hasMany(PostComment::class, 'di_post', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsAttachment extends Model
{
    use HasFactory;

    protected $guarded = 'id';

    protected $fillable = [
        'id_post', 'attachment'
    ];
}

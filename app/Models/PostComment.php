<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $guarded = 'id';

    protected $fillable = [
        'id_post', 'body'
    ];

    public function post(){
        $this->belongsTo(Posts::class, 'id_post', 'id');
    }
}

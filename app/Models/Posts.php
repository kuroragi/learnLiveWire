<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Posts extends Model
{
    use HasFactory;

    // protected $guarded = 'id';

    protected $fillable = [
        'content_title', 'content', 'header_image' 
    ];

    public function comments(){
        $this->hasMany(PostComment::class, 'di_post', 'id');
    }

    /**
     * Get the getCategory that owns the Posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getCategory(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'category', 'slug');
    }
}

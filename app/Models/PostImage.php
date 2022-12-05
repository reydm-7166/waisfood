<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;

    protected $fillable = ['post_unique_id', 'image_name'];

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }

}

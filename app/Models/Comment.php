<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'post_id', 'recipe_id', 'comment_content'];

    protected $dates = ['created_at', 'updated_at', 'disabled_at','mydate'];

    public function posts(){
        return $this->belongsTo(Post::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['unique_id', 'user_id', 'post_title', 'post_content'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function saved_posts(){
        return $this->hasMany(SavedPost::class);
    }
    
    public function likes(){
        return $this->hasMany(Post::class);
    }

    public function post_images() {
        return $this->hasMany(PostImage::class);
    }
    
    public function categories() {
        return $this->hasMany(Category::class);
    }

    public function taggables()
    {
        return $this->hasMany(Taggable::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = ['post_id', 'user_id', 'like'];

    public function posts(){
        return $this->belongsTo(Post::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}

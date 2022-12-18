<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    use HasFactory;

    protected $fillable = ['taggable_id', 'taggable_type', 'tag_name'];
    
    public $timestamps = false;

    public function posts(){
        return $this->belongsTo(Post::class);
    }
    public function recipes(){
        return $this->belongsTo(Recipe::class);
    }
}

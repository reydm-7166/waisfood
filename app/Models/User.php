<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    

    protected $hidden = ['password'];

    protected $fillable = ['unique_id','first_name', 'last_name', 'age', 'email_address', 'password', 'service_id', 'profile_picture'];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function likes(){
        return $this->hasMany(Post::class);
    }

    public function saved_posts(){
        return $this->hasMany(SavedPost::class);
    }
    
    public function saved_recipes()
    {
        return $this->hasMany(SavedRecipe::class);
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}

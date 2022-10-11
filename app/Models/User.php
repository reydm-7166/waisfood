<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $hidden = ['password'];

    protected $fillable = ['unique_id','first_name', 'last_name', 'age', 'email_address', 'password', 'profile_picture'];

    public function post(){

        return $this->hasMany(Post::class);
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}

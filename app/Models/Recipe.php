<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    // public $timestamps = false;
    use HasFactory;

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
    public function directions()
    {
        return $this->hasMany(Direction::class);
    }
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
    public function recipe_images()
    {
        return $this->hasMany(DishImage::class);
    }
}

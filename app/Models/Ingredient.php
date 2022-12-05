<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'recipe_id', 'ingredient', 'measurement'];
    
    use HasFactory;

    public function dishes() {
        return $this->belongsTo(Dish::class);
    }
}

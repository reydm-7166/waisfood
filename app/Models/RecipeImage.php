<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeImage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['recipe_id', 'recipe_image'];

    public function recipes() {
        return $this->belongsTo(Recipe::class);
    }
}

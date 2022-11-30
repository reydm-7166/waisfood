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
    
    public function taggables()
    {
        return $this->hasMany(Taggable::class);
    }

    public function saved_recipes()
    {
        return $this->hasMany(SavedRecipe::class);
    }

    public function hasIngredients(array $ingredientsProvided) {
        $ingredients = [];
        foreach ($this->ingredients as $i)
            array_push($ingredients, $i->ingredient);

        foreach ($ingredientsProvided as $i)
            if (!in_array($i, $ingredients))
                return false;

        return true;
    }

    public static function getRecipesWithIngredients(array $ingredientsProvided) {
        return Recipe::whereRelation('ingredients', 'ingredient', '=', $ingredientsProvided);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedRecipe extends Model
{
    use HasFactory;

    protected $table = 'saved_recipes';

    protected $fillable = ['user_id', 'recipe_id', 'like'];

    public function recipes(){
        return $this->belongsTo(Recipe::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

}

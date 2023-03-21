<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeLog extends Model
{
    use HasFactory;

    protected $fillable = ['recipe_id', 'user_id', 'admin_name', 'status', 'action'];

    public function recipes() {
        return $this->belongsTo(Recipe::class);
    }

}

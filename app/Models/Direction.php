<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id', 'recipe_id', 'direction_number', 'direction'];
    
    public function dishes() {
        return $this->belongsTo(Recipe::class);
    }
}

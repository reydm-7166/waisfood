<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = ['user_id', 'recipe_id', 'review', 'rating'];

    protected $dates = ['created_at', 'updated_at', 'disabled_at','mydate'];

    public function recipes() {
        return $this->belongsTo(Recipe::class);
    }
}

<?php

namespace App\Http\Livewire\Pages\RecipeGeneratorPages\GeneratorTwoPage;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Feedback;
use App\Models\Ingredient;
use App\Models\Direction;
use App\Models\User;
use App\Models\Taggable;
use App\Models\RecipeImage;
use DB;


class GeneratorTwo extends Component
{
    public function render()
    {
        return view('livewire.pages.recipe-generator-pages.generator-two-page.generator-two');
    }
}

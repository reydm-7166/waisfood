<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\DishImage;
use Livewire\WithPagination;

class Pagination extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function getQueryString()
    {
        return [];
    }

    public function render()
    {
        $dish = Dish::paginate(12);
        
        foreach ($dish->items() as $key => $value) {

            $dish[$key]->ingredient_count = Ingredient::where('dish_id', $value->id)->count(); 
        }   
        return view('livewire.pagination', [
            'dish' => $dish,
        ]);
    }
}

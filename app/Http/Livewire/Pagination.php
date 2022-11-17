<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\DishImage;
use Livewire\WithPagination;
use DB;

class Pagination extends Component
{

    public $search;
    
    use WithPagination;


    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];
   
    protected $listeners = ['reload' => '$refresh'];

    
    public function render()
    {
        if($this->search)
        {
            $dish = Dish::where('dish_name', 'LIKE', "%{$this->search}%")->paginate(12);
        } else 
        {
            $dish = Dish::paginate(12);
        }

        foreach ($dish->items() as $key => $value) {
    
            $dish[$key]->ingredient_count = Ingredient::where('dish_id', $value->id)->count(); 
        }   


        return view('livewire.pagination', [
            'dish' => $dish,
            'query' => $this->search,
            'message' => (count($dish) == 0) ? true : false
        ]);

    }

    public function updated($property)
    {

        if($property == 'search')
        {
            $this->resetPage();
        }
    }

}
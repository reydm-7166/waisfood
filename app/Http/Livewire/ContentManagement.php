<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use App\Models\Feedback;
use App\Models\Taggable;

use Livewire\Component;
use Livewire\WithPagination;

class ContentManagement extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    // protected $queryString = ['filter'];

    public $name_atoz;

    public function mount()
    {
        //if this is set to true, it sets the sortation by recipe name (a to z) amnd if false (z to a)
        $this->name_atoz = true;
    }

    public function set_to_true()
    {
        //this flips the value of atoz sort
        ($this->name_atoz == true) ? $this->name_atoz = false : $this->name_atoz = true;
    }

    public function render()
    {
        $recipe_default = Recipe::where('is_approved', 1);

        if($this->name_atoz == false)
        {
            $recipe_default = $recipe_default->orderBy('recipe_name')->paginate(12);
        }
        elseif($this->name_atoz == true)
        {
            $recipe_default = $recipe_default->orderBy('recipe_name', 'desc')->paginate(12);
        }
        else 
        {
            $recipe_default = $recipe_default->orderBy('id', 'asc')->paginate(12);
        }

        foreach($recipe_default as $key => $value)
        {
            $recipe_default[$key]->avg_rating = Feedback::where('recipe_id', $value->id)->avg('rating');

            $recipe_default[$key]->feedback_count = Feedback::where('recipe_id', $value->id)->count();

            $recipe_default[$key]->tag_name = Taggable::where('taggable_id', $value->id)->where('taggable_type', 'recipe')->value('tag_name');
        }

        return view('livewire.content-management', [
            'recipes' => $recipe_default
        ]);
    }


}

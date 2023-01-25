<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use App\Models\Feedback;
use App\Models\Taggable;
use App\Models\RecipeImage;
use App\Http\Resources\UserCollection;
use Livewire\Component;
use Livewire\WithPagination;

class ContentManagement extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    // protected $queryString = ['filter'];

    public $name_atoz;

    public $published;

    public $recipe_id;


    protected $listeners = [
        'changePublishedStatus' => 'changePublishedStatus',
        'refreshComponent' => '$refresh',
    ];

    public function init()
    {
        $this->emit('refreshComponent');
    }

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

    public function set_to_default()
    {
        $this->reset('name_atoz');

    }
    //this prompts the dialog box to confirm or not
    public function pubUnpubPrompt($recipe_id)
    {
        $this->recipe_id = $recipe_id;
        $recipe = Recipe::withTrashed()->find($this->recipe_id);
         //if the recipe is published, then unpub it. -- prompt
        if(is_null($recipe->deleted_at))
        {
            $this->dispatchBrowserEvent('confirm-unpub');
        }
        //if it is unpublished, publish it. --prompt
        else
        {
            $this->dispatchBrowserEvent('confirm-pub');
        }


    }
    //this updates the value
    public function changePublishedStatus()
    {
        $recipe = Recipe::withTrashed()->find($this->recipe_id);

        //if the recipe is published, then unpub it.
        if(is_null($recipe->deleted_at))
        {
            $recipe->delete();
            $this->emit('refreshComponent');
        }
        //if it is unpublished, publish it.
        else
        {
            $recipe->restore();
            $this->emit('refreshComponent');
        }

    }



    public function render()
    {
        $recipe_default = Recipe::where('is_approved', 1);

        if(is_null($this->name_atoz))
        {
            $recipe_default = $recipe_default->withTrashed()->orderBy('id', 'asc')->paginate(12);
        }
        elseif($this->name_atoz == true)
        {
            $recipe_default = $recipe_default->withTrashed()->orderBy('recipe_name')->paginate(12);
        }
        elseif($this->name_atoz == false)
        {
            $recipe_default = $recipe_default->withTrashed()->orderBy('recipe_name', 'desc')->paginate(12);
        }

        foreach($recipe_default as $key => $value)
        {
            $recipe_default[$key]->avg_rating = Feedback::where('recipe_id', $value->id)->avg('rating');

            $recipe_default[$key]->feedback_count = Feedback::where('recipe_id', $value->id)->count();

            $recipe_default[$key]->tag_name = Taggable::where('taggable_id', $value->id)->where('taggable_type', 'recipe')->value('tag_name');

            $recipe_default[$key]->recipe_image = RecipeImage::where('recipe_id', $value->id)->value('recipe_image');

            $deleted = Recipe::where('id', $value->id)->withTrashed()->get();

            $recipe_default[$key]->published = ($deleted[0]->deleted_at == NULL) ? true : false;

        }

        return view('livewire.content-management', [
            'recipes' => $recipe_default
        ]);
    }


}

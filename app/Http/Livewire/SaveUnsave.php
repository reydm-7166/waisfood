<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Recipe;
use App\Models\SavedRecipe;

use Auth;


class SaveUnsave extends Component
{

    public $is_saved;
    public $author_id;
    public $type_of;
    public $recipe_id;

    public function mount()
    {

    }
    public function unsave()
    {
        if($this->type_of == 'recipe')
        {
            $unsave = SavedRecipe::where('user_id', Auth::user()->id)->where('recipe_id', $this->recipe_id)->delete();

            $this->is_saved = false;

            $this->dispatchBrowserEvent('recipe-unsave');

            $this->reset(['recipe_id', 'type_of', 'is_saved']);

        }
    }

    public function save()
    {
        if($this->type_of == 'recipe')
        {
            $unsave = SavedRecipe::create([
                'user_id' => Auth::user()->id,
                'recipe_id' => $this->recipe_id
            ]);
            
            $this->is_saved = true;

            $this->dispatchBrowserEvent('recipe-save');

            $this->reset(['recipe_id', 'type_of']);

            $this->is_saved = true;
        }
    }
    public function render()
    {

        return view('livewire.save-unsave', [
            'is_saved' => $this->is_saved,
            'author_id' => $this->author_id,
            'recipe_id' => $this->recipe_id
        ]);
    }
}

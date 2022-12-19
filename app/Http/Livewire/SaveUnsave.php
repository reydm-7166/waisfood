<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SavedRecipe;
use Auth;

class SaveUnsave extends Component
{
    public $recipe_id;
    public $saved_status;
    
    public function login_prompt()
    {
        $this->dispatchBrowserEvent('login-popup');
    }

    public function save_unsave($user_id)
    { 
        $saved_status = SavedRecipe::where('recipe_id', $this->recipe_id)->where('user_id', $user_id);
        //if true that means the post is saved on his account and since he click the bookmark button we will remove it from his saved items
        if($this->saved_status == true)
        {
            $get_id = $saved_status->get('id');

            $save_unsave = $saved_status->delete();

            $this->saved_status = false;

            $this->dispatchBrowserEvent('item-unsaved');
        }
        //this means that the item is not saved in his account  and since he click the bookmark button we will add it to his saved items
        else
        {
            SavedRecipe::create([
                'recipe_id' => $this->recipe_id,
                'user_id' => $user_id
            ]);

            $this->saved_status = true;

            $this->dispatchBrowserEvent('item-saved');
        }
    }

    public function mount()
    {
        if(Auth::check())
        {
            $saved_status = SavedRecipe::where('recipe_id', $this->recipe_id)->where('user_id', Auth::user()->id);

            if($saved_status->exists())
            {
                $this->saved_status = true;
            }
            else 
            {
                $this->saved_status = false;
            }
        }
    }


    public function render()
    {
        return view('livewire.save-unsave');
    }
}

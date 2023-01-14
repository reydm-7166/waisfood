<?php

namespace App\Http\Livewire\Pages\SavedItemsPage;

use Livewire\Component;
use Auth;
use App\Models\Recipe;
use App\Models\SavedRecipe;
use App\Models\Comment;
use App\Models\Feedback;
use App\Models\SavedPost;
use App\Models\Post;
use App\Models\User;

class SavedItems extends Component
{
    public $user_id;

    public $recipe;
    public $status;


    public function mount()
    {
        $this->user_id = Auth::user()->id;

        $this->all_saved();

    }

    public function saved_status()
    {
        $this->reset(['status', 'recipe']);

        $saved_status = SavedPost::where('user_id', $this->user_id)->get();

        //get saved recipe

        foreach($saved_status as $key => $value)
        {
            $saved_status[$key]->status_detail = Post::where('id', $value->id)->get();

            $saved_status[$key]->author_name = User::where('id', $saved_status[$key]->status_detail[0]->user_id)->value('first_name');;

            $saved_status[$key]->status_comment = Comment::where('user_id', $this->user_id)->where('post_id', $value->id)->count();
        }

        $this->status = $saved_status;

    }

    public function saved_recipe()
    {

        $this->reset(['status', 'recipe']);

        $saved_recipe = SavedRecipe::where('user_id', $this->user_id)->get();

        //get saved recipe

        foreach($saved_recipe as $key => $value)
        {

            $saved_recipe[$key]->recipe_detail = Recipe::where('id', $value->recipe_id)->get();

            if($saved_recipe[$key]->recipe_detail[0]->is_approved == 0)
            {
                $saved_recipe[$key]->recipe_comment = Comment::where('user_id', $this->user_id)->where('recipe_id', $value->recipe_id)->count();
            }
            else
            {
                $saved_recipe[$key]->recipe_comment = Feedback::where('recipe_id', $value->recipe_id)->count();
            }

        }
        //save the colelction to recipe details property
        $this->recipe = $saved_recipe;
    }

    public function all_saved()
    {
        $this->reset(['status', 'recipe']);

        //get the recipe first
        $saved_recipe = SavedRecipe::where('user_id', $this->user_id)->get();

        //get saved recipe

        foreach($saved_recipe as $key => $value)
        {

            $saved_recipe[$key]->recipe_detail = Recipe::where('id', $value->recipe_id)->get();

            if($saved_recipe[$key]->recipe_detail[0]->is_approved == 0)
            {
                $saved_recipe[$key]->recipe_comment = Comment::where('user_id', $this->user_id)->where('recipe_id', $value->recipe_id)->count();
            }
            else
            {
                $saved_recipe[$key]->recipe_comment = Feedback::where('recipe_id', $value->recipe_id)->count();
            }

        }
        //save the colelction to recipe details property
        $this->recipe = $saved_recipe;

        //get the status
        $saved_status = SavedPost::where('user_id', $this->user_id)->get();

        //get saved status

        foreach($saved_status as $key => $value)
        {
            $saved_status[$key]->status_detail = Post::where('id', $value->id)->get();

            $saved_status[$key]->author_name = User::where('id', $saved_status[$key]->status_detail[0]->user_id)->value('first_name');;

            $saved_status[$key]->status_comment = Comment::where('user_id', $this->user_id)->where('post_id', $value->id)->count();
        }

        $this->status = $saved_status;

    }

    public function render()
    {

        return view('livewire.pages.saved-items-page.saved-items', [
            'recipe' => (!empty($this->recipe)) ? $this->recipe : '',
            'status' => (!empty($this->status)) ? $this->status : '',

        ]);
    }
}

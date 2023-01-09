<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Recipe;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Taggable;

class RecipeApproval extends Component
{
    // public $recipe_post;

    public $highest_vote = true;
    public $atoz = true;

    public function mount()
    {

    }

    public function set_to_true()
    {

        //this flips the value of highest to lowest sort
        ($this->highest_vote == true) ? $this->highest_vote = false : $this->highest_vote = true;
    }


    public function render()
    {

        $recipe_post = Recipe::where('is_approved', 0)->paginate(12);

        foreach($recipe_post as $key => $value)
        {
            $recipe_post[$key]->upvote_count =  Like::where('recipe_id', $value->id)->sum('like');

            $recipe_post[$key]->comment_count = Comment::where('recipe_id', $value->id)
                                                        ->count();

            $recipe_post[$key]->tag_name = Taggable::where('taggable_id', $value->id)->where('taggable_type', 'recipe')->value('tag_name');
        }
        return view('livewire.recipe-approval', [
            'recipe_post' => $recipe_post
        ]);
    }
}

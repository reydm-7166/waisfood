<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Recipe;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Taggable;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovalRequest;
use App\Mail\TestingEmail;
use Exception;


class RecipeApproval extends Component
{
    // public $recipe_post;

    public $highest_vote = true;
    public $atoz = true;


    public function set_to_true()
    {
        //this flips the value of highest to lowest sort
        ($this->highest_vote == true) ? $this->highest_vote = false : $this->highest_vote = true;
    }

    public function email($id, $email)
    {
        $recipe = Recipe::find($id);

        $link = ("https://www.waisfood.website/recipe-post/" . $recipe->recipe_name . "/" . $recipe->id);

        $subject = "Approval Request";

            $email = Mail::to('reymond.domingo.716@gmail.com')->send(new ApprovalRequest($link));
            if($email)
            {
                $recipe->is_approved = 3;
                $recipe->save();

                $this->dispatchBrowserEvent('email_success');

            }


    }

    public function render()
    {

        $recipe_post = Recipe::where('is_approved', '!=', 1)->paginate(12);

        foreach($recipe_post as $key => $value)
        {
            $recipe_post[$key]->upvote_count =  Like::where('recipe_id', $value->id)->sum('like');

            $recipe_post[$key]->comment_count = Comment::where('recipe_id', $value->id)
                                                        ->count();

            $recipe_post[$key]->tag_name = Taggable::where('taggable_id', $value->id)->where('taggable_type', 'recipe')->value('tag_name');

            $recipe_post[$key]->author_email = User::where('id', $value->author_id)->pluck('email_address')->first();
        }
        return view('livewire.recipe-approval', [
            'recipe_post' => $recipe_post
        ]);
    }


}

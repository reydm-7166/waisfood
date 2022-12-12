<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Like;
use Auth;


class VoteCount extends Component
{
    public $recipe_id;
    public $vote_status;
    public $voteCount;

    public function login_prompt()
    {
        $this->dispatchBrowserEvent('login-popup');
    }

    public function mount()
    {
        if(Auth::check())
        {

            $get_vote = Like::where('recipe_id', $this->recipe_id)->where('user_id', Auth::user()->id);

            if($get_vote->exists())
            {
                $get_vote = $get_vote->get(['like']);

                if($get_vote[0]->like > 0)
                {
                    $this->vote_status = 'upvote';
                }
                elseif($get_vote[0]->like < 0)
                {
                    $this->vote_status = 'downvote';
                }
            }
            
        }
        
    }

    public function upvote($user_id)
    {
        $vote_exist = Like::where('recipe_id', $this->recipe_id)->where('user_id', $user_id);

        if($vote_exist->exists())
        {
            $vote_info = $vote_exist->get(['id', 'like']);

            if($vote_info[0]->like > 0)
            {
                $vote_delete = $vote_exist->delete();

                $this->dispatchBrowserEvent('remove-upvote-color');
                $this->dispatchBrowserEvent('remove-downvote-color');
            }
            elseif($vote_info[0]->like < 0)
            {
                $vote_info = Like::find($vote_info[0]->id);
                $vote_info->like = 1;
                $vote_info->save();

                $this->dispatchBrowserEvent('change-upvote-color');
            }
        }
        else 
        {
            Like::create([
                'user_id' => $user_id,
                'recipe_id' => $this->recipe_id,
                'like' => 1
            ]);

            $this->dispatchBrowserEvent('change-upvote-color');
        }
    }

    public function downvote($user_id)
    {
        $vote_exist = Like::where('recipe_id', $this->recipe_id)->where('user_id', $user_id);

        if($vote_exist->exists())
        {
            $vote_info = $vote_exist->get(['id', 'like']);

            if($vote_info[0]->like < 0)
            {
                $vote_delete = $vote_exist->delete();
                $this->dispatchBrowserEvent('remove-downvote-color');
                $this->dispatchBrowserEvent('remove-upvote-color');
            }
            elseif($vote_info[0]->like > 0)
            {
                $vote_info = Like::find($vote_info[0]->id);

                $vote_info->like = -1;
                $vote_info->save();
                
                $this->dispatchBrowserEvent('change-downvote-color');
            }
        }
        else 
        {
            Like::create([
                'user_id' => $user_id,
                'recipe_id' => $this->recipe_id,
                'like' => -1
            ]);

            $this->dispatchBrowserEvent('change-downvote-color');
        }
    }


    public function render()
    {
        $this->voteCount = Like::where('recipe_id', $this->recipe_id)->sum('like');

        return view('livewire.vote-count');
    }
}

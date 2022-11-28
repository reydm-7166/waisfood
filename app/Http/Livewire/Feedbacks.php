<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Feedback;
use App\Rules\FeedbackDuplication;
use Auth;

class Feedbacks extends Component
{
    public $rating;
    public $user_id;
    public $recipe_id;
    public $review;
    public $status = '';
    public $message = '';
        
    protected $rules = [
        'rating' => 'required|min:1|max:5',
        'review' => 'required|min:5'
    ];

    
    public function mount()
    {
        $this->rating = 5;
        (Auth::user()) ? $this->user_id = Auth::user()->id : '';
    }
    public function submit()
    {
        //if user doesnt have feedback in this recipe it will return true -- else false. to prevent multiple feedback in a single recipe
        $not_existing = Feedback::where('user_id', $this->user_id)->where('recipe_id', $this->recipe_id)->doesntExist();

        if($not_existing)
        {
            //if it does not exist validate the message
            $this->validate();

            Feedback::create([
                'user_id' => $this->user_id,
                'recipe_id' => $this->recipe_id,
                'review' => $this->review,
                'rating' => $this->rating,
            ]);
            $this->reset(['review', 'rating']);

            session()->flash('flash_success');
            session()->flash('message', 'Review successfully posted.');
        } 
        else 
        {
            session()->flash('flash_error');
            session()->flash('message', 'You have submitted a review already.');
        }

    }
    public function render()
    {
        // $comment_data = Comment::join('users', 'users.id', '=', 'comments.user_id')
        //                         ->where('post_id', $user_id)
        //                         ->get(['comments.id as comment_id', 'users.*', 'comments.*']);
        
        return view('livewire.feedbacks');
    }
}

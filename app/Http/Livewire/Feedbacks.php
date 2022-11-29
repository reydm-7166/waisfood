<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Feedback;
use App\Models\Comment;
use App\Models\Recipe;
use App\Models\User;
use App\Rules\FeedbackDuplication;
use Auth;
use DB;

class Feedbacks extends Component
{
    public $rating = 5;
    public $edit_id;
    public $user_id;
    public $recipe_id;
    public $review;
    public $status = '';
    public $message = '';
        
    protected $rules = [
        'rating' => 'required|min:1|max:5',
        'review' => 'required|min:5'
    ];

    protected $listeners = ['delete_confirmed' => 'delete_review'];

    public function delete($id)
    {
        $this->edit_id = $id;
        $this->dispatchBrowserEvent('show-delete-dialog');
    }
    
    public function delete_review()
    {
        $edit = Feedback::where('id', $this->edit_id)->first();
        $edit->delete();

        $this->dispatchBrowserEvent('success');
    }

    public function mount()
    {
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
        $reviews = DB::table('feedbacks')
                    ->join('recipes', 'feedbacks.recipe_id', 'recipes.id')
                    ->join('users', 'feedbacks.user_id', 'users.id')
                    ->where('recipes.id', $this->recipe_id)
                    ->get(['feedbacks.id AS feedback_id','feedbacks.*', 'users.*']);
        
        return view('livewire.feedbacks', [
            'reviews' => $reviews
        ]);
    }
}

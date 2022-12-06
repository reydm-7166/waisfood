<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Feedback;
use App\Models\Recipe;
use App\Models\User;
use Auth;
use DB;
use Validator;

class Feedbacks extends Component
{
    public $rating = 5;
    public $user_id;
    public $recipe_id;
    public $review;
    public $status = '';
    public $message = '';
    public $edit_id;

    //for edit
    public $edited_rate = 5;
    public $edited_message;
    public $edited_review_id;

        
    protected $rules = [
        'rating' => 'required|min:1|max:5',
        'review' => 'required|min:5',
    ];

    protected $messages = [
        'edited_message.required' => 'The review field is required.',
        'edited_message.min' => 'The review must be at least 5 characters.',
    ];


    protected $listeners = ['delete_confirmed' => 'delete_review'];
    
    public function mount()
    {
        (Auth::user()) ? $this->user_id = Auth::user()->id : '';
    }
    //for deletion of review dialog box
    public function delete($id)
    {
        $this->edit_id = $id;

        $this->dispatchBrowserEvent('show-delete-dialog');
    }
     //for deletion of review
    public function delete_review()
    {
        $edit = Feedback::where('id', $this->edit_id)->first();
        $edit->delete();

        $this->dispatchBrowserEvent('success');
    }
    //submit - creation of review/feedback
    public function submit()
    {
        //if user doesnt have feedback in this recipe it will return true -- else false. to prevent multiple feedback in a single recipe
        $not_existing = Feedback::where('user_id', $this->user_id)->where('recipe_id', $this->recipe_id)->doesntExist();

        if($not_existing)
        {
            //validate the message
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

    public function edit($review_id)
    {
        $review = Feedback::find($review_id);

        $this->edited_rate = $review->rating;
        $this->edited_message = $review->review;
        $this->edited_review_id = $review_id;
    }

    public function reset_edit_form()
    {
        $this->reset(['edited_rate', 'edited_message']);
    }

    public function edit_submit()
    {
        $this->validate([
            'edited_rate' => 'required',
            'edited_message' => 'required|min:5',
        ]);
        // dd($this->edited_review_id);
        $update = Feedback::where('id', $this->edited_review_id)->update([
            'rating' => $this->edited_rate,
            'review' => $this->edited_message,
        ]);

        $this->dispatchBrowserEvent('close-modal-then-success');
        $this->reset_edit_form();

    }

    public function render()
    {
        $reviews = DB::table('feedbacks')
                    ->join('recipes', 'feedbacks.recipe_id', 'recipes.id')
                    ->join('users', 'feedbacks.user_id', 'users.id')
                    ->where('recipes.id', $this->recipe_id)
                    ->get(['feedbacks.id AS feedback_id','feedbacks.*', 'users.*']);
        
        // $reviews = Feedback::where()

        return view('livewire.feedbacks', [
            'reviews' => $reviews
        ]);
    }
}

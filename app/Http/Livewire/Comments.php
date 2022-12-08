<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Recipe;
use App\Models\User;
use Auth;
use DB;
use Validator;

class Comments extends Component
{
    public $user_id;
    public $comment_id;
    public $recipe_id;
    public $message = '';
    public $comment;


    protected $rules = [
        'comment' => 'required|min:5',
    ];

    protected $listeners = ['delete_comment' => 'delete_comment'];


    public function mount()
    {
        (Auth::user()) ? $this->user_id = Auth::user()->id : '';
    }

    public function get_comment($comment_id)
    {
        
        $comment = Comment::find($comment_id);   
        if($comment)
        {
            $this->comment_id = $comment_id;
            $this->comment = $comment->comment_content;
        }
    }

    public function update_comment()
    {
        $validatedData = $this->validate();

        $update = Comment::find($this->comment_id)->update([
            'comment_content' => $validatedData['comment']
        ]);

        if($update)
        {
            $this->dispatchBrowserEvent('updated-comment');
            $this->reset(['comment', 'comment_id']);
        }
    }

    public function delete($comment_id)
    {
        $this->comment_id = $comment_id;

        $this->dispatchBrowserEvent('show-delete-dialog');
    }

    public function delete_comment()
    {
        $delete = Comment::where('id', $this->comment_id)->first();
       
        $delete->delete();

        $this->reset(['comment', 'comment_id']);
        $this->dispatchBrowserEvent('deleted-success');
        
    }
    public function submit()
    {

        if($this->message != '')
        {
            Comment::create([
                'user_id' => $this->user_id,
                'recipe_id' => $this->recipe_id,
                'comment_content' => $this->message,
            ]);
    
            $this->reset(['message']);
    
            $this->dispatchBrowserEvent('success');
        }
        
    }
    

    public function render()
    {

        $comments = Comment::join('users', 'users.id', 'comments.user_id')
                            ->where('comments.recipe_id', $this->recipe_id)
                            ->get(['comments.id AS comment_id', 'users.*', 'comments.*'])
                            ->toJson();
        
        return view('livewire.comments', [
            'comments' => json_decode($comments)
        ]);

    }
}



// class Feedbacks extends Component
// {


//     //for deletion of review dialog box
//     public function delete($id)
//     {
//         $this->edit_id = $id;

//         $this->dispatchBrowserEvent('show-delete-dialog');
//     }
//      //for deletion of review
//     public function delete_review()
//     {
//         $edit = Feedback::where('id', $this->edit_id)->first();
//         $edit->delete();

//         $this->dispatchBrowserEvent('success');
//     }
//     //submit - creation of review/feedback
//     public function submit()
//     {
//         //if user doesnt have feedback in this recipe it will return true -- else false. to prevent multiple feedback in a single recipe
//         $not_existing = Feedback::where('user_id', $this->user_id)->where('recipe_id', $this->recipe_id)->doesntExist();

//         if($not_existing)
//         {
//             //validate the message
//             $this->validate();

//             Feedback::create([
//                 'user_id' => $this->user_id,
//                 'recipe_id' => $this->recipe_id,
//                 'review' => $this->review,
//                 'rating' => $this->rating,
//             ]);
//             $this->reset(['review', 'rating']);

//             session()->flash('flash_success');
//             session()->flash('message', 'Review successfully posted.');
//         } 
//         else 
//         {
//             session()->flash('flash_error');
//             session()->flash('message', 'You have submitted a review already.');
//         }

//     }

//     public function edit($review_id)
//     {
//         $review = Feedback::find($review_id);

//         $this->edited_rate = $review->rating;
//         $this->edited_message = $review->review;
//         $this->edited_review_id = $review_id;
//     }

//     public function reset_edit_form()
//     {
//         $this->reset(['edited_rate', 'edited_message']);
//     }

//     public function edit_submit()
//     {
//         $this->validate([
//             'edited_rate' => 'required',
//             'edited_message' => 'required|min:5',
//         ]);
//         // dd($this->edited_review_id);
//         $update = Feedback::where('id', $this->edited_review_id)->update([
//             'rating' => $this->edited_rate,
//             'review' => $this->edited_message,
//         ]);

//         $this->dispatchBrowserEvent('close-modal-then-success');
//         $this->reset_edit_form();

//     }

//     public function render()
//     {
//         $reviews = DB::table('feedbacks')
//                     ->join('recipes', 'feedbacks.recipe_id', 'recipes.id')
//                     ->join('users', 'feedbacks.user_id', 'users.id')
//                     ->where('recipes.id', $this->recipe_id)
//                     ->get(['feedbacks.id AS feedback_id','feedbacks.*', 'users.*']);
        
//         // $reviews = Feedback::where()

//         return view('livewire.feedbacks', [
//             'reviews' => $reviews
//         ]);
//     }



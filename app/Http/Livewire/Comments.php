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

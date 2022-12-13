<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\Recipe;
use App\Models\Like;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\Comment;
use App\Models\Ingredient;

class ViewRecipePost extends Component
{

    public $user_id;


    public $view_all;


    public $recipe_post;
    public $status_post;
    public $all_post;

    public $total_votes;

    
    
    public function mount()
    {
        $this->user_id = Auth::user()->id; 

        $this->all_post();
    }
    
    public function status_post()
    {
        $this->reset(['recipe_post', 'status_post', 'all_post']);

        $status_post = Post::where('user_id', $this->user_id)->orderBy('updated_at', 'DESC')->get();
        
        foreach($status_post as $key => $value)
        {
            $status_post[$key]->like_count = Like::where('post_id', $value->id)
                                            ->where('user_id', $this->user_id)
                                            ->sum('like');

            $status_post[$key]->comment_count = Comment::where('post_id', $value->id)  
                                                        ->count();  
        }
        $this->status_post = $status_post;

    }
    
    public function recipe_post()
    {
        $this->reset(['recipe_post', 'status_post', 'all_post']);

        $recipe_post = Recipe::where('author_id', $this->user_id)->orderBy('updated_at', 'DESC')->get();
        
        foreach($recipe_post as $key => $value)
        {
            $recipe_post[$key]->comment_count = Comment::where('recipe_id', $value->id)  
                                                        ->count();  

            $recipe_post[$key]->ingredient_count = Ingredient::where('recipe_id', $value->id)
                                                            ->count();
        }

        $this->recipe_post = $recipe_post;

    }

    public function all_post()
    {
        // get recipe post first
        $this->reset(['recipe_post', 'status_post', 'all_post']);

        $recipe_post = Recipe::where('author_id', $this->user_id)->orderBy('updated_at', 'DESC')->get();
        
        foreach($recipe_post as $key => $value)
        {

            $recipe_post[$key]->comment_count = Comment::where('recipe_id', $value->id)  
                                                        ->count();  

            $recipe_post[$key]->ingredient_count = Ingredient::where('recipe_id', $value->id)
                                                            ->count();
        }

        $this->recipe_post = $recipe_post;
        
        // get the status
        $status_post = Post::where('user_id', $this->user_id)->orderBy('updated_at', 'DESC')->get();
        
        foreach($status_post as $key => $value)
        {
            $status_post[$key]->like_count = Like::where('post_id', $value->id)
                                            ->where('user_id', $this->user_id)
                                            ->sum('like');

            $status_post[$key]->comment_count = Comment::where('post_id', $value->id)  
                                                        ->count();  
        }

        $this->status_post = $status_post;

    }

    public function render()
    {
    
        return view('livewire.view-recipe-post', [
            'recipe_posts' =>  (!empty($this->recipe_post)) ? $this->recipe_post : '',
            'status_posts' => (!empty($this->status_post)) ? $this->status_post : '',
            'user_id' => $this->user_id
        ]);
    }
}

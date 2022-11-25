<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Recipe;
use App\Models\SavedPost;
use App\Models\SavedRecipe;
use App\Models\Comment;
use App\Models\PostImage;
use App\Models\Taggable;
use Auth;
use DB;

use Livewire\WithPagination;

class Saved extends Component
{
    use WithPagination;

    public $saved_type;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['saved_type'];

    public function render()
    {
    
        $user_id = Auth::user()->id;


        // by default saved posts is displayed -> get all saved posts
        $saved = SavedPost::join('posts', 'posts.id', 'saved_posts.post_id')
                            ->where('posts.user_id', $user_id)
                            ->paginate(12); 

        foreach ($saved->items() as $key => $value) 
        {
        // -> get all upvote counts of that post and save it to a new key named upvote_counts
        $saved[$key]->upvote_counts = Like::where('post_id', $saved[$key]->post_id)
                                            ->sum('like'); 
        } 

                        // if user clicked view saved recipe this shows
        if($this->saved_type == "recipes")
        {
            $saved = SavedRecipe::where('user_id', $user_id)
                                 ->paginate(12);

            foreach ($saved->items() as $key => $value) 
            {
                $saved[$key]->saved_recipes = Recipe::where('id', $saved[$key]->recipe_id)->get(); 
            } 
        }
        
        return view('livewire.saved', [
            'saved' => $saved
        ]);
    }

    public function updated($property)
    {

        if($property == 'saved_type')
        {
            $this->resetPage();
        }
    }


    // public function render()
    // {
        

    //     foreach ($dish->items() as $key => $value) {
    
    //         $dish[$key]->ingredient_count = Ingredient::where('recipe_id', $value->id)->count(); 

    //         $dish[$key]->average_rating = Feedback::where('recipe_id', $value->id)->avg('rating');
    //     }   


    //     return view('livewire.pagination', [
    //         'dish' => $dish,
    //         'query' => $this->search,
    //         'message' => (count($dish) == 0) ? true : false
    //     ]);

    // }

    // public function updated($property)
    // {

    //     if($property == 'search')
    //     {
    //         $this->resetPage();
    //     }
    // }
}

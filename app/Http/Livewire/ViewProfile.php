<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Feedback;
use App\Models\Ingredient;
use App\Models\Post;
use App\Models\Like;
use App\Models\RecipeImage;
use Livewire\WithPagination;
use DB;
use Auth;


class ViewProfile extends Component
{
    public $profile;
    public $user_id;

    use WithPagination;


    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['profile'];
   
    public function mount($post)
    {
        $this->user_id = $post;
    }
    
    public function render()
    {
         
        // this gets the posts information
        $content = Post::where('user_id', $this->user_id)
                        ->paginate(12);

        foreach ($content->items() as $key => $value) {
            
            $content[$key]->likes_count = Like::where('post_id', $value->id)->sum('like');
        }

        if($this->profile == "reviews")
        {
            $content = Feedback::where('user_id', $this->user_id)
                               ->paginate(12);

            foreach ($content->items() as $key => $value) {
    
                $content[$key]->review_rating = Feedback::where('id', $value->id)->avg('rating');

                $content[$key]->recipe_name = Recipe::where('id', $content[$key]->recipe_id)->pluck('recipe_name');
            }
            
        } 
        return view('livewire.view-profile', [
            'contents' => $content,
            'type' => $this->profile

        ]);

    }

    public function updated($property)
    {

        if($property == 'profile')
        {
            $this->resetPage();
        }
    }

}
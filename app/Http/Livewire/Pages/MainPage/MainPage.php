<?php

namespace App\Http\Livewire\Pages\MainPage;

use App\Models\Recipe;
use App\Models\Like;
use App\Models\Comment;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Taggable;
use App\Models\RecipeImage;
use Livewire\Component;
use GuzzleHttp\Client;

class MainPage extends Component
{
    protected $top_recipes;
    protected $data;


    public function mount()
    {
        $recipe_default = Recipe::where('is_approved', 1);

        $recipe_default = $recipe_default->get()->map(function($recipe) {
            $recipe->avg_rating = Feedback::where('recipe_id', $recipe->id)->avg('rating');

            $recipe->feedback_count = Feedback::where('recipe_id', $recipe->id)->count();

            $recipe->tag_name = Taggable::where('taggable_id', $recipe->id)->where('taggable_type', 'recipe')->value('tag_name')
            ;
            $recipe->recipe_image = RecipeImage::where('recipe_id', $recipe->id)->value('recipe_image');

            return $recipe;
        });

        $this->top_recipes = $recipe_default->take(4)->sortByDesc('avg_rating');


        //get api from the guardian . com
        $client = new Client(['verify' => false]);

        $response = $client->get('https://content.guardianapis.com/search', [
                            'query' => [
                                'api-key' => '8a6185f6-6f8c-4250-995a-06fad11f1b54',
                                'q' => 'food waste',
                                'show-tags' => 'keyword',
                                'tags' => 'food-waste, food waste, recycle, waste not',
                                'content' => 'Food Waste',
                                'show-fields' => 'thumbnail,byline',
                                'operators' => 'AND',
                                'section' => 'environment'
                            ]
                        ]);
        $this->data = json_decode($response->getBody());
    }
    public function render()
    {
        return view('livewire.pages.main-page.main-page', [
            'data' => $this->data,
            'recipes' => $this->top_recipes
        ]);
    }
}

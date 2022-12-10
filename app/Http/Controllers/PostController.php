<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Response;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\SavedPost;
use App\Models\SavedRecipe;
use App\Models\Comment;
use App\Models\PostImage;
use App\Models\Recipe;
use App\Models\Taggable;
use App\Models\RecipeImage;
use App\Models\Ingredient;
use App\Models\Direction;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
     // this is for upvote counts

    public function create_post()
    {
        return view('user.create-post');
    }


    public function get_all_recipe($user_id)
    {
        //this gets the recipes which are pending or not yet approved
        $recipe_posts = User::join('recipes', 'recipes.author_id', '=', 'users.id')
                            ->where('is_approved', 0)
                            ->orderBy('recipes.created_at', 'desc')
                            ->get(['recipes.id AS recipe_id', 'users.*', 'recipes.*']);
        if(Auth::check())
        {
            $save_recipes = SavedRecipe::where('user_id', $user_id)
                                        ->get(['id', 'recipe_id']);

            foreach($recipe_posts as $new)
            {
                foreach($save_recipes as $save_recipe)
                {
                    if($new->id == $save_recipe->recipe_id)
                    {
                        $new->saved = true;
                    }
                    else {
                        $new->saved = false;
                    }
                }
            }

            foreach ($recipe_posts as $key => $value) {

                $recipe_posts[$key]->recipe_images = RecipeImage::where('recipe_id', $value->id)->get(['recipe_image'])->toArray();
                
                $recipe_posts[$key]->tags = Taggable::where('taggable_id', $value->id)->where('taggable_type', "recipe")->get(['tag_name'])->toArray();
    
                $recipe_posts[$key]->comments_count = Comment::where('post_id', $value->id)->count();
            }
            
            return $recipe_posts;
        }
        foreach ($recipe_posts as $key => $value) {

            $recipe_posts[$key]->recipe_images = RecipeImage::where('recipe_id', $value->id)->get(['recipe_image'])->toArray();
            
            $recipe_posts[$key]->tags = Taggable::where('taggable_id', $value->id)->where('taggable_type', "recipe")->get(['tag_name'])->toArray();

            $recipe_posts[$key]->comments_count = Comment::where('post_id', $value->id)->count();
        }

        return $recipe_posts;

    }
    public function index()
    {
        //if user is logged in.
        if (Auth::check()) {
            $user_id = Auth::user()->id;

            $user_data = User::where('id', $user_id)->get()->toJson();

            $save_posts = SavedPost::where('user_id', $user_id)
                                    ->get(['id', 'post_id']);
                                    

            $newsfeed_posts = Post::join('users', 'posts.user_id', 'users.id')
                                    ->orderBy('posts.created_at', 'desc')
                                    ->get(['users.unique_id as user_unique_id', 'users.*', 'posts.*']);
                                
            //check if the post is saved. if yes set the value to true else false
            foreach($newsfeed_posts as $new)
            {
                foreach($save_posts as $save_post)
                {
                    if($new->id == $save_post->post_id)
                    {
                        $new->saved = true;
                    }
                    else {
                        $new->saved = false;
                    }
                }
            }
            foreach ($newsfeed_posts as $key => $value) {

                $newsfeed_posts[$key]->post_images = PostImage::where('post_id', $value->id)->get(['image_name'])->toArray();
                
                $newsfeed_posts[$key]->tags = Taggable::where('taggable_id', $value->id)->where('taggable_type', "post")->get(['tag_name'])->toArray();

                $newsfeed_posts[$key]->comments_count = Comment::where('post_id', $value->id)->count();
            }
            // json encode the results of posts
            $newsfeed_posts = json_encode($newsfeed_posts);

            //check saved post and place it inside the $posts collection
            $recipe_posts = json_encode($this->get_all_recipe($user_id));

            //this shows the newsfeed 
            return view('livewire.pages.news-feed-page.news-feed', [
                'recipe_posts' => json_decode($recipe_posts),
                'newsfeed_posts' => json_decode($newsfeed_posts),
                'logged_user' => json_decode($user_data)
            ]);
            
        }
        // if not logged in.
        //.................//////// start newsfeed status post 
        $newsfeed_posts = Post::join('users', 'posts.user_id', 'users.id')
                                ->orderBy('posts.created_at', 'desc')
                                ->get(['users.unique_id as user_unique_id', 'users.*', 'posts.*']);
                                

        foreach ($newsfeed_posts as $key => $value) {

            $newsfeed_posts[$key]->recipe_images = RecipeImage::where('recipe_id', $value->id)->get(['recipe_image'])->toArray();
            
            $newsfeed_posts[$key]->tags = Taggable::where('taggable_id', $value->id)->where('taggable_type', "recipe")->get(['tag_name'])->toArray();

            $newsfeed_posts[$key]->comments_count = Comment::where('post_id', $value->id)->count();
        }
                // json encode the results of posts
        $newsfeed_posts = json_encode($newsfeed_posts);
        //............../////// end
        // json encode the results of newsfeed recipe
        $recipe_posts = json_encode($this->get_all_recipe(''));

            // this gets the recipes         
        
        return view('livewire.pages.news-feed-page.news-feed', [
            'newsfeed_posts' => json_decode($newsfeed_posts),
            'recipe_posts' => json_decode($recipe_posts),
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user())
        {
            return view('livewire.pages.create-post-page.create-post');
        }

        $user_data = User::where('id', Auth::user()->id)->get()->toJson();

        return view('livewire.pages.create-post-page.create-post', [
            'logged_user' => json_decode($user_data)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user_id = Auth::user()->id;

        $validated = $this->validate($request, [
            'recipe_name' => ['required', 'min:5'],
            'recipe_description' => ['required', 'min:50'],
            'ingredients' => ['required'],
            'measurements' => ['required'], 
            'directions' => ['required'],
            'post_tags' => ['required', 'min:5'],
            'post_image.*' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:50000']
        ]);
        // dd($request);
        if(isset($validated['post_image']))
        {
            $created_recipe = Recipe::create([
                'recipe_name' => $request->recipe_name,
                'description' => $request->recipe_description,
                'author_id' => $user_id,
                'author_name' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
                'is_approved' => 0,
            ]);
            // dd($created_recipe);

            foreach($request->ingredients as $key => $value)
            {
                $created_ingredient = Ingredient::create([
                    'recipe_id' => $created_recipe->id,
                    'ingredient' => (!empty($request->ingredients[$key])) ? $request->ingredients[$key] : '',
                    'measurement' => (!empty($request->measurements[$key])) ? $request->measurements[$key] : '',
                ]);
            }
            
            foreach($request->directions as $key => $value)
            {
                $created_direction = Direction::create([
                    'recipe_id' => $created_recipe->id,
                    'direction_number' => (!empty($request->directions[$key])) ? number_format($key) + 1 : null,
                    'direction' => (!empty($request->directions[$key])) ? $request->directions[$key] : null,
                ]);
            }
        
                $created_tag = Taggable::create([
                    'taggable_id' =>  $created_recipe->id,
                    'taggable_type' => 'recipe',
                    'tag_name' => $request->post_tags
                ]);

            
            // from the uploaded images//for each // save its name to db 
            foreach($request->post_image as $image_name)
            {
                //gets the original name
                $image = $image_name->getClientOriginalName();
                //gets the name only not including file extension
                $tempoName = pathinfo($image, PATHINFO_FILENAME);
                //new image name
                $newImageName = time() . '_' . $tempoName . '.' . $image_name->getClientOriginalExtension();
                //move the image to public folder
                $image_name->move(public_path('img/recipe-images'), $newImageName);
                
                
                RecipeImage::create([
                    'recipe_id' => $created_recipe->id,
                    'recipe_image' => $newImageName,
                ]);
            }
        }
        return redirect()->route('post.index')->with(['post-success' => "Post Created Successfully!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($recipe_post_name, $id)
    {
        $result = Recipe::join('ingredients', 'recipes.id', 'ingredients.recipe_id')
                      ->where('ingredients.recipe_id', $id)
                      ->get(['recipes.id AS recipe_id', 'recipes.*', 'ingredients.*']);
                    
        $tags = Taggable::where('taggable_id', $id)->where('taggable_type', "recipe")->get();
        
        $image_file = RecipeImage::where('recipe_id', $id)->get(['recipe_image']);
        

        $directions = Direction::where('recipe_id', $id)->get();
  
        if(empty($result[0]))
        {
            $result = Recipe::where('id', $id)->get();
        }
        
        return view('user.recipe-post', [
            'results' =>  $result,
            'tags' => $tags,
            'directions' => $directions,
            'image_file' => $image_file
        ]);
    }

    //get the user's liked post
        // => first param -> id of the post
        // => second param->id of the user(current logged in user)

    public function liked_posts($id, $user_id)
    {
        return $liked_posts = Like::where('user_id', $user_id)
                            ->where('post_id', $id)
                            ->get();   
    }

    // 
    //     -> user_id is the user id
    //     -> id is the post_id
    //
    //


    public function vote($post_id, $vote_type)
    {
        /// function to get the sum of upvotes
        function post_data($id)
        {
            $post_data =  Like::where('post_id', $id)
                                ->where('like', '>', '0')
                                ->sum('like');
            return $post_data;
        }
        /// function to get the total of downvotes
        function down_data($id)
        {   
            $down_data = Like::where('post_id', $id)
                                ->where('like', '<', '0')
                                ->count('like');
            return $down_data;
        }
        /// function to get the total vote counts
        function update_vote_value($post_id)
        {
            return post_data($post_id) - down_data($post_id);
        }
        /// function to delete the record 
        function delete($user_id, $post_id)
        {
            return Like::where('user_id', $user_id)->where('post_id', $post_id)->delete();
        }
        function update($like_value, $vote_type)
        {
            $like_value->like = ($vote_type == "upvote") ? 1 : -1;
            $like_value->save();  
            
            return $like_value;
        }
        $user_id = Auth::user()->id;
        //if user has not yet voted into the specific post, it will create a new record
        if(Like::where('user_id', $user_id)->where('post_id', $post_id)->doesntExist())
        {
            Like::create([
                'user_id' => $user_id,
                'post_id' => $post_id,
                'like' => ($vote_type == "upvote") ? 1 : -1
                //shorthand if else, if the user click the upvote($vote_type) it will output 1 otherwise -1
            ]);
            //this calculates the current total vote counts
            $vote_value = update_vote_value($post_id);

            return response()->json([
                'message' => "Success",
                'vote_value' => $vote_value,
                'vote_state' => $vote_type,
                'status' => 200
            ]);
        }
        // if it has, fetch the row and save it to like_value
        $like_value = Like::where('user_id', $user_id)->where('post_id', $post_id)->first();


        if($vote_type == "upvote")
        {
            //if user upvoted and he already upvoted it - it will delete his record on the table hence the vote count will remain to its count before the user voted.
            if($like_value->like > 0)
            {
                delete($user_id, $post_id);
                $vote_state = "default";
            }
            //else if the vote_type is -1 just update the value of like column to positive. [when the user dowvoted it but then click on upvote]
            else 
            {
                update($like_value, $vote_type);
                $vote_state = "altered_to_downvote";
            }
            //this calculates the current total vote counts
            $vote_value = update_vote_value($post_id);

            return response()->json([
                'message' => "Success",
                'vote_value' => $vote_value,
                // 'vote_state' => $vote_state,
                'status' => 200
            ]);
        }
        //if user upvoted and he already downvoted it - it will delete his record on the table hence the vote count will remain to its count before the user voted.
        if($like_value->like < 0)
        {
            delete($user_id, $post_id);
            $vote_state = "default";
        }
        //else if the vote_type is +1 just update the value of like column to negative. [when the user upvoted it but then click on downvote]
        else 
        {
            update($like_value, $vote_type);
            $vote_state = "altered_to_upvote";
        }
            //this calculates the current total vote counts
        $vote_value = update_vote_value($post_id);

        return response()->json([
            'message' => "Success",
            'vote_value' => $vote_value,
            // 'vote_state' => $vote_state,
            'status' => 200
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'post_title' => ['required', 'min:5'],
            'post_content' => ['required', 'min:50']
        ]);

        $Post_update = Post::find($request->post_id);

        $Post_update->post_title = $request->post_title;
        $Post_update->post_content = $request->post_content;
        $Post_update->save();   

        return back()->with('success', "Post edited Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function comment(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'add_comment' => 'required|min:1',
        ]);

        if($validator->fails()) {

            return Response::json([
                'success' => 'false',
                'errors' => $validator->getMessageBag(),
                'status' => 400
            ]);
        }
        
        Comment::create([
            'user_id' => $user_id,
            'post_id' => $request->post_id,
            'comment_content' => $request->add_comment
        ]);

        $comment_data = Comment::join('users', 'users.id', '=', 'comments.user_id')
                                ->where('comments.post_id', $request->post_id)
                                ->orderBy('comments.updated_at', 'desc')
                                ->take(1)
                                ->get(['comments.id as comment_id', 'users.*', 'comments.*']);
                            
        return response()->json([
            'comment_data' =>  $comment_data,
            'status' => 200,
        ]);
    }

    public function comment_onload($user_id)
    {
        $comment_data = Comment::join('users', 'users.id', '=', 'comments.user_id')
                                ->where('post_id', $user_id)
                                ->get(['comments.id as comment_id', 'users.*', 'comments.*']);

        return response()->json([
            'comment_data' =>  $comment_data,
        ]);
    }

    public function save_post($post_id)
    {
        $user_id = Auth::user()->id;
        // $save_post = SavedPost::join('posts', 'posts.id', '=', 'saved_posts.post_id')
        //                         ->where('post_id', $post_id)
        //                         ->get();

        $doesnotexist = SavedPost::where('user_id', $user_id)
                                    ->where('post_id', $post_id)
                                    ->doesntExist();
        if($doesnotexist)
        {
            SavedPost::create([
                'user_id' => $user_id,
                'post_id' => $post_id
            ]);
            return response()->json([
                'message' =>  $doesnotexist,
                'post_id' => $post_id,
                'status' => 200
            ]);
        }

        SavedPost::where('user_id', $user_id)
                    ->where('post_id', $post_id)
                    ->delete();

        return response()->json([
            'message' =>  $doesnotexist,
            'post_id' => $post_id,
            'status' => 200
        ]);
        
    }
}

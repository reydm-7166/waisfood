<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Response;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\SavedPost;
use App\Models\Comment;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
     // this is for upvote counts

    public function post_data($id)
    {
        $post_data =  Like::where('post_id', $id)
                            ->where('like', '>', '0')
                            ->sum('like');
        return $post_data;
    }

    // this is for downvote counts
    public function down_data($id)
    {   
        $down_data = Like::where('post_id', $id)
                            ->where('like', '<', '0')
                            ->count('like');
        return $down_data;
    }
    
    public function index()
    {
        $newsfeed_posts = User::join('posts', 'posts.user_id', '=', 'users.id')
                                ->orderBy('posts.created_at', 'desc')
                                ->get()
                                ->toJson();
        //dd($newsfeed_posts);
        return view('user.home')->with('newsfeed_posts', json_decode($newsfeed_posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'post_title' => ['required', 'min:5'],
            'post_content' => ['required', 'min:50']
        ]);

        $user_id = Auth::user()->id;
        // $post_title = $request->post_title;

        Post::create([
            'unique_id' => Str::random(9),
            'user_id' => $user_id,
            'post_title' => $request->post_title,
            'post_content' => $request->post_content
        ]);
        
        return back()->with('success', "Post created Successfully!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $unique_id)
    {
        $post = Post::join('users', 'users.id', '=', 'posts.user_id')
                        ->where('posts.id', '=', $id)
                        ->get(['posts.id as post_id', 'posts.*', 'users.*'])
                        ->ToJson();

        $post_data = $this->post_data($id) - $this->down_data($id);

        return view('user.post', compact('post_data'))->with('post', json_decode($post));
    }

    // 
    //     -> user_id is the user id
    //     -> id is the post_id
    //
    //

    public function upvote($id) 
    {
        $user_id = Auth::user()->id;
        // if the user has not voted yet in the post it will create a row for it.
        if(Like::where('user_id', $user_id)->where('post_id', $id)->doesntExist())
        {
            Like::create([
                'user_id' => $user_id,
                'post_id' => $id,
                'like' => 1
            ]);

            $post_data = $this->post_data($id) - $this->down_data($id);

            return response()->json([
                'post_data' => $post_data,
            ]);

        }

        // if it has, fetch the row and save it to like_value
        $like_value = Like::where('user_id', $user_id)->where('post_id', $id)->first();

        // if the like is positive (1) then delete the entire row (this is when the user has already upvoted but he clicks 
        // again the upvote[this prevents duplicate votes in a single])
        if($like_value->like > 0)
        {
            Like::where('user_id', $user_id)->where('post_id', $id)->delete();

            $post_data = $this->post_data($id) - $this->down_data($id);

            return response()->json([
                'post_data' =>  $post_data,
            ]);
        }

        // else if it is negative (-1) just update the value of like column to positive. [when the user dowvoted it but then click on upvote]
        $like_value->like = 1;
        $like_value->save();   

        $post_data = $this->post_data($id) - $this->down_data($id);

        return response()->json([
            'post_data' =>  $post_data,
        ]);

    }

    public function downvote($id)
    {
        $user_id = Auth::user()->id;
        // if the user has not voted yet in the post it will create a row for it.
        if(Like::where('user_id', '=', $user_id)->where('post_id', $id)->doesntExist())
        {
            Like::create([
                'user_id' => $user_id,
                'post_id' => $id,
                'like' => -1
            ]);

            $post_data = $this->post_data($id) - $this->down_data($id);

            return response()->json([
                'post_data' => $post_data,
            ]);
        }
        // if it has, fetch the row and save it to like_value
        $like_value = Like::where('user_id', $user_id)->where('post_id', $id)->first();
        // if the like is positive (1) then delete the entire row (this is when the user has already upvoted but he clicks 
        // again the upvote[this prevents duplicate votes in a single])
        if($like_value->like < 0)
        {
            Like::where('user_id', $user_id)->where('post_id', $id)->delete();

            $post_data = $this->post_data($id) - $this->down_data($id);

            return response()->json([
                'post_data' =>  $post_data,
            ]);
        }
        // else if it is negative (-1) just update the value of like column to negative. [when the user upvoted it but then click on downvote]
        $like_value->like = -1;
        $like_value->save();   
        $post_data = $this->post_data($id) - $this->down_data($id);

        return response()->json([
            'post_data' =>  $post_data,
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

        $Post_update->title = $request->post_title;
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
                                ->where('post_id', $request->post_id)
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
                'status' => 200
            ]);
        }

        SavedPost::where('user_id', $user_id)
                    ->where('post_id', $post_id)
                    ->delete();

        return response()->json([
            'message' =>  $doesnotexist,
            'status' => 200
        ]);
        
    }
}

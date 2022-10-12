<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsfeed_posts = User::join('posts', 'posts.user_id', '=', 'users.id')
                                ->orderBy('posts.created_at', 'desc')
                                ->get()
                                ->toJson();

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

        $like_count =  Like::where('post_id', $id)
                            ->where('like', '>', '0')
                            ->sum('like');

        $down_data = Like::where('post_id', $id)
                        ->where('like', '<', '0')
                        ->count('like');

        $like_count = $like_count - $down_data;

        return view('user.post', compact('like_count'))->with('post', json_decode($post));
    }

    public function upvote($id) 
    {

        $user_id = Auth::user()->id;

        Like::create([
            'user_id' => $user_id,
            'post_id' => $id,
            'like' => 1
        ]);

        $post_data = Like::where('post_id', $id)
                        ->where('like', '>', '0')
                        ->sum('like');

        $down_data = Like::where('post_id', $id)
                        ->where('like', '<', '0')
                        ->count('like');

        $post_data = $post_data - $down_data;

        return response()->json([
            'post_data' => $post_data,
        ]);
                        
    }

    public function downvote($id)
    {
        $user_id = Auth::user()->id;
        
        Like::create([
            'user_id' => $user_id,
            'post_id' => $id,
            'like' => -1
        ]);

        $post_data = Like::where('post_id', $id)
                            ->where('like', '>', '0')
                            ->sum('like');

        $down_data = Like::where('post_id', $id)
                        ->where('like', '<', '0')
                        ->count('like');

        $post_data = $post_data - $down_data;
        
        return response()->json([
            'post_data' => $post_data,
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
}

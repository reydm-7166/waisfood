<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Post;
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

        $this->validate($request, [
            'post_title' => ['required', 'min:5'],
            'post_content' => ['required', 'min:50']
        ]);

        $user_id = Auth::user()->id;

        Post::create([
            'unique_id' => Str::random(9)->toString(),
            'user_id' => $user_id,
            'title' => $request->post_title,
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
                        ->where('posts.id', $id)
                        ->get(['posts.id as post_id', 'posts.*', 'users.*'])
                        ->ToJson();

        return view('user.post')->with('post', json_decode($post));
    }

    public function upvote($id) 
    {
        $Post_update = Post::find($id);

        $Post_update->like = 100000;

        $Post_update->save(); 
        
        $post_data = Post::where('id', $id)
                            ->pluck('like')
                            ->all();

        return response()->json([
            'post_data' => $post_data,
        ]);
                        
        // $upvote = Post::where('id', $post_id)
        //             ->increment('like', 1, ['increased_at' => Carbon::now()]);
        // dd(Post::find($post_id));
    }

    public function down()
    {
        return response()->json([
            'post_data' => "AMENAAMEN"
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

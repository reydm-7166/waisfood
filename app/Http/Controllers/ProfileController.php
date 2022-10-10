<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id){
        $newsfeed_posts = User::join('posts', 'posts.user_id', '=', 'users.id')
                                ->where('posts.user_id', $id)
                                ->orderBy('posts.created_at', 'desc')
                                ->get()
                                ->toJson();

        return view('user.home')->with('newsfeed_posts', json_decode($newsfeed_posts));
    }

    public function edit_post($id) {

        $post_data = Post::where('id', $id)->get();

        return response()->json([
            'post_data' => $post_data
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;


class StatusController extends Controller
{
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $validated = $this->validate($request, [
            'post_title' => ['required', 'min:5'],
            'post_content' => ['required', 'min:5'],
        ]);

        
        $store_status = Post::create([
            'unique_id' => rand(1000, 1000000),
            'user_id' => $user_id,
            'post_title' => $request->post_title,
            'post_content' => $request->post_content
        ]);

        return redirect()->route('post.index')->with(['post-success' => "Post Created Successfully!"]);
        
    }

    public function create()
    {
        return view('user.create-status');
    }
}

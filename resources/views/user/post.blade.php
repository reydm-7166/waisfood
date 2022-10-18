@extends('layout.app')

@section('page title')
    Post
@endsection

@section('less_import')

    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/home.less') }}" />
    <script src="https://cdn.jsdelivr.net/npm/less" ></script>
    <script src="https://kit.fontawesome.com/4f2d93f234.js" crossorigin="anonymous"></script>
    <style>@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');</style>
@endsection

@section('body')

<body class="w-100">

    {{-- THIS IS THE NAVIGATION BAR --}}

    {{-- @include('_partials._navigation_bar') --}}
    
    <main id="user_content_container" class="">
        {{-- {{dd($post)}} --}}
        @foreach ($post as $post)
            {{ $post->id }}<br>
            {{ $post->post_id }}
            <a class="d-block mt-5" href="{{ route('profile.index', $post->id) }}">{{ $post->first_name }}  {{ $post->last_name }}</a>

            <a class="d-block mt-5" id="save_post" href="{{ route('save.post', $post->post_id) }}">Save this post</a>
            {{-- {{ $post->unique_id }}
            {{ $post->title }}
            {{ $post->post_content }}
            {{ $post->like }} --}}
            <input type="hidden" name="post_id" id="post_id" value="{{ $post->post_id }}">
            <button id="upvote" class="d-block mt-5 fs-3 ms-5" ><i class="fa-solid fa-arrow-up"></i></button><br>
            <a href="" id="downvote" class="d-block fs-3 ms-5"><i class="fa-solid fa-arrow-down"></i></a>


            <br><br><br>
            @if ($post_data != 0)
                <h1 id="like_count">{{ $post_data }}</h1>
            @else
                <h1 id="like_count">VOTE</h1>
            @endif

            <div id="first_name" class="w-75 mt-5">
                <form action="{{route('post.comment')}}" method="post" id="add_comment_form">
                    <label for="add_comment" class="font d-block ">Add comment</label>

                    <input type="hidden" name="user_id" value="{{ $post->id }}">
                    <input type="hidden" name="post_id" value="{{ $post->post_id }}">
                    <input type="text" name="add_comment" class="form-control w-25 d-inline-block" id="add_comment" placeholder="add comment">

                       

                    <input type="submit" value="Post" name="reply" id="reply" class="btn btn-primary d-inline-block">

                </form>

            </div>
            
            <div id="comment_section">

            </div>
            
        @endforeach
    </main>
</body>


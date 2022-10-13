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
            {{ $post->id }}
            <a class="d-block mt-5" href="{{ route('profile.index', $post->id) }}">{{ $post->first_name }}  {{ $post->last_name }}</a>
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
            
        @endforeach
    </main>
</body>


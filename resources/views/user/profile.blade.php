<?php (!empty(Session::get('user_data'))) ? $user_data = Session::get('user_data') : ""; ?>



@extends('layout.app')

@section('page title')
    @if (!empty($newsfeed_posts))
        {{ $newsfeed_posts[0]->first_name }}
    @else
        {{ $user_data['first_name'] }}
    @endif | Profile
@endsection

@section('less_import')
    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/profile.less') }}" />
    <script src="https://cdn.jsdelivr.net/npm/less" ></script>
    <script src="https://kit.fontawesome.com/4f2d93f234.js" crossorigin="anonymous"></script>
    <style>@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');</style>
@endsection

@section('body')

<body class="bg-secondary w-100">

    {{-- THIS IS THE NAVIGATION BAR --}}


    @include('_partials._navigation_bar')
    
    <div id="profile_images_container" class="border-bottom border-dark rounded">

    </div>
    <main id="user_content_container" class="d-flex justify-content-start align-self-center">
        
        @include('_partials._trending_tags')

        @include('_partials._newsfeed_posts')

        @include('_partials._profile_open_space')
    </main>
</body>


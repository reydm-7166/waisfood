@extends('layout.app')

@section('page title')
    Create Post 
@endsection

@section('less_import')
    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/create-post.less') }}" />
    <script src="https://cdn.jsdelivr.net/npm/less" ></script>
    <script src="https://kit.fontawesome.com/4f2d93f234.js" crossorigin="anonymous"></script>
    <style>@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');</style>
@endsection

@section('body')

<body class="w-100">
    @php
        (!empty(Session::get('user_data'))) ? $user_data = Session::get('user_data') : ""
    @endphp 
    {{-- {{$user_data}} --}}
    {{-- THIS IS THE NAVIGATION BAR --}}
    <main id="user_content_container" class="border border-primary">

        <nav id="navigation_index" class="w-100 position-relative">
            @include('_partials._navigation_index')
        </nav>
        
        <div id="create_container">
                    {{-- DITO START NG CODE (public/css/create-post.less) <- dito ung css nya --}}

            create

        </div>
    </main>
</body>


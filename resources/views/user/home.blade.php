@extends('layout.app')

@section('page title')
    Home
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

    <?php (!empty(Session::get('user_data'))) ? $user_data = Session::get('user_data') : ""; ?>

    @include('_partials._navigation_bar')
    
    <main id="user_content_container" class="d-flex justify-content-start align-self-center">
        @include('_partials._newsfeed_sidebar')

        @include('_partials._newsfeed_posts')

    </main>
</body>


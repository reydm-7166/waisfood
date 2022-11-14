@extends('layout.app')

{{-- LESS // CSS --}}
@section('less_import')
    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/index.less') }}" />
    <script src="https://cdn.jsdelivr.net/npm/less" ></script>
    {{-- FONT STYLE --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family= Lexend+Deca: wght@300;400 &display=swap');
    </style>
@endsection
{{-- jQuery --}}
@section('javascript')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="{{ asset('js/register_fade_success.js') }}"></script>
    
@endsection

@section('page title')
    WaisFood PH
@endsection

@section('body')
    <main class="border border-primary min-vh-100">


    <nav id="navigation_index" class="w-100 border rounded-bottom border-primary position-relative">
        @include('_partials._navigation_index')
    </nav>

    {{-- SEARCH --}}
    <section id="recipe_generator" class="border border-primary w-100">
        <div id="title" class="d-block w-100 d-flex justify-content-center">
            <p class="font fw-bolder fs-2">RECIPE GENERATOR</p>
        </div>

        <div id="form" class="">
            <form action="" method="get" class="d-flex justify-content-around">
                <select class="form-select form-select-lg form-control p-3 font" aria-label=".form-select-lg example">
                    <option selected>Browse</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <input type="text" name="" id="" placeholder="Search" class="w-50 rounded ps-4 form-control font">

                <select class="form-select form-select-lg form-control p-3 font">
                    <option selected>Most Rated</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

                
                <div id="clear_tags">
                    <a href="">Clear Tags</a>
                </div>
            </form>
        </div>

    </section>
    {{-- SORT BY CATEGORIES --}}
    <section id="sort" class="border border-primary w-100 ">
        <div id="title" class="d-block w-100 d-flex justify-content-center">
            <p class="font fw-bolder fs-2 mt-2">Sort by Categories</p>
        </div>

        <div id="form" class="pt-2">
            <form action="" method="get" class="d-flex justify-content-evenly">
                <div id="a" class="">
                    <img src="/img/profile_picture.jpg" alt="" id="profile_picture" class="border rounded-circle border-0">
                </div>
                <div id="a" class="">
                    <img src="/img/profile_picture.jpg" alt="" id="profile_picture" class="border rounded-circle border-0">
                </div>
                <div id="a" class="">
                    <img src="/img/profile_picture.jpg" alt="" id="profile_picture" class="border rounded-circle border-0">
                </div>
                <div id="a" class="">
                    <img src="/img/profile_picture.jpg" alt="" id="profile_picture" class="border rounded-circle border-0">
                </div>
                <div id="a" class="">
                    <img src="/img/profile_picture.jpg" alt="" id="profile_picture" class="border rounded-circle border-0">
                </div>
                <div id="a" class="">
                    <img src="/img/profile_picture.jpg" alt="" id="profile_picture" class="border rounded-circle border-0">
                </div>

            </form>
        </div>

    </section>

    {{-- <section id="sort" class="border border-primary w-100 ">
        <div id="title" class="d-block w-100 d-flex justify-content-center">
            <p class="font fw-bolder fs-2">Sort By Categories</p>
        </div>

    </section> --}}


    </main>
@endsection
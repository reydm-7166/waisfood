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
    <script src="https://kit.fontawesome.com/4f2d93f234.js" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="{{ asset('js/register_fade_success.js') }}"></script>
    <script src="{{ asset('js/ajax_generator.js') }}" type="text/javascript"></script>
    
@endsection

@section('page title')
    WaisFood PH
@endsection

@section('body')
    <main class="min-vh-100">


    <nav id="navigation_index" class="w-100 position-relative">
        @include('_partials._navigation_index')
    </nav>

    {{-- SEARCH --}}
    <section id="recipe_generator" class="w-100">
        <div id="title" class="d-block w-100 d-flex justify-content-center">
            <p class="font fw-bolder">RECIPE GENERATOR</p>
        </div>

        <div id="form" class="">
            <form action="" method="get" class="d-flex justify-content-around">
                <select class="form-select form-select-lg form-control font" aria-label=".form-select-lg example">
                    <option selected>Browse</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <input type="text" name="" id="" placeholder="Search" class="w-50 rounded ps-4 form-control font">

                <select class="form-select form-select-lg form-control font">
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
    <section id="sort" class="w-100">
        <div id="title" class="d-block w-100 d-flex justify-content-center">
            <p class="font fw-bolder mt-2">CATEGORIES</p>
        </div>

        <div id="form" class="pt-2">
            <form action="" method="get" class="d-flex justify-content-evenly">
                <div class="">
                    <img src="/img/profile_picture.jpg" alt="" id="profile_picture" class="border rounded-circle border-0">
                </div>
                <div class="">
                    <img src="/img/profile_picture.jpg" alt="" id="profile_picture" class="border rounded-circle border-0">
                </div>
                <div class="">
                    <img src="/img/profile_picture.jpg" alt="" id="profile_picture" class="border rounded-circle border-0">
                </div>
                <div class="">
                    <img src="/img/profile_picture.jpg" alt="" id="profile_picture" class="border rounded-circle border-0">
                </div>
                <div class="">
                    <img src="/img/profile_picture.jpg" alt="" id="profile_picture" class="border rounded-circle border-0">
                </div>
                <div class="">
                    <img src="/img/profile_picture.jpg" alt="" id="profile_picture" class="border rounded-circle border-0">
                </div>

            </form>
        </div>

    </section>

    <section id="ingredients_list" class="w-100">
        <div id="title" class="d-block w-100 d-flex justify-content-center">
            <p class="font fw-bolder text-white">INGREDIENTS</p>
        </div>

        <div id="list" class="d-flex justify-content-center">
            <form action="" id="form_container" method="get" class=" w-100 d-inline-block d-flex justify-content-center mt-1 p-0 d-flex flex-wrap">
                
                <div id="add_ingredients" class="d-flex flex-row ms-2 mb-2 fs-2">
                    <input type="text" name="add" id="add" class="border rounded-pill icon ps-3 font form-control" placeholder="Add Items..." size="5">
                    <button id="button_add" class="border border-0 bg bg-transparent"><i id="add_ingredient_form" class="fa-solid fa-plus fs-1 text-primary"></i></button>
                </div>
                
            </form>
            {{-- <form action="" method="get">
                <div>
                    
                </div>
            </form> --}}
        </div>

    </section>

    <section id="recipe" class="mt-3">

        <div id="recipe_title" class="d-flex justify-content-center">
            <p class="font fw-bolder text-white mt-1">RECIPE</p>
        </div>

        <div id="recipe_list" class="rounded border border-primary d-flex justify-content-start flex-wrap">
            @include('_partials._recipe_list')
        </div>
    </section>


    </main>
@endsection
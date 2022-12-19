<!DOCTYPE html>
<html lang="{{ str_replace(' ', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Language" content="en-US" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SITE META --}}
    <meta name="type" content="website">
    <meta name="title" content="Waisfood Generator">
    <meta name="description" content="Generates recipes from leftover ingredients!">
    <meta name="image" content="{{ asset('img/suz.jpg') }}">
    <meta name="keywords" content="Generator, Food Generator, wais food, wais, wise, food, foods, wisefoods, wise foods, wais foods, waifu">
    <meta name="application-name" content="Waisfood Generator">

    {{-- TWITTER META --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Waisfood Generator">
    <meta name="twitter:description" content="Generates recipes from leftover ingredients!">
    <meta name="twitter:image" content="{{ asset('img/suz.jpg') }}">

    {{-- OG META --}}
    <meta name="og:url" content="{{ Request::url() }}">
    <meta name="og:type" content="website">
    <meta name="og:title" content="Waisfood Generator">
    <meta name="og:description" content="Generates recipes from leftover ingredients!">
    <meta name="og:image" content="{{ asset('img/suz.jpg') }}">

    {{-- jQuery | Bootstrap --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    {{-- Sweetalert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.13/dist/sweetalert2.all.min.js" integrity="sha256-TBwuVto41E6J99u3aYEC1Ow9xioSgoQJG05j79iQzro=" crossorigin="anonymous"></script>

    {{-- Removes the code that shows up when script is disabled/not allowed/blocked --}}
    <script type="text/javascript" id="for-js-disabled-js">$('head').append('<style id="for-js-disabled">#js-disabled { display: none; }</style>');$(document).ready(function() {$('#js-disabled').remove();$('#for-js-disabled').remove();$('#for-js-disabled-js').remove();});</script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- 
        jquery
        bootstrap
        bootstrap 
    --}}
    @vite('resources/css/app.css')
    
    @livewireStyles
    
    @yield('less_import')
    @yield('javascript')
    <title>@yield('page title')</title>

    <livewire:styles />

</head>
    @yield('body')
    
    
    @yield('script')
</html>



    {{-- PANG POPUP NG MODAL TO --}}
{{-- SA AJAX TONG SCRIPT NA TO {{ for checking upvote // downvote}} --}}
<script src="{{ asset('js/ajax_home.js') }}" type="text/javascript"></script>




<script>
    $(document).ready(function(){

    $("input#search_input").on("input", function(){
        // Print entered value in a div box
        $("div.ajax").remove();
    });

    $('#test').click(function(){
        alert("test");
    });

    $("#form_submit").on("submit", function(){
        alert("wew");
        return false;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        
        //clears the search input box
        $("input#search_input").val('');
        //for message
        let nothing = "No Ratings";
        //rounding up of rating to 2 decimal places
        function roundUp(num, precision) {
            precision = Math.pow(10, precision)
            return Math.ceil(num * precision) / precision
        }
        //first param -> form route and action (post-get)
        //second param -> serialize the form
        //third param -> the server response
        $.post( $(this).attr("action"), $(this).serialize(), function(response) {
            //if success (message is true: that means it worked)

            if(response.message) {
                
                Swal.fire({
                    icon: 'success',
                    title: `Success`,
                    iconColor: 'white',
                    html: `<p class="text-white font mx-auto swal-text">${response.details}</p>`,
                    background: `#a5dc86`,
                    position: `top`,
                    showConfirmButton: false,
                    timer: 5000,
                    toast: true,
                    customClass: {
                        title: 'text-white',
                    },

                    });

                $('#recipe_list').html("");
                $('#pagination').html("");
                $('#no_result').html("");

                
                $.each(response.recipes, function (key, item) { 
                    (item.average_rating === null) ? item.average_rating = nothing : item.average_rating = roundUp(item.average_rating, 1) + " Stars";

                    //this is for the route link
                    let recipe_link = '{{route("recipe.show", [":name", ":id"])}}';
                    recipe_link = recipe_link.replace(':name', item.recipe_name);
                    recipe_link = recipe_link.replace(':id', item.id);



                    $('#recipe_list').append('\
                    <div id="recipe_item" class="m-2 d-flex flex-column text-center shadow ajax">\
                        <div id="title_container" class="d-flex align-items-center justify-content-center">\
                            <p class="text-break font" id="recipe_name">'+ item.recipe_name +'</p>\
                        </div>\
                        <img src="" id="gallery-img" alt="" class="img-recipe">\
                        <div id="count-star" class="mt-2 d-flex justify-content-between align-items-center">\
                            <p class="text-break font" id="ingredient_count">'+ item.ingredient_count +' Ingredients</p>\
                            <p class="stars font" id="averate_rating">'+ item.average_rating +'</p>\
                        </div>\
                        <a id="recipe_id" href="'+ recipe_link +'" class="text-decoration-none btn btn-primary mt-2 text-white font">View</a></button>\
                    </div>');
                });
            }
            else 
            {
                Swal.fire({
                    icon: 'error',
                    title: `Nothing Found`,
                    iconColor: 'white',
                    html: `<p class="text-white font mx-auto swal-text">${response.details}</p>`,
                    background: `#f27474`,
                    position: `top`,
                    timer: 5000,
                    showConfirmButton: false,
                    toast: true,
                    customClass: {
                        title: 'text-white',
                    },

                    });

                $('#recipe_list').html("");
                $('#pagination').html("");

               $('#recipe_list').append('\
                <div id="no_result" class="d-flex justify-content-center flex-wrap">\
                    <h2 class="mt-5 font fs-1 text-danger">NO RESULTS FOUND</h2>\
                </div>\
               ')
            }
            //if comment fails (empty comment)
        });
        
        return false; //to prevent the browser going to the form's action url
    });

    });   
</script>



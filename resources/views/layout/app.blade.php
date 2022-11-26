<!DOCTYPE html>
<html lang="en" dir="ltr">
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
    @livewireStyles
    
    @yield('less_import')
    @yield('javascript')
    <title>@yield('page title')</title>
    <style>
        * {
            box-sizing: border-box;
        }
    </style>
</head>
    @yield('body')
    @livewireScripts
    
    <script type="text/javascript">
        @if (Session::has('flash_error'))
        Swal.fire({
            {!!Session::has('has_icon') ? "icon: `error`," : ""!!}
            title: `{{Session::get('flash_error')}}`,
            {!!Session::has('message') ? 'html: `' . Session::get('message') . '`,' : ''!!}
            position: {!!Session::has('position') ? '`' . Session::get('position') . '`' : '`top`'!!},
            showConfirmButton: false,
            toast: {!!Session::has('is_toast') ? Session::get('is_toast') : true!!},
            {!!Session::has('has_timer') ? (Session::get('has_timer') ? (Session::has('duration') ? ('timer: ' . Session::get('duration')) . ',' : `timer: 10000,`) : '') : `timer: 10000,`!!}
            background: `#dc3545`,
            customClass: {
                title: `text-white`,
                content: `text-white`,
                popup: `px-3`
            },
        });
        @php(Session::forget("flash_error"))
        @elseif (Session::has('flash_info'))
        Swal.fire({
            {!!Session::has('has_icon') ? "icon: `info`," : ""!!}
            title: `{{Session::get('flash_info')}}`,
            {!!Session::has('message') ? 'html: `' . Session::get('message') . '`,' : ''!!}
            position: {!!Session::has('position') ? '`' . Session::get('position') . '`' : '`top`'!!},
            showConfirmButton: false,
            toast: {!!Session::has('is_toast') ? Session::get('is_toast') : true!!},
            {!!Session::has('has_timer') ? (Session::get('has_timer') ? (Session::has('duration') ? ('timer: ' . Session::get('duration')) . ',' : `timer: 10000,`) : '') : `timer: 10000,`!!}
            background: `#17a2b8`,
            customClass: {
                title: `text-white`,
                content: `text-white`,
                popup: `px-3`
            },
        });
        @php(Session::forget("flash_info"))
        @elseif (Session::has('flash_success'))
        Swal.fire({
            {!!Session::has('has_icon') ? "icon: `success`," : ""!!}
            title: `{{Session::get('flash_success')}}`,
            {!!Session::has('message') ? 'html: `' . Session::get('message') . '`,' : ''!!}
            position: {!!Session::has('position') ? '`' . Session::get('position') . '`' : '`top`'!!},
            showConfirmButton: false,
            toast: {!!Session::has('is_toast') ? Session::get('is_toast') : true!!},
            {!!Session::has('has_timer') ? (Session::get('has_timer') ? (Session::has('duration') ? ('timer: ' . Session::get('duration')) . ',' : `timer: 10000,`) : '') : `timer: 10000,`!!}
            background: `#28a745`,
            customClass: {
                title: `text-white`,
                content: `text-white`,
                popup: `px-3`
            },
        });
        @php(Session::forget("flash_success"))
        @endif
    </script>
    
    @yield('script')

</html>



    {{-- PANG POPUP NG MODAL TO --}}
@if($errors->any())
    <script>
        $(document).ready(function(){
            $('#create_post_modal').modal('show');
        });
    </script>
@endif

// {{-- SA AJAX TONG SCRIPT NA TO {{ for checking upvote // downvote}}--}}
<script src="{{ asset('js/ajax_home.js') }}" type="text/javascript"></script>

@if (isset($liked_posts[0]) && $liked_posts[0]->like == 1)
    <script type="text/javascript">
        $(document).ready(function(){
            $('#upvote').addClass("bg bg-primary");
            $('#downvote').removeClass("bg bg-danger")
        });
    </script>
@elseif(isset($liked_posts[0]) && $liked_posts[0]->like == -1)
    <script type="text/javascript">
        $(document).ready(function(){
                $('#upvote').removeClass("bg bg-primary");
                $('#downvote').addClass("bg bg-danger")
            });
    </script>
@endif

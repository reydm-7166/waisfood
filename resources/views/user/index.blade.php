@extends('layout.app')

{{-- LESS // CSS --}}
@section('less_import')
    {{-- LIVEWIRE --}}
    @livewireStyles
    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/index.less') }}" />
    <script src="https://cdn.jsdelivr.net/npm/less" ></script>
    {{-- TAILWIND --}}
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
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
    </main>

@endsection
@extends('layout.app')

{{-- LESS // CSS --}}
@section('less_import')
    {{-- LIVEWIRE --}}
    @livewireStyles
    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/index.less') }}" />
    <script src="https://cdn.jsdelivr.net/npm/less" ></script>
    @vite('resources/css/app.css')
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
   <div class="main-page-con relative bg-[#f6941c]">
    <div class="main-nav absolute w-[100%] bg-[transparent] pl-[35px] pr-[35px] pt-[10px] pb-[10px] flex items-center mt-4">
        <div class="nav-logo bg-[transparent] flex-1">
            <img class="w-[120px] hide ml-[-20px]" src="{{asset('Yellow and Green Banana Fruit Food Logo (1).png')}}" alt="Wais logo"></div>
        <div class="nav-menu bg-[transparent] flex-1">
            <ul class="flex justify-around items-center" id="ul-container">
                <li class="z-10"><a href="" class="text-decoration-none font text-white">Home</a></li>
                <li class="z-10"><a href="" class="text-decoration-none font text-white">Generator</a></li>
                <li class="z-10"><a href="" class="text-decoration-none font text-white">About</a></li>
                <li class="z-10"><a href="" class="text-decoration-none font text-white">Blog</a></li>
                <li class="z-10"><a href="" class="text-decoration-none font text-white">Community</a></li>
                <li class="wais-user text-[25px] text-[white] flex items-center justify-center border-white rounded-[50%] border-[2px] border-solid w-[45px] h-[45px]"><i class="fa-regular fa-user"></i></li>
            </ul>
        </div>
    </div>
    <!-- SECTION 1 -->
    @livewire('main-page-component.section-one')
    <!-- SECTION 2 -->
    @livewire('main-page-component.section-two')
    <!-- SECTION 3 -->
    @livewire('main-page-component.section-three')
</div>
@endsection

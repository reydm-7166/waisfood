@extends('layout.app')

@section('less_import')
    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/register.less') }}" />
    <script src="https://cdn.jsdelivr.net/npm/less" ></script>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family= Lexend+Deca: wght@300;400 &display=swap');
    </style>
@endsection

@section('javascript')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="{{ asset('js/register_fade_success.js') }}"></script>
    
@endsection

@section('page title')
    Register
@endsection

@section('body')

{{-- new register layout --}}
<div class="w-[100%] h-[100vh] flex justify-center items-center">
    <form class="p-[20px] flex flex-col justify-center items-center">
        <div class="s-logo">
            <img class="w-[200px] ml-[-15px]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="Wais logo">
        </div>
        <div class="s-title font-bold text-[38px] mt-[-15px]">Create new Account</div>
        <div class="s-sub mt-[18px] mb-[15px]">Already Registered? <a href="/">Login</a></div>
        <div class="s-input-field flex flex-col m-[10px] w-[70%]">
            <label>FIRST NAME</label>
            <input class="rounded" type="text">
            <label>LAST NAME</label>
            <input class="rounded" type="text">
            <label>EMAIL</label>
            <input class="rounded" type="email">
            <label>PASSWORD</label>
            <input class="rounded" type="password">
            <label>AGE</label>
            <input class="rounded" type="number">
        </div>
        <button type="submit" class="signup-btn text-[white] font-bold bg-[black] p-[10px] w-[170px] text-center mt-[10px]">Sign Up</button>
    </form>
</div>
{{-- new register layout --}}

<body class="bg-secondary w-100">
    <main class="bg-primary w-75">
        <section id="left">
            @if(Session::has('success'))
                <div id="success" class="alert alert-success p-3 border rounded">
                    <p class="font fs-4 text-success d-inline-block">{{  Session::get('success') }}</p>
                    <img src="img/success.png" width="30px" height="30px" alt="">
                </div>
            @endif
            <img src="img/iconregister.jpg" class="img-fluid" alt="">
        </section>
        <section class="bg-light" id="right">
            <p class="font mt-3 d-inline-block me-3" id="rightp">Already have an account?</p>

            <button class="btn btn-primary d-inline-block border-white font"><a href="{{ route('login.index') }}" class="text-decoration-none text-white">Log in</a></button>
            
            <h2 class="font fw-bolder mt-3 d-block">Create your account</h2>

            <div id="forms" class="mt-3 w-100">
                <form action="{{ route('register.store') }}" method="POST">
                    @csrf

                    <div id="first_name" class="w-75">
                        <label for="" class="font">First Name</label>
                        <input type="text" name="first_name" required value="{{ old('first_name') }}" class="w-100 mt-2 form-control p-2 ps-3 shadow font{{($errors->first('first_name') ? " form-error" : "")}}" placeholder="ex. John">
                        @if($errors->first('first_name'))
                            <small class="form-text d-block text-danger fw-bold">{{ $errors->first('first_name') }}</small>
                        @endif
                    </div>

                    <div id="last_name" class="w-75">
                        <label for="" class="font">Last Name</label>
                        <input type="text" name="last_name" required value="{{ old('last_name') }}"class="w-100 mt-2 form-control p-2 ps-3 shadow font{{($errors->first('last_name') ? " form-error" : "")}}" placeholder="ex. Doe">
                        @if($errors->first('last_name'))
                            <small class="form-text d-block text-danger fw-bold">{{ $errors->first('last_name') }}</small>
                        @endif
                    </div>

                    <div id="email" class="w-75">
                        <label for="" class="font">Email Address</label>
                        <input type="email" name="email_address" required value="{{ old('email_address') }}"class="w-100 mt-2 form-control p-2 ps-3 shadow font{{($errors->first('email_address') ? " form-error" : "")}}" placeholder="ex. you@example.com">
                        @if($errors->first('email_address'))
                            <small class="form-text d-block text-danger fw-bold">{{ $errors->first('email_address') }}</small>
                        @endif
                    </div>
                    
                    <div id="password" class="w-75">
                        <label for="" class="font">Password</label>
                        <input type="password" name="password" required class="w-100 mt-2 form-control p-2 ps-3 shadow font{{($errors->first('password') ? " form-error" : "")}}" placeholder="Must be 8 characters or long">
                        @if($errors->first('password'))
                            <small class="form-text d-block text-danger fw-bold">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                 
                    <input type="submit" value="Create your account" class="btn btn-primary text-light w-75 p-3 fs-5 mt-4">

                </form>
            </div>
            <div id="options" class="text-center w-75">
                <p class="m-auto mt-4 fs-5 font">OR</p>

                <div id="google" class="text-centerd-inline-block p-2 pt-4 mt-3 border rounded-3 shadow border-1 border-light">
                    <a href="{{ route('service.register', "google") }}" class="text-decoration-none text-dark"><img src="/img/google.png" alt="" class="d-inline-block align-top"><p class="d-inline-block font ms-3 fs-6 align-bottom">Sign up with Google</p></a>
                </div>

                <div id="google" class="text-center p-2 d-inline-block pt-4 mt-3 border rounded-3 shadow border-1 border-light">
                    <a href="{{ route('service.register', "facebook") }}" class="text-decoration-none text-dark"><img src="/img/fb.png" alt="" class="d-inline-block align-top"><p class="d-inline-block font ms-3 fs-6 align-bottom">Sign up with Facebook</p></a>
                </div>

            </div>
        </section>
    </main>
</body>




@endsection

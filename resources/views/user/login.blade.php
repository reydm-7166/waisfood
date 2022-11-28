@extends('layout.app')
@section('less_import')
    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/login.less') }}" />
    <script src="https://cdn.jsdelivr.net/npm/less" ></script>

    <style>@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');</style>
@endsection
@section('page title')
    Login
@endsection

@section('body')
{{-- new login layout --}}
<div class="login-main w-[100%] bg-[#f6941c] h-[100vh] flex flex-col items-center">
    <form action="{{ route('login.submit') }}" method="POST" class="login-form w-[80%] flex mt-[100px]">
        <div class="left flex-[1] p-[40px] bg-[white]">
            <div class="logo">
                <img class="w-[120px] ml-[-20px]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="Wais logo">
            </div>
            <div class="login-title mb-[20px]">
                <p class="font-bold text-[40px]">No more</p>
                <p class="font-bold text-[40px]">food waste.</p>
            </div>
            <div class="input-field">
                <input class="mb-[20px] p-[12px] w-[100%] rounded" type="text" placeholder="👤 Username or email">
                <input class="mb-[20px] p-[12px] w-[100%] rounded" type="password" placeholder="🔒 Password">
            </div>
            <div class="sign-up-link text-[15px]">No account? <span class="font-bold"><a href="/register">Signup</a></span></div>
            <div class="login-btn mt-[20px] mb-[20px] flex justify-end">
                <button type="submit" class="p-[10px] w-[120px] rounded bg-[#f6941c] text-[white] font-bold">Login</button>
            </div>
        </div>
        <div class="right-login-img flex-[1.29]">
            <img class="h-[100%] w-[100%]" src="\assets\login-image.png" alt="Wais Food Login side Image">
        </div>
    </form>
</div>
{{-- new login layout --}}

<body class="w-100 p-0">
    <main class="bg-secondary m-auto mt-5 w-75 border rounded shadow-lg text-center p-5 border-0" id="container">
        <section id="left" class="d-inline-block shadow-lg border text-start rounded bg-white align-top p-2 ps-5 pe-5">
            <p class="mt-5 d-block fs-1 fw-bolder">Login</p>
            <p class="d-block font">Don't have an account yet? <a href="{{ route('register.create') }}" class="font">Register here!</a></p>

            <form action="{{ route('login.submit') }}" method="POST" class="d-block mt-4">
                @csrf
                <div id="form">
                    <label for="" class="form-label mb-2">Email Address</label>
                    <input type="email" name="email_address" value="{{ old('email_address') }}" class="form-control mt-1 p-3 border-2{{($errors->first('email_address') ? " form-error" : "")}}" placeholder="you@example.com">
                    @if($errors->first('email_address'))
                        <small class="form-text d-block text-danger fw-bold">{{ $errors->first('email_address') }}</small>
                    @endif
                </div>

                <div id="form">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control mb-2 p-3 border-2 {{($errors->first('password') ? " form-error" : "")}}" placeholder="8 Characters or more">
                    @if($errors->first('password'))
                        <small class="form-text d-block text-danger fw-bold">{{ $errors->first('password') }}</small>
                    @endif
                </div>
                <input type="checkbox" class="mt-2" name="checkbox">
                <label class="form-check-label">Remember me</label>

                <input type="submit" class="btn btn-primary d-block mt-2 w-100 fs-4 p-3 fw-bolder shadow mb-1" id="button" value="LOGIN">
            </form>

                <p class="text-center font mt-4">__________ or login with __________ </p>

                <div class="border border-success p-3 d-inline-block rounded mt-3 ms-3" id="google">
                    <a href="{{ route('service.register', "google") }}"><img src="img/google.png" class="d-inline-block align-top" alt=""><p class="d-inline-block align-middle font ms-2 text-success">GOOGLE</p></a> 
                </div>

                <div class="border border-success p-3 d-inline-block rounded mt-3 ms-2" id="facebook">
                    <a href="{{ route('service.register', "facebook") }}"><img src="img/fb.png" class="d-inline-block align-top" alt=""><p class="d-inline-block align-middle font ms-2 text-primary">FACEBOOK</p></a>
                </div>
        </section>

        <section id="right" class="d-inline-block shadow-lg border rounded border-secondary ms-1 align-top">
            <img src="img/iconlogin.jpg" class="img-fluid rounded img-thumbnail" alt="">
        </section>
    </main>
</body>

@endsection
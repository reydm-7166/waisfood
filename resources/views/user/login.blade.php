@extends('layout.app')
@section('less_import')
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/4dc2abe180.js" crossorigin="anonymous"></script> 
    @vite('resources/css/app.css')

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
        @csrf
        <div class="left flex-[1] p-[40px] bg-[white]">
            <div class="logo">
                <img class="w-[120px] ml-[-20px]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="Wais logo">
            </div>
            <div class="login-title mb-[20px]">
                <p class="font-bold text-[40px]">No more</p>
                <p class="font-bold text-[40px]">food waste.</p>
            </div>
            <div class="input-field">
                <div id="form" class="mb-[20px]">
                    <input type="email" name="email_address" value="{{ old('email_address') }}" class="rounded p-[12px] w-[100%]{{($errors->first('email_address') ? " form-error" : "")}}" placeholder="👤 Username or email">
                    @if($errors->first('email_address'))
                        <small class="form-text d-block text-danger fw-bold mb-[20px] ">{{ $errors->first('email_address') }}</small>
                    @endif
                </div>

                <div id="form" class="mb-[20px]">
                    <input type="password"" name="password" value="{{ old('email_address') }}" class="rounded p-[12px] w-[100%]{{($errors->first('password') ? " form-error" : "")}}" placeholder="🔒 Password">
                    @if($errors->first('password'))
                        <small class="form-text d-block text-danger fw-bold mb-[20px] ">{{ $errors->first('password') }}</small>
                    @endif
                </div>
            </div>
            <div class="sign-up-link text-[15px]">No account? <span class="font-bold"><a href="/register"><a href="{{ route('register.create') }}">Signup</a></span></div>
            <div class="login-btn mt-[20px] mb-[20px] flex justify-end">
                <button type="submit" class="p-[10px] w-[120px] rounded bg-[#f6941c] text-[white] font-bold">Login</button>
            </div>

            <div class="py-1 pt-2 mx-auto d-block rounded bg-[#f6941c]" id="facebook">
                <a href="{{ route('service.register', "facebook") }}"><img src="img/fb.png" class="d-inline-block align-top" alt=""><p class="d-inline-block align-middle font ms-2 text-[white] font my-1 font-bold">Login with Facebook</p></a>
            </div>

        </div>
        <div class="right-login-img flex-[1.29]">
            <img class="h-[100%] w-[100%]" src="\assets\login-image.png" alt="Wais Food Login side Image">
        </div>
        
    </form>
    



</div>

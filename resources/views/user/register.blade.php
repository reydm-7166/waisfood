@extends('layout.app')

@section('less_import')
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
    <form action="{{ route('register.store') }}" method="POST" class="p-[20px] flex flex-col justify-center items-center">
        @csrf
        <div class="s-logo">
            <img class="w-[200px] ml-[-15px]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="Wais logo">
        </div>
        <div class="s-title font-bold text-[38px] mt-[-15px]">Create new Account</div>
        <div class="s-sub mt-[18px] mb-[15px]">Already Registered? <a href="{{route('login.index')}}">Login</a></div>
        <div class="s-input-field flex flex-col m-[10px] w-[70%]">
            <label class="mt-3">FIRST NAME</label>
            <input class="rounded {{($errors->first('first_name') ? " form-error" : "")}}" type="text" name="first_name" required value="{{ old('first_name') }}">
            @if($errors->first('first_name'))
                <small class="form-text d-block text-red-500 text-xs font-bold">{{ $errors->first('first_name') }}</small>
            @endif

            <label class="mt-3">LAST NAME</label>
            <input class="rounded {{($errors->first('last_name') ? " form-error" : "")}}" type="text" name="last_name" required value="{{ old('last_name') }}">
            @if($errors->first('last_name'))
                <small class="form-text d-block text-red-500 text-xs font-bold">{{ $errors->first('last_name') }}</small>
            @endif

            <label class="mt-3">EMAIL</label>
            <input class="rounded {{($errors->first('email_address') ? " form-error" : "")}}" name="email_address" required value="{{ old('email_address') }}">
            @if($errors->first('email_address'))
                <small class="form-text d-block text-red-500 text-xs font-bold">{{ $errors->first('email_address') }}</small>
            @endif

            <label class="mt-3">PASSWORD</label>
            <input class="rounded {{($errors->first('password') ? " form-error" : "")}}" type="password" name="password" required>
            @if($errors->first('password'))
                <small class="form-text d-block text-red-500 text-xs font-bold">{{ $errors->first('password') }}</small>
            @endif

        </div>
        <button type="submit" class="signup-btn text-[white] font-bold bg-[black] p-[10px] w-[170px] text-center mt-[10px]">Sign Up</button>
            <p class="my-3">OR</p>

        <button class="signup-btn text-[white] font-bold bg-blue-400 p-[10px] w-[270px] text-center mt-[10px]"><a href="{{ route('service.register', "facebook") }}" class="text-decoration-none hover:no-underline hover:text-white">Sign Up with FACEBOOK</a></button>

    </form>
    
</div>
{{-- new register layout --}}

</body>




@endsection

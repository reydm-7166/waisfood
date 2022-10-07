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
                    <img src="img/google.png" class="d-inline-block align-top" alt=""><p class="d-inline-block align-middle font ms-2 text-success">GOOGLE</p>
                </div>
                <div class="border border-success p-3 d-inline-block rounded mt-3 ms-2" id="facebook">
                    <img src="img/fb.png" class="d-inline-block align-top" alt=""><p class="d-inline-block align-middle font ms-2 text-primary">FACEBOOK</p>
                </div>
        </section>

        <section id="right" class="d-inline-block shadow-lg border rounded border-secondary ms-1 align-top">
            <img src="img/iconlogin.jpg" class="img-fluid rounded img-thumbnail" alt="">
        </section>
    </main>
</body>

@endsection
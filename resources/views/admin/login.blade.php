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
        <style>@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');</style>
		@livewireStyles

		<title>Login</title>

		<style>
			* {
				box-sizing: border-box;
				font-family: "Montserrat", sans-serif;
			}

            .form-error {
                border: 2px solid #e74c3c;
            }

			.overflow-x-hidden { overflow-x: hidden; }
			.overflow-x-scroll { overflow-x: scroll; }
			.overflow-x-auto { overflow-x: auto; }

			{{-- Button Styling --}}
			.btn-orange:not(.active) {
				color: rgb(255 237 216);
				background-color: rgb(247 148 29)!important;
				border-color: rgb(247 148 29)!important;
			}
			.btn-check:active+.btn-orange,
			.btn-check:checked+.btn-orange,
			.btn-orange.active,
			.btn-orange.dropdown-toggle.show,
			.btn-orange:active {
				color: rgb(255 255 255);
				background-color: rgb(225 130 17)!important;
				border-color: rgb(225 130 17)!important;
			}

			.btn-check:focus+.btn-orange,
			.btn-orange:focus {
				color: rgb(255 255 255);
				background-color: rgb(225 130 17)!important;
				border-color: rgb(225 130 17)!important;
				box-shadow: 0 0 0 .25rem rgba(247, 148, 29, 50%);
			}

			{{-- Background Color --}}
			.bg-shaded {
				background-color: rgb(108 117 125 / 5%)!important;
			}

			.bg-orange:not(.form-check-input:not(:checked)),
			.nav-pills .nav-link.bg-orange.active {
				background-color: rgb(247 148 29)!important;
				color: white;
			}

			.img-block {
				background: url('{{ asset("assets/login_bg.jpg") }}');
				backdrop-filter: ;
			}

			#sidebar {
				max-height: 100vh;
			}
		</style>

		<livewire:styles />
	</head>

	<body class="overflow-x-hidden">
		<div class="container-fluid min-vh-100">
			<div class="row flex-nowrap position-relative min-vh-100">
				<div class="col-12 col-lg-3 min-vh-100 shadow d-flex flex-column px-5 overflow-hidden" style="transition: 0.25s ease-in-out; max-height: 100vh;">
					{{-- Header Image --}}
					<img src="{{ asset('assets/Yellow and Green Banana Fruit Food Logo (1).png') }}" class="img img-fluid mx-auto h-25" draggable="false">

					{{-- LOGIN FORM --}}
					<form class="form my3 my-md-5" action="{{ route('login.submit') }}" method="POST">
                        @csrf
						<div class="form-group mt-5">
							<label for="email" class="form-label">Email:</label>
							<input type="email" class="form-control bg-shaded border-0{{($errors->first('email') ? " form-error" : "")}}" value="{{ old('email') }}" id="email" name="email" placeholder="">
                            @if($errors->first('email'))
                                <small class="form-text d-block text-danger fw-bold mb-[20px] ">{{ $errors->first('email') }}</small>
                            @endif
						</div>

						<div class="form-group mt-2">
							<label for="password" class="form-label">Password:</label>
							<input type="password" class="form-control bg-shaded border-0{{($errors->first('password') ? " form-error" : "")}}" value="{{ old('password') }}" id="password" name="password" placeholder="">
                            @if($errors->first('password'))
                                <small class="form-text d-block text-danger fw-bold mb-[20px] ">{{ $errors->first('password') }}</small>
                            @endif
						</div>

						<div class="form-group mt-2 d-flex justify-content-between">
							<input type="submit" class="btn btn-orange px-2 mt-3" value="Log in">
						</div>
					</form>
				</div>

				<div class="col-12 col-lg-9 min-vh-100 px-0 d-none d-md-block img-block position-relative" style="transition: 0.25s ease-in-out;">
					<div class="w-100 h-100 bg-orange" style="opacity: 0.5;"></div>
				</div>
			</div>
		</div>
	</body>
</html>

<script>
    $(document).ready(function(){
			@if($message = session('success'))
				Swal.fire({
					icon: 'success',
					title: `{{$message}}`,
					iconColor: 'white',
					background: `#a5dc86`,
					position: `top-right`,
					showConfirmButton: false,
					timer: 5000,
					toast: true,
					customClass: {
						title: 'text-white',
					},
				});
			@endif

			@if($message = session('error'))
				Swal.fire({
					icon: 'error',
					title: `Account Permission Error\n\n {{$message}}`,
					iconColor: 'white',
					background: `red`,
					position: `top-right`,
					showConfirmButton: false,
					timer: 5000,
					toast: true,
					customClass: {
						title: 'text-white',
					},
				});
			@endif
    });
</script>

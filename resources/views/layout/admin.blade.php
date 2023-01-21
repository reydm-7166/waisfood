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
		<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

		{{-- Sweetalert 2 --}}
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.13/dist/sweetalert2.all.min.js" integrity="sha256-TBwuVto41E6J99u3aYEC1Ow9xioSgoQJG05j79iQzro=" crossorigin="anonymous"></script>

		{{-- Fontawesome 6 --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		{{-- Removes the code that shows up when script is disabled/not allowed/blocked --}}
		<script type="text/javascript" id="for-js-disabled-js">$('head').append('<style id="for-js-disabled">#js-disabled { display: none; }</style>');$(document).ready(function() {$('#js-disabled').remove();$('#for-js-disabled').remove();$('#for-js-disabled-js').remove();});</script>

		<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@1&display=swap" rel="stylesheet">

		<style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap'); </style>
		@livewireStyles

		<title>@yield('title')</title>

		<style>
			* {
				box-sizing: border-box;
				font-family: "Montserrat", sans-serif;
			}

			.overflow-x-hidden { overflow-x: hidden; }
			.overflow-x-scroll { overflow-x: scroll; }
			.overflow-x-auto { overflow-x: auto; }

			.sidebar, .sidebar+div {
				transition: 0.25s ease-in-out;
			}

            .cursor-disabled:hover {
                cursor:
            }

            .cursor-pointer {
                cursor: pointer;
            }
            .text-greater {
                color: #f4941c;
            }
            .bg-greater {
                background: #f4941c;
            }

			.navbar-toggler-icon {
				transition: 0.25s ease-in-out;
			}

			.navbar-toggler-icon.rotate {
				transform: rotateZ(90deg);
			}

			{{-- Button Styling --}}
			.btn-outline-light-orange:not(.active) {
				color: rgb(255 237 216)!important;
				border-color: rgb(255 237 216)!important;
			}
			.btn-check:active+.btn-outline-light-orange,
			.btn-check:checked+.btn-outline-light-orange,
			.btn-outline-light-orange.active,
			.btn-outline-light-orange.dropdown-toggle.show,
			.btn-outline-light-orange:active {
				color: rgb(255 255 255)!important;
				background-color: rgb(255 237 216)!important;
				border-color: rgb(255 237 216)!important;
			}

			.btn-outline-orange:not(.active) {
				color: rgb(247 148 29)!important;
				border-color: rgb(247 148 29)!important;
			}
			.btn-check:active+.btn-outline-orange,
			.btn-check:checked+.btn-outline-orange,
			.btn-outline-orange.active,
			.btn-outline-orange.dropdown-toggle.show,
			.btn-outline-orange:active {
				color: rgb(255 255 255)!important;
				background-color: rgb(247 148 29)!important;
				border-color: rgb(247 148 29)!important;
			}

			{{-- Background Color --}}
			.bg-light-orange:not(.form-check-input:not(:checked)),
			.nav-pills .nav-link.bg-light-orange.active {
				background-color: rgb(255 237 216)!important;
				color: white;
			}

			.bg-orange:not(.form-check-input:not(:checked)),
			.nav-pills .nav-link.bg-orange.active {
				background-color: rgb(247 148 29)!important;
				color: white;
			}

			{{-- Border Color --}}
			.border-light-orange:not(.form-check-input:not(:checked)),
			.nav-pills .bg-light-orange.active {
				border-color: rgb(255 237 216)!important;
			}

			.nav-pills .nav-link.btn-outline-orange:not(.active) { color: rgb(247 148 29); }
			.border-orange:not(.form-check-input:not(:checked)),
			.nav-pills .bg-orange.active {
				border-color: rgb(247 148 29)!important;
			}

			{{-- Text Color --}}
			.text-light-orange {
				color: rgb(255 237 216)!important;
			}

			.text-orange {
				color: rgb(247 148 29)!important;
			}

			.sidebar > .active, .sidebar > a:hover { background-color: rgb(255 208 151); }
			.sidebar > a:active { background-color: rgb(255 182 93); }

			.cursor-grab { cursor: grab; }
			.cursor-grab:active { cursor: grabbing; }

			@media (max-width: 992px) {
				.sidebar.hide {
					opacity: 0;
					transform: translateX(-100%);
				}

				.sidebar.hide+div {
					transform: translateX(-50%);
				}
			}

			#sidebar {
				max-height: 100vh;
			}

            /* Animation Style on Loading */

            /*!
            * Load Awesome v1.1.0 (http://github.danielcardoso.net/load-awesome/)
            * Copyright 2015 Daniel Cardoso <@DanielCardoso>
            * Licensed under MIT
            */
            .la-ball-pulse-sync,
            .la-ball-pulse-sync > div {
                position: relative;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                        box-sizing: border-box;
            }
            .la-ball-pulse-sync {
                display: block;
                font-size: 0;
                color: #fff;
            }
            .la-ball-pulse-sync.la-dark {
                color: #333;
            }
            .la-ball-pulse-sync > div {
                display: inline-block;
                float: none;
                background-color: currentColor;
                border: 0 solid currentColor;
            }
            .la-ball-pulse-sync {
                width: 54px;
                height: 18px;
            }
            .la-ball-pulse-sync > div {
                width: 10px;
                height: 10px;
                margin: 4px;
                border-radius: 100%;
                -webkit-animation: ball-pulse-sync .6s infinite ease-in-out;
                -moz-animation: ball-pulse-sync .6s infinite ease-in-out;
                    -o-animation: ball-pulse-sync .6s infinite ease-in-out;
                        animation: ball-pulse-sync .6s infinite ease-in-out;
            }
            .la-ball-pulse-sync > div:nth-child(1) {
                -webkit-animation-delay: -.14s;
                -moz-animation-delay: -.14s;
                    -o-animation-delay: -.14s;
                        animation-delay: -.14s;
            }
            .la-ball-pulse-sync > div:nth-child(2) {
                -webkit-animation-delay: -.07s;
                -moz-animation-delay: -.07s;
                    -o-animation-delay: -.07s;
                        animation-delay: -.07s;
            }
            .la-ball-pulse-sync > div:nth-child(3) {
                -webkit-animation-delay: 0s;
                -moz-animation-delay: 0s;
                    -o-animation-delay: 0s;
                        animation-delay: 0s;
            }
            .la-ball-pulse-sync.la-sm {
                width: 26px;
                height: 8px;
            }
            .la-ball-pulse-sync.la-sm > div {
                width: 4px;
                height: 4px;
                margin: 2px;
            }
            .la-ball-pulse-sync.la-2x {
                width: 108px;
                height: 36px;
            }
            .la-ball-pulse-sync.la-2x > div {
                width: 20px;
                height: 20px;
                margin: 8px;
            }
            .la-ball-pulse-sync.la-3x {
                width: 162px;
                height: 54px;
            }
            .la-ball-pulse-sync.la-3x > div {
                width: 30px;
                height: 30px;
                margin: 12px;
            }
            /*
            * Animation
            */
            @-webkit-keyframes ball-pulse-sync {
                33% {
                    -webkit-transform: translateY(100%);
                            transform: translateY(100%);
                }
                66% {
                    -webkit-transform: translateY(-100%);
                            transform: translateY(-100%);
                }
                100% {
                    -webkit-transform: translateY(0);
                            transform: translateY(0);
                }
            }
            @-moz-keyframes ball-pulse-sync {
                33% {
                    -moz-transform: translateY(100%);
                        transform: translateY(100%);
                }
                66% {
                    -moz-transform: translateY(-100%);
                        transform: translateY(-100%);
                }
                100% {
                    -moz-transform: translateY(0);
                        transform: translateY(0);
                }
            }
            @-o-keyframes ball-pulse-sync {
                33% {
                    -o-transform: translateY(100%);
                    transform: translateY(100%);
                }
                66% {
                    -o-transform: translateY(-100%);
                    transform: translateY(-100%);
                }
                100% {
                    -o-transform: translateY(0);
                    transform: translateY(0);
                }
            }
            @keyframes ball-pulse-sync {
                33% {
                    -webkit-transform: translateY(100%);
                    -moz-transform: translateY(100%);
                        -o-transform: translateY(100%);
                            transform: translateY(100%);
                }
                66% {
                    -webkit-transform: translateY(-100%);
                    -moz-transform: translateY(-100%);
                        -o-transform: translateY(-100%);
                            transform: translateY(-100%);
                }
                100% {
                    -webkit-transform: translateY(0);
                    -moz-transform: translateY(0);
                        -o-transform: translateY(0);
                            transform: translateY(0);
                }
            }

            #top-container {
                height: 4rem;
            }
            #recipe-added {
                height: 25rem;
            }
            #gen-details {
                height: 15rem;
            }
            #total-container {
                height: 23rem;
            }
            .gen-details-elements {
                height: 100%;
            }
            .custom-w {
                width: 31%;
            }
		</style>

		@yield('css')

		<livewire:styles />
	</head>

	<body class="overflow-x-hidden">
		{{-- SHOWS THIS INSTEAD WHEN JAVASCRIPT IS DISABLED --}}
		<div style="position: absolute; height: 100vh; width: 100vw; background-color: #ccc;" id="js-disabled">
			<style type="text/css">
				/* Make the element disappear if JavaScript isn't allowed */
				.js-only {
					display: none!important;
				}
			</style>
			<div class="row h-100">
				<div class="col-12 col-md-4 offset-md-4 py-5 my-auto">
					<div class="card shadow my-auto">
						<h4 class="card-header card-title text-center">Javascript is Disabled</h4>

						<div class="card-body">
							<p class="card-text">This website required <b>JavaScript</b> to run. Please allow/enable JavaScript and refresh the page.</p>
							<p class="card-text">If the JavaScript is enabled or allowed, please check your firewall as they might be the one disabling JavaScript.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid min-vh-100 js-only">
			<div class="row flex-nowrap position-relative min-vh-100">
				<div class="col-6 col-lg-2 min-vh-100 shadow d-flex flex-column px-0 overflow-hidden sidebar hide sticky-top" id="sidebar">
					{{-- Header Image --}}
					<img src="{{ asset('assets/Yellow and Green Banana Fruit Food Logo (1).png') }}" class="img-fluid w-75 mx-auto" draggable="false">

					{{-- ACTUAL NAV START --}}

					{{-- Dashboard --}}
					@if (Request::is('admin/dashboard'))
					<span class="nav-item nav-link text-dark active"><i class="fas fa-house me-2"></i>Dashboard</span>
					@elseif (request()->is('admin/dashboard/*'))
					<a href="{{ route('admin.dashboard') }}" class="nav-item nav-link text-dark active"><i class="fas fa-house me-2"></i>Dashboard</a>
					@else
					<a href="{{ route('admin.dashboard') }}" class="nav-item nav-link text-dark"><i class="fas fa-house me-2"></i>Dashboard</a>
					@endif

					{{-- Inbox --}}
					{{-- @if (Request::is('admin/inbox'))
					<span class="nav-item nav-link text-dark active"><i class="fa-solid fa-inbox me-2"></i>Inbox</span>
					@elseif (request()->is('admin/inbox/*'))
					<a href="{{ route('admin.inbox') }}" class="nav-item nav-link text-dark active"><i class="fas fa-inbox me-2"></i>Inbox</a>
					@else
					<a href="{{ route('admin.inbox') }}" class="nav-item nav-link text-dark"><i class="fas fa-inbox me-2"></i>Inbox</a>
					@endif --}}

					{{-- User Management --}}
					@if (Request::is('admin/user-management'))
					<span class="nav-item nav-link text-dark active"><i class="fas fa-diagram-successor me-2"></i>User Management</span>
					@elseif (request()->is('admin/user-management/*'))
					<a href="{{ route('admin.user-management') }}" class="nav-item nav-link text-dark active"><i class="fas fa-diagram-successor me-2"></i>User Management</a>
					@else
					<a href="{{ route('admin.user-management') }}" class="nav-item nav-link text-dark"><i class="fas fa-diagram-successor me-2"></i>User Management</a>
					@endif


					{{-- Recipe Approval --}}
					@if (Request::is('admin/recipe-appoval'))
					<span class="nav-item nav-link text-dark active"><i class="fas fa-image me-2"></i>Recipe Approval</span>
					@elseif (request()->is('admin/recipe-appoval/*'))
					<a href="{{ route('admin.recipe-appoval') }}" class="nav-item nav-link text-dark active"><i class="fas fa-image me-2"></i>Recipe Approval</a>
					@else
					<a href="{{ route('admin.recipe-appoval') }}" class="nav-item nav-link text-dark"><i class="fas fa-image me-2"></i>Recipe Approval</a>
					@endif

					{{-- Content Management --}}
					@if (Request::is('admin/content-management'))
					<span class="nav-item nav-link text-dark active"><i class="fas fa-cog me-2"></i>Content Management</span>
					@elseif (request()->is('admin/content-management/*'))
					<a href="{{ route('admin.content-management') }}" class="nav-item nav-link text-dark active"><i class="fas fa-cog me-2"></i>Content Management</a>
					@else
					<a href="{{ route('admin.content-management') }}" class="nav-item nav-link text-dark"><i class="fas fa-cog me-2"></i>Content Management</a>
					@endif

					{{-- ACTUAL NAV END --}}

					{{-- Footer Image --}}
					<img src="{{ asset('assets/Admin Panel Post and Recipe Approval Asset.png') }}" class="img-fluid mt-auto mx-auto" style="max-width: 125%; margin-left: -12.5%!important; margin-bottom: -25%;" draggable="false">
				</div>

				{{-- CONTENTS START --}}
				<div class="col-12 col-lg-10 min-vh-100 px-0">
					<nav class="navbar navbar-expand-lg navbar-light bg-orange px-2">
						<button class="navbar-toggler" id="sidebar-toggler" type="button" data-target="#sidebar">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="dropdown ms-auto">
                            <p class="d-inline-block text-white pb-1 border-bottom border-primary"><a href="" class="text-decoration-none">{{Auth::user()->first_name . " " . Auth::user()->last_name}}</a></p>
							<a href='#' role="button" class="nav-link dropdown-toggle py-0 text-dark d-inline-block" style="font-size: 1.25rem;" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="{{ asset('img/profile-images/profile_picture.jpg') }}" class="img-fluid py-0" style="border-radius: 50%; width: 2rem; height: 2rem; object-fit: cover;" />
							</a>

							<div class="dropdown-menu dropdown-menu-end">
								{{-- <a class="dropdown-item" href="javascript:console.log('Under development...');"><i class="far fa-user me-2 text-orange"></i>My Profile</a> --}}
								<a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-arrow-right-from-bracket me-2 text-orange"></i>Logout</a>
							</div>
						</div>
					</nav>

					{{-- BODY START --}}
					<div class="container-fluid">
						@yield('body')
					</div>
					{{-- BODY END --}}
				</div>
				{{-- CONTENTS END --}}
			</div>
			@livewireScripts
		</div>

		<script type="text/javascript">
			$(document).ready(() => {
				$("#sidebar-toggler").on('click', (e) => {
					let obj = $(e.currentTarget);
					let target = $(obj.attr('data-target'));

					target.toggleClass('hide');
					$(obj.find('.navbar-toggler-icon')).toggleClass('rotate');

				});


			});


        </script>
		@yield('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
	</body>

</html>

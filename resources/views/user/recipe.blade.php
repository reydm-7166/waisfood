@extends('layout.app-org')

{{-- LESS // CSS --}}
@section('less_import')
    {{-- LIVEWIRE --}}
    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/recipe.less') }}" />
    @livewireStyles
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
    {{$results[0]->recipe_name}} Recipe
@endsection
    <style>
         @media (max-width: 480px) {

            .sidebar {
                display: none;
                visibility: hidden;
            }
        }
    </style>
@section('body')
    <main class="-pt-5">
        <div class="recipe-two-nav">@livewire('reusable.navbar')</div>

    {{-- SEARCH --}}


    @include('_partials._recipe')

    </div>
    </main>
    {{-- eto para sa expandable/responsive textarea (sa may livewire/feedbacks) --}}
<script>
    window.addEventListener('show-delete-dialog', event => {
        Swal.fire({
        title: 'Do you want to delete?',
        icon: 'warning',
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete'
        }).then((result) => {
        if (result.isConfirmed) {
                window.livewire.emit('delete_confirmed')
            }
        })
    });

    window.addEventListener('success', event => {
        Swal.fire({
            icon: 'success',
            title: `Deleted Successfully!`,
            iconColor: 'white',
            background: `#d33`,
            position: `top`,
            showConfirmButton: false,
            timer: 5000,
            toast: true,
            customClass: {
                title: 'text-white',
            },
        });
    });

    window.addEventListener('close-modal-then-success', event => {

        $('#close_modal').trigger('click');

        Swal.fire({
            icon: 'success',
            title: `Updated Successfully!`,
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
    });

    window.addEventListener('login-popup', event => {
        Swal.fire({
            icon: 'error',
            title: `Login First!`,
            iconColor: 'white',
            background: `#d33`,
            position: `top-right`,
            showConfirmButton: false,
            timer: 5000,
            toast: true,
            customClass: {
                title: 'text-white',
            },
        });
    });


    window.addEventListener('item-saved', event => {
            Swal.fire({
                icon: 'success',
                title: `Added to Saved Items`,
                iconColor: 'white',
                background: `#f6941c`,
                position: `top-right`,
                showConfirmButton: false,
                timer: 3000,
                toast: true,
                customClass: {
                    title: 'text-white',
                },
            });
        });
    window.addEventListener('item-unsaved', event => {
        Swal.fire({
            icon: 'success',
            title: `Removed from Saved Items`,
            iconColor: 'white',
            background: `#d33`,
            position: `top-right`,
            showConfirmButton: false,
            timer: 3000,
            toast: true,
            customClass: {
                title: 'text-white',
            },
        });
    });


</script>

@endsection
@livewireScripts

@extends('layout.app-org')

{{-- LESS // CSS --}}
@section('less_import')
    {{-- LIVEWIRE --}}
    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/recipe.less') }}" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/recipe-post.less') }}" />
    <script src="https://kit.fontawesome.com/4f2d93f234.js" crossorigin="anonymous"></script>

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

<script>
    $(document).ready(() => {
        window.addEventListener('success', event => {
            Swal.fire({
                icon: 'success',
                title: `Success`,
                iconColor: '#e7ad24',
                html: `<p class="mx-auto font text-[#e7ad24]">Comment Added Successfully!</p>`,
                background: `#faf4d4`,
                position: `top`,
                showConfirmButton: false,
                timer: 5000,
                toast: true,
                customClass: {
                    title: 'text-[#e7ad24]-700',
                },
            });
        });
        @if (session('confirm'))

            Swal.fire({
                title: 'Are you sure?',
                text: "This will be marked as done",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Mark it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Reviewed!',
                        text: 'Redirecting now ... Please Wait!',
                        icon: 'success',
                        showConfirmButton: false,
                    });

                    let id = $('#recipe_id').val();
                    let url = '{{ route("admin.confirmed_id", ":id") }}';

                    url = url.replace(':id', id);

                    setTimeout(function () {
                        window.location.href = url;
                    }, 2000); //will call the function after 4 secs.
                }
            });

        @endif





        window.addEventListener('updated-comment', event => {
            $('#close').trigger('click');
            Swal.fire({
                icon: 'success',
                title: `Edited Successfully`,
                iconColor: '#e7ad24',
                html: `<p class="mx-auto font text-[#e7ad24]">Comment Updated!</p>`,
                background: `#faf4d4`,
                position: `top-right`,
                showConfirmButton: false,
                timer: 5000,
                toast: true,
                customClass: {
                    title: 'text-[#e7ad24]-700',
                },
            });
        });
    });
</script>


@endsection

@section('page title')
    {{$results[0]->recipe_name}} Recipe
@endsection

@section('body')
    <main class="-pt-5">

    {{-- <section class="fixed p-3 bg-blue-400 rounded-md right-5 top-28 opacity-80">
        <p><i class="fa-solid fa-eye me-2 align-middle"></i>Viewing as Admin</p>
    </section> --}}


    @include('_partials._recipe-post')

    </div>
    {{-- {{dd($results)}} --}}
    </main>

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
                    window.livewire.emit('delete_comment')
                }
            })
        });
        window.addEventListener('deleted-success', event => {
            Swal.fire({
                icon: 'success',
                title: `Deleted Successfully!`,
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
        // upvote cahnge color
        window.addEventListener('change-upvote-color', event => {
            Swal.fire({
                icon: 'success',
                title: `Upvoted!`,
                iconColor: 'white',
                background: `#f6941c`,
                position: `top-right`,
                showConfirmButton: false,
                timer: 2000,
                toast: true,
                customClass: {
                    title: 'text-white',
                },
            });

            $('#upvote').css({'color' : '#f6941c'});
            $('#downvote').css('color', 'black');
        });

        window.addEventListener('remove-upvote-color', event => {
            $('#upvote').css('color', 'black');
        });
        // downvote change color
        window.addEventListener('change-downvote-color', event => {
            Swal.fire({
                icon: 'success',
                title: `Downvoted!`,
                iconColor: 'white',
                background: `#d33`,
                position: `top-right`,
                showConfirmButton: false,
                timer: 2000,
                toast: true,
                customClass: {
                    title: 'text-white',
                },
            });

            $('#downvote').css('color', 'red');
            $('#upvote').css('color', 'black');
        });


        window.addEventListener('remove-downvote-color', event => {
            $('#downvote').css('color', 'black');
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

        //this is for the saved items

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

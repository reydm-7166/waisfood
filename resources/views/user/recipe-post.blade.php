@extends('layout.app')

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

            window.addEventListener('updated-comment', event => {
                $('#close').trigger('click');
                Swal.fire({
                    icon: 'success',
                    title: `Edited Successfully`,
                    iconColor: '#e7ad24',
                    html: `<p class="mx-auto font text-[#e7ad24]">Comment Updated Successfully!</p>`,
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


    </script>
@endsection






@livewireScripts

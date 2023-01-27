<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wais Food</title>
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://kit.fontawesome.com/4dc2abe180.js" crossorigin="anonymous"></script>
        {{-- jquery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        {{-- sweetalert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.13/dist/sweetalert2.all.min.js" integrity="sha256-TBwuVto41E6J99u3aYEC1Ow9xioSgoQJG05j79iQzro=" crossorigin="anonymous"></script>
        {{-- tailwind elements --}}
        <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>
        {{-- fontawesome --}}
        <script src="https://kit.fontawesome.com/4dc2abe180.js" crossorigin="anonymous"></script>

        {{-- sweetalert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.13/dist/sweetalert2.all.min.js" integrity="sha256-TBwuVto41E6J99u3aYEC1Ow9xioSgoQJG05j79iQzro=" crossorigin="anonymous"></script>
        @vite('resources/css/app.css')
        <livewire:styles />
        @yield('css')
        <style>
            #pp {
                height: 100%;
                width: 100%;
            }
        </style>
    </head>


</head>
<body class="antialiased">
    @yield('body')

    <livewire:scripts />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

{{-- this is for add ingredient // directions in create post --}}

@yield('add_script_create-post')
</html>

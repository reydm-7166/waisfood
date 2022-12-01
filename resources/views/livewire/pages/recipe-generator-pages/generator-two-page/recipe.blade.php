<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        {{-- bootstrap --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        @vite('resources/css/app.css')
        <livewire:styles />
    </head>

    <body class="antialiased">
        <div class="generator-two">
            <div class="recipe-two-nav">@livewire('reusable.navbar')</div>
            
            @include('_partials._recipe_details')
        
        <livewire:scripts />
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
    </body>
    
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
    
    </script>
</html>
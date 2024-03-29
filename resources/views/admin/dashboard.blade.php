@extends('layout.admin')
@section('css')
    <style>
        #main-livewire {
            height: 100vh;
        }
    </style>
@endsection
@section('title', 'Dashboard')

@section('body')
    @livewire('admin-dashboard')
@endsection

@section('script')
    <script>
        $(document).ready(() => {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: `Success`,
                    iconColor: 'white',
                    html: `<p class="text-white font mx-auto swal-text">Logged In Successfully!</p>`,
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
        });
    </script>

@endsection

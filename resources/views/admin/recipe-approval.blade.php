@extends('layout.admin')

@section('title', 'Recipe Approval')

@section('body')
	@livewire('recipe-approval')
@endsection

@section('script')

    <script type="text/javascript">
        $(document).ready(() => {
            window.addEventListener('email_success', event => {
                Swal.fire({
                    icon: 'success',
                    title: `Emailed Successfully!`,
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

            window.addEventListener('email_error', event => {
                Swal.fire({
                    icon: 'error',
                    title: `Feature not yet ready!`,
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
            });
        });
    </script>

@endsection

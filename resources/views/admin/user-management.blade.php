@extends('layout.admin')

@section('title', 'User Management')

@section('body')
    @livewire('user-management')
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(() => {
            /**
             * Uses the jQuery UI sortable (https://api.jqueryui.com/sortable/)
             */
            $(".draggable").sortable({
                handle: ".handle"
            });

            window.addEventListener('admin-approved', event => {
                Swal.fire({
                    icon: 'success',
                    title: `Set as Admin Successfully!`,
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

            $(document).on('change', '#badge-select', function() {
                let parentId = $(this).closest("div").attr("id");
                let param2 = $(this).val();

                window.Livewire.emit('badgePrompt', parentId, param2);
            });

            window.addEventListener('badge-confirm', event => {
                Swal.fire({
                title: 'Are you sure?',
                text: "This will be display a badge on his account.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'blue',
                cancelButtonColor: 'red',
                confirmButtonText: 'Yes, Confirm!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        livewire.emit('addBadge')

                        Swal.fire({
                            icon: 'success',
                            title: `Added Successfully`,
                            iconColor: 'white',
                            background: `green`,
                            position: `top-right`,
                            timer: 3000,
                            showConfirmButton: false,
                            toast: true,
                            customClass: {
                                title: 'text-white',
                            },

                        });
                    }
                    else
                    {
                        window.Livewire.emit('$refresh');
                    }
                });
            });
        });
    </script>
@endsection

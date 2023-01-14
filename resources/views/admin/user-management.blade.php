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
	});
</script>
@endsection

@extends('layout.admin')

@section('title', 'User Management')

@section('body')
<div class="overflow-x-auto pt-5">
	<table class="table my-2 border-0 w-100 position-relative mt-5">
		<thead>
			<tr class="card-body my-2 py-2 shadow-sm fw-bold">
				<th class="text-orange border-0" colspan="8">Users</th>
			</tr>

			<tr class="card-body my-2 py-2 shadow-sm text-center">
				<th class="border-0">Count</th>
				<th class="border-0">ID</th>
				<th class="border-0">Full Name</th>
				<th class="border-0">Upvotes</th>
				<th class="border-0">Downvotes</th>
				<th class="border-0">Wais Badge</th>
				<th class="border-0">&nbsp;</th>
				<th class="border-0">&nbsp;</th>
			</tr>
		</thead>

		<tbody class="draggable">
			@php ($arr = rand(0, 10) > 0 ? range(1, rand(1, 50)) : [] )
			@forelse ($arr as $v)
			<tr class="card-body my-2 py-2 shadow-sm text-center">
				<td class="border-0 align-middle">{{ str_pad($v, 2, '0', STR_PAD_LEFT) }}</td>
				<td class="border-0 align-middle">{{ rand(100000, 999999) }}</td>
				<td class="border-0 align-middle">{{ fake()->firstName() }} {{ fake()->lastName() }}</td>
				<td class="border-0 align-middle">{{rand(1, 50)}}</td>
				<td class="border-0 align-middle">{{rand(1, 50)}}</td>
				<td class="border-0 align-middle">
					<div class="form-check form-switch d-flex px-0">
						<input class="form-check-input mx-auto bg-orange border-orange" type="checkbox" role="switch" id="flexSwitchCheckDefault" {{ rand(0, 5) > 1 ? 'checked' : '' }}>
					</div>
				</td>

				<td class="border-0 align-middle">
					<a href="javascript:console.log('Under development...');" class="btn btn-sm bg-light-orange text-orange px-3">Edit</a>
				</td>

				<td class="border-0 align-middle handle">
					<i class="fas fa-ellipsis-vertical cursor-grab"></i>
				</td>
			</tr>
			@empty
			<tr class="card-body my-2 py-2 shadow-sm">
				<td class="text-center border-0" colspan="8">Nothing to show~</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>
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
	});
</script>
@endsection

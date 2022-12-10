@extends('layout.admin')

@section('title', 'User Management')

@section('body')
<div class="overflow-x-auto pt-5">
	{{-- TABS --}}
	<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link btn btn-outline-orange border mx-1 px-3 py-1 active" id="pills-recipe-tab" data-bs-toggle="pill" data-bs-target="#pills-recipe" type="button" role="tab" aria-controls="pills-recipe" aria-selected="true">Recipes</button>
		</li>

		<li class="nav-item" role="presentation">
			<button class="nav-link btn btn-outline-orange border mx-1 px-3 py-1" id="pills-post-tab" data-bs-toggle="pill" data-bs-target="#pills-post" type="button" role="tab" aria-controls="pills-post" aria-selected="false">Post</button>
		</li>

		<li class="nav-item" role="presentation">
			<button class="nav-link btn btn-outline-orange border mx-1 px-3 py-1" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="false">All</button>
		</li>
	</ul>

	@php ($arr = rand(0, 10) > 0 ? range(1, rand(1, 50)) : [] )
	<table class="table my-2 border-0 w-100 position-relative">
		<thead>
			<tr class="card-body my-2 py-2 shadow-sm fw-bold">
				<th class="text-orange border-0" colspan="12">New Recipes<small class="ms-5 text-muted"><small>{{ count($arr) }} Total</small></small></th>
			</tr>

			<tr class="card-body my-2 py-2 shadow-sm text-center">
				<th class="border-0 align-middle">No</th>
				<th class="border-0 align-middle">Image</th>
				<th class="border-0 align-middle">Recipe Name</th>
				<th class="border-0 align-middle">User</th>
				<th class="border-0 align-middle">Status</th>
				<th class="border-0 align-middle">Tags</th>
				<th class="border-0 align-middle">Upvote Count</th>
				<th class="border-0 align-middle">Downvote Count</th>
				<th class="border-0 align-middle">Comments</th>
				<th class="border-0 align-middle" colspan="3">Actions</th>
			</tr>
		</thead>

		<tbody>
			@php ($recipe = [])
			@forelse ($arr as $v)
			@php($recipe[$v] = [])
			<tr class="card-body my-2 py-2 shadow-sm text-center">
				<td class="border-0 align-middle">{{ $recipe[$v]["no"] = str_pad($v, 2, '0', STR_PAD_LEFT) }}</td>
				<td class="border-0 align-middle"><img class="img-fluid" style="max-width: 2.5rem;" src="{{ $recipe[$v]["image"] = asset("assets/" . array("Admin Panel Post and Recipe Approval Asset.png", "burger.png", "burgers.png", "upvote and downvote button.png")[rand(0, 3)]) }}"></td>
				<td class="border-0 align-middle">{{ $recipe[$v]["recipe_Name"] = fake()->word() }}</td>
				<td class="border-0 align-middle">{{ $recipe[$v]["user"] = fake()->name() }}</td>
				<td class="border-0 align-middle">{{ $recipe[$v]["status"] = array('Draft', 'Declined', 'Posted', 'Flagged', 'Removed')[rand(0, 4)] }}</td>
				<td class="border-0 align-middle">{{ $recipe[$v]["tags"] = array('Breakfast', 'Brunch', 'Lunch', 'Snacks', 'Dinner')[rand(0, 4)] }}</td>
				<td class="border-0 align-middle">{{ $recipe[$v]["upvote_count"] = rand(0, 50) }} {{ Str::of('upvote')->plural($recipe[$v]["upvote_count"]) }}</td>
				<td class="border-0 align-middle">{{ $recipe[$v]["downvote_count"] = rand(0, 50) }} {{ Str::of('downvote')->plural($recipe[$v]["downvote_count"]) }}</td>
				<td class="border-0 align-middle">{{ $recipe[$v]["comments"] = (rand(0, 100)%4 == 0 ? rand(0, 5) : 0) }} {{ Str::of('comment')->plural($recipe[$v]["comments"]) }}</td>
				
				<td class="border-0 align-middle">
					<a href="javascript:console.log('Under development...');" class="btn btn-sm bg-light-orange text-orange px-3">Post</a>
				</td>
				
				<td class="border-0 align-middle">
					<a href="javascript:console.log('Under development...');" class="btn btn-sm bg-light-orange text-orange px-3">Approve</a>
				</td>

				<td class="border-0 align-middle">
					<a href="javascript:console.log('Under development...');" class="btn btn-sm bg-light-orange text-orange px-3">Email</a>
				</td>
			</tr>
			@empty
			<tr class="card-body my-2 py-2 shadow-sm">
				<td class="text-center border-0" colspan="13">Nothing to show~</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>
@endsection
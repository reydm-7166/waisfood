<div class="overflow-x-auto pt-5">
	{{-- TABS --}}

    <ul class="nav nav-pills mb-3 flex justify-content-between float-end" id="pills-tab" role="tablist">

        <div class="dropdown">
            <a class="dropdown-toggle me-3 btn btn-outline-orange border" href="#" id="pills-tab" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-filter"></i> Filter
            </a>

            <ul class="dropdown-menu me-3">
                <li>
                    <a class="dropdown-item cursor-pointer" wire:click="set_to_true">
                        Highest Votes
                    </a>
                </li>

            </ul>
            </div>
	</ul>


	<table class="table my-2 border-0 w-100 position-relative">
		<thead>
			<tr class="card-body my-2 py-2 shadow-sm fw-bold">
				<th class="text-orange border-0" colspan="12">New Recipe Posts<small class="ms-5 text-muted"><small>{{ count($recipe_post) }} Total</small></small></th>
			</tr>

			<tr class="card-body my-2 py-2 shadow-sm text-center">
				<th class="border-0 align-middle">No</th>
				<th class="border-0 align-middle">Image</th>
				<th class="border-0 align-middle">Recipe Name</th>
				<th class="border-0 align-middle">Author</th>
				<th class="border-0 align-middle">Status</th>
				<th class="border-0 align-middle">Tags</th>
				<th class="border-0 align-middle">Total Vote Count</th>
				<th class="border-0 align-middle">Comments</th>
				<th class="border-0 align-middle" colspan="3">Actions</th>
			</tr>
		</thead>

		<tbody>

            {{-- SORT MAGIC HAPPENS HERE --}}
            @if($highest_vote)
                @php
                    $recipe_post = $recipe_post->sortByDesc('upvote_count')
                @endphp
            @else
                @php
                    $recipe_post = $recipe_post->sortBy('upvote_count')
                @endphp
            @endif






			@forelse ($recipe_post as $recipe)

			<tr class="card-body my-2 py-2 shadow-sm text-center">
				<td class="border-0 align-middle">{{$recipe->id}}</td>
				<td class="border-0 align-middle">{{$recipe[0]}}</td>
				<td class="border-0 align-middle">{{$recipe->recipe_name}}</td>
				<td class="border-0 align-middle">{{$recipe->author_name}}</td>
				<td class="border-0 align-middle">Pending</td>
				<td class="border-0 align-middle">{{ucfirst($recipe->tag_name) }}</td>
				<td class="border-0 align-middle">{{$recipe->upvote_count}}</td>
				<td class="border-0 align-middle">{{$recipe->comment_count}}</td>

				<td class="border-0 align-middle">
					<a href="javascript:console.log('Under development...');" class="btn btn-sm bg-light-orange text-orange px-3 mx-1">Show Post</a>
					<a href="javascript:console.log('Under development...');" class="btn btn-sm bg-light-orange text-orange px-3 mx-1">Email</a>
					<a href="javascript:console.log('Under development...');" class="btn btn-sm bg-light-orange text-orange px-3 mx-1">Approve</a>
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

<div class="overflow-x-auto pt-5">
	{{-- TABS --}}
    <div wire:loading>
        <div>
            <div style="color: #ef9f64; z-index: 9999; left: 0; top: 0; opacity: 0.75" class="la-ball-newton-cradle la-3x d-flex justify-content-center align-items-center bg bg-dark position-fixed w-100 h-100" >
                <div></div>
                <div></div>
                <div></div>
                <div>Loading... </div>
            </div>
        </div>
    </div>


    <ul class="nav nav-pills mb-3 flex justify-content-between float-end" id="pills-tab" role="tablist">

        <div class="dropdown">
            <a class="dropdown-toggle me-3 btn btn-outline-orange border" href="#" id="pills-tab" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-filter"></i> Filter
            </a>

            <ul class="dropdown-menu me-3">
                <li>
                    <a class="dropdown-item cursor-pointer" wire:click="set_to_true">
                        @if ($highest_vote == true)
                            Lowest Votes <i class="fa-solid fa-arrow-up ms-2"></i>

                        @else
                            Highest Votes <i class="fa-solid fa-arrow-up ms-2"></i>
                        @endif

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
				<td class="border-0 align-middle">{{$recipe->recipe_name}}</td>
				<td class="border-0 align-middle">{{$recipe->author_name}}</td>
				<td class="border-0 align-middle text-center">
                    @if ($recipe->is_approved == 0)
                        <p class="my-auto rounded">Pending</p>
                    @elseif ($recipe->is_approved == 2)
                        <p class="my-auto bg-greater rounded">Reviewed</p>
                    @elseif ($recipe->is_approved == 3)
                        <p class="my-auto bg-primary rounded">Mailed <i class="ms-2 fa-regular fa-circle-check"></i></p>
                    @endif
                </td>
				<td class="border-0 align-middle">{{ucfirst($recipe->tag_name) }}</td>
				<td class="border-0 align-middle
                    @if ($recipe->upvote_count > 0)
                        text-greater fw-bolder
                    @elseif ($recipe->upvote_count < 0)
                        text-danger fw-bolder
                    @endif
                ">{{$recipe->upvote_count}}
                    @if ($recipe->upvote_count > 0)
                        <i class="ms-2 fa-regular fa-circle-check"></i>
                    @elseif ($recipe->upvote_count < 0)
                        <i class="ms-2 fa-solid fa-triangle-exclamation"></i>
                    @endif
                </td>
				<td class="border-0 align-middle">{{$recipe->comment_count}}</td>

				<td class="border-0 align-middle">
					<a href="{{route('recipe-post.view', ['recipe_post_name' => $recipe->recipe_name, 'id' => $recipe->id])}}" class="btn btn-sm bg-light-orange text-orange px-3 mx-1">Show</a>
					<a wire:click="email({{$recipe->id}}, '{{$recipe->author_email}}')" class="btn btn-sm btn-primary text-white px-3 mx-1
                        @if ($recipe->is_approved != 2)
                            disabled
                        @endif
                        ">Email</a>
					<a href="javascript:console.log('Under development...');" class="btn btn-sm btn-success text-white px-3 mx-1
                        @if ($recipe->is_approved < 3)
                            disabled
                        @endif
                        ">Approve</a>
					<a href="javascript:console.log('Under development...');" class="btn btn-sm btn-danger text-white px-3 mx-1"><i class="fa-solid fa-trash-can"></i></a>
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

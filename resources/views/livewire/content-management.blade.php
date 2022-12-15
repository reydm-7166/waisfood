<div>
    @php ($arr = rand(0, 10) > 0 ? range(1, rand(1, 50)) : [] )
    <table class="table my-2 border-0 w-100 position-relative">
			
        <thead>
            <tr>
                <td class="border-0 text-center font-and-color fw-bold">Index</td>
                <td class="border-0 text-center font-and-color fw-bold">Thumbnail</td>
                <td class="border-0 text-center font-and-color fw-bold">Name</td>
                <td class="border-0 text-center font-and-color fw-bold">Description</td>
                <td class="border-0 text-center font-and-color fw-bold">Tag</td>
                <td class="border-0 text-center font-and-color fw-bold">Avg Rating</td>
                <td class="border-0 text-center font-and-color fw-bold">Feedbacks</td>
                <td class="border-0 text-center font-and-color fw-bold">Publish</td>
                <td class="border-0 text-center font-and-color fw-bold">Actions</td>
            </tr>
        </thead>
        

        <tbody>
            @php ($recipe = [])
            @forelse ($arr as $v)
            @php($recipe[$v] = [])
            <tr class="card-body my-2 py-3 shadow-sm text-center show-active collapsed" data-bs-toggle="collapse" role="button" data-bs-target=".comment-{{ $v }}" aria-expanded="false" aria-controls="comment-{{ $v }}">
                <td class="border-0 align-middle" colwidth="10%">{{ $recipe[$v]["no"] = str_pad($v, 2, '0', STR_PAD_LEFT) }}</td>
                <td class="border-0 align-middle" colwidth="10%"><img class="img-fluid" style="max-width: 2.5rem;" src="{{ $recipe[$v]["image"] = asset("assets/" . array("Admin Panel Post and Recipe Approval Asset.png", "burger.png", "burgers.png", "upvote and downvote button.png")[rand(0, 3)]) }}"></td>
                <td class="border-0 align-middle">{{ $recipe[$v]["recipe_name"] = fake()->word() }}</td>
                <td class="border-0 align-middle">{{ $recipe[$v]["user"] = fake()->name() }}</td>
                <td class="border-0 align-middle">{{ $recipe[$v]["tags"] = array('Breakfast', 'Brunch', 'Lunch', 'Snacks', 'Dinner')[rand(0, 4)] }}</td>
                <td class="border-0 align-middle">{{ $recipe[$v]["upvote_count"] = rand(0, 50) }} {{ Str::of('upvote')->plural($recipe[$v]["upvote_count"]) }}</td>
                <td class="border-0 align-middle">{{ $recipe[$v]["comments"] = (rand(0, 100)%4 == 0 ? rand(0, 5) : 0) }} {{ Str::of('comment')->plural($recipe[$v]["comments"]) }}</td>
                <td class="border-0 align-middle">
                    <div class="form-check form-switch d-flex px-0">
                        <input class="form-check-input mx-auto bg-orange border-orange" type="checkbox" role="switch" id="flexSwitchCheckDefault" {{ rand(0, 5) > 1 ? 'checked' : '' }}>
                    </div>
                </td>
                

                <td class="border-0 align-middle border-primary">
                    <a href="javascript:console.log('Under development...');" class="btn btn-sm bg-light-orange text-orange px-3 mx-1">Review</a>
                    <a href="javascript:console.log('Under development...');" class="btn btn-sm bg-light-orange text-orange px-3 mx-1">Approve</a>
                    <a href="javascript:console.log('Under development...');" class="btn btn-sm bg-light-orange text-orange px-3 mx-1">Email</a>

            </tr>

            @empty
            <tr class="card-body my-2 py-2 shadow-sm">
                <td class="text-center border-0" colspan="13">Nothing to show~</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

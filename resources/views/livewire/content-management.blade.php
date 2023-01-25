<div>
    <ul class="nav nav-pills flex justify-content-between" id="pills-tab" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link btn btn-outline-orange border mx-1 px-3 py-1" id="pills-recipe-tab" data-bs-toggle="pill" data-bs-target="#pills-recipe" type="button" role="tab" aria-controls="pills-recipe" aria-selected="true">Recipes</button>
		</li>

        <form action="" class="float-end">
            <div class="dropdown">
                <a class="dropdown-toggle me-3 btn btn-outline-orange border" href="#" id="pills-tab" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-filter"></i> Filter
                </a>

                <ul class="dropdown-menu me-3">
                    <li>
                        <a class="dropdown-item cursor-pointer" wire:click="set_to_true">
                            Alphabetical (A-Z)
                                @if ($this->name_atoz == true)
                                    <i class='fa-solid fa-arrow-up text-primary ms-2'></i>
                                @elseif($this->name_atoz == false)
                                    <i class='fa-solid fa-arrow-down text-primary ms-2'></i>
                                @else
                                    wala
                                @endif
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item cursor-pointer" wire:click="set_to_default">
                            Default
                        </a>
                    </li>

                </ul>
              </div>
        </form>
	</ul>


    <div id="table_container">
        <table class="table border-0 w-100 position-relative">
            <thead>
                <tr>
                    <td class="border-0 text-center font-and-color fw-bold">Index</td>
                    <td class="border-0 text-center font-and-color fw-bold">Thumbnail</td>
                    <td class="border-0 text-center font-and-color fw-bold">Name</td>
                    <td class="border-0 text-center font-and-color fw-bold">Tag</td>
                    <td class="border-0 text-center font-and-color fw-bold">Avg Rating</td>
                    <td class="border-0 text-center font-and-color fw-bold">Total Reviews</td>
                    <td class="border-0 text-center font-and-color fw-bold">Publish</td>
                    <td class="border-0 text-center font-and-color fw-bold">Actions</td>
                </tr>
            </thead>

            <tbody>

                @forelse ($recipes as $recipe)
                    <tr class="card-body my-2 py-3 shadow-sm text-center show-active collapsed" role="button" wire:key="recipe-{{$recipe->id }}">
                        <td class="border-0 align-middle" colwidth="10%">{{$recipe->id}}</td>
                        <td class="border-0 align-middle" colwidth="10%"><img class="img-fluid" style="max-width: 2.5rem; max-height: 2.5rem; width: 2.5rem; height: 2.5rem;" src="{{ asset('img/recipe-images/' . $recipe->recipe_image) }}"></td>
                        <td class="border-0 align-middle">{{ucfirst($recipe->recipe_name)}}</td>
                        <td class="border-0 align-middle">{{ucfirst($recipe->tag_name)}}</td>
                        <td class="border-0 align-middle">{{ ($recipe->avg_rating == 0) ? 'N/A' : number_format($recipe->avg_rating, 2)}}</td>
                        <td class="border-0 align-middle">{{$recipe->feedback_count}}</td>
                        <td class="border-0 align-middle">
                            <div class="form-check form-switch d-flex px-0" wire:key="$recipecheck-{{ $recipe->id }}">
                                <input class="form-check-input mx-auto bg-orange border-orange" id="pubUnpub-{{ $recipe->id }}" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                                @if ($recipe->published)
                                    checked
                                @endif
                                wire:click="pubUnpubPrompt({{ $recipe->id }})"
                                >
                            </div>
                        </td>

                        <td class="border-0 align-middle border-primary">
                            <a href="javascript:console.log('Under development...');" class="btn btn-sm bg-light-orange text-orange px-3 mx-1">Edit</a>
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

    <input type="hidden" name="recipeid" id="recipeid" value="{{ $recipe_id }}">
    <div id="pagination" class="mt-5 text-center pe-5">
        {{ $recipes->links('custom-paginate.admin-paginate') }}
    </div>

    @section('livewire_script')
        <script>
            window.addEventListener('confirm-unpub', () => {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This will be unpublished!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: 'blue',
                    confirmButtonText: 'Yes, unpublished it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            callPublishedStatusLivewire();

                            Swal.fire({
                                icon: 'success',
                                title: `Unpublished Successfully`,
                                iconColor: 'white',
                                background: `red`,
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
                            checkboxState();
                        }
                });

            });

            window.addEventListener('confirm-pub', (e) => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This will be published!",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: 'green',
                    cancelButtonColor: 'red',
                    confirmButtonText: 'Yes, published it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            callPublishedStatusLivewire();

                            Swal.fire({
                                icon: 'success',
                                title: `Published Successfully`,
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

                        checkboxState();

                    }
                });
            });

            function callPublishedStatusLivewire()
            {
                window.livewire.emit('changePublishedStatus');
            }

            function checkboxState()
            {
                let rawId = $('#recipeid').val();
                let id = 'pubUnpub-' + rawId;

                let state = $('#' + id).is(':checked');
                if(state == true)
                {
                    $('#' + id).prop('checked', false);

                }
                else
                {
                    $('#' + id).prop('checked', true);
                }
            }
        </script>

    @endsection


</div>

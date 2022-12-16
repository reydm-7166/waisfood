<div>
    <ul class="nav nav-pills mb-3 flex justify-content-between" id="pills-tab" role="tablist">
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
                                @else
                                    <i class='fa-solid fa-arrow-down text-primary ms-2'></i>
                                @endif
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item cursor-pointer" wire:click="set_default">
                            Default
                        </a>
                    </li>
                </ul>
              </div>
        </form>
	</ul>

    

    <table class="table my-2 border-0 w-100 position-relative">
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
                <tr class="card-body my-2 py-3 shadow-sm text-center show-active collapsed" role="button">
                    <td class="border-0 align-middle" colwidth="10%">{{$recipe->id}}</td>
                    <td class="border-0 align-middle" colwidth="10%"><img class="img-fluid" style="max-width: 2.5rem;" src=""></td>
                    <td class="border-0 align-middle">{{ucfirst($recipe->recipe_name)}}</td>
                    <td class="border-0 align-middle">{{ucfirst($recipe->tag_name)}}</td>
                    <td class="border-0 align-middle">{{ ($recipe->avg_rating == 0) ? 'N/A' : number_format($recipe->avg_rating, 2)}}</td>
                    <td class="border-0 align-middle">{{$recipe->feedback_count}}</td>
                    <td class="border-0 align-middle">
                        <div class="form-check form-switch d-flex px-0">
                            <input class="form-check-input mx-auto bg-orange border-orange" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
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
    <div id="pagination" class="mt-5 text-center pe-5">
        {{ $recipes->links('custom-paginate.admin-paginate') }}
    </div>
</div>
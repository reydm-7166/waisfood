<div class="w-100" id="container">
    {{-- SEARCH --}}

    <section id="recipe_generator" class="w-100">
        <div id="title" class="d-block w-100 d-flex justify-content-center">
            <p class="font fw-bolder">RECIPE GENERATOR</p>
        </div>

        <div id="form" class="">
            <section class="d-flex justify-content-around">
                <select class="form-select form-select-lg form-control font" aria-label=".form-select-lg example">
                    <option selected>Browse</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <input type="text" wire:model="search" placeholder="Search" class="w-50 rounded ps-4 form-control font">

                <select class="form-select form-select-lg form-control font">
                    <option selected>Most Rated</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            
            </section>
        </div>

    </section>
    {{-- CATEGORIES --}}
    <section id="sort" class="w-100">
        <div id="title" class="d-block w-100 d-flex justify-content-center">
            <p class="font fw-bolder mt-2">CATEGORIES</p>
        </div>

        <div id="form_category" class="pt-2 mb-2">
            <form action="" method="get" id="sort_form" class="d-flex justify-content-center">
                <div class="text-center d-flex flex-column me-4">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle">
                    <p>Category 1</p>
                </div>
                <div class="text-center d-flex flex-column me-4">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle">
                    <p>Category 2</p>
                </div>
                <div class="text-center d-flex flex-column me-4">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle">
                    <p>Category 3</p>
                </div>
                <div class="text-center d-flex flex-column me-4">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle">
                    <p>Category 4</p>
                </div>
                <div class="text-center d-flex flex-column me-4">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle">
                    <p>Category 5</p>
                </div>
                <div class="text-center d-flex flex-column me-4">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle">
                    <p>Category 6</p>
                </div>
            </form>
        </div>
    </section>

    {{-- SEARCH GENERATOR --}}
    <section id="ingredients_list" class="w-100">
        <div id="title" class="d-block w-100 d-flex justify-content-center">
            <p class="font fw-bolder text-white">GENERATOR</p>
        </div>
        <div class="card w-25">
            <div class="card-body">
                <form action="{{ route('generator.form.submit') }}" class="form row" method="POST" enctype="multipart/form-data">
                    @csrf
        
                    {{-- ACTUAL FORM FIELDS --}}
                    <div class="col-12 mt-2" id="ingredientField">
                        {{-- RECIPES WITH THIS INGREDIENT(S) "OR" RECIPES WITH ONLY THIS INGREDIENT(S) --}}
                        <div class="d-flex">
                            <div class="btn-group-toggle mx-auto border" data-toggle="buttons">
                                <label class="btn btn-secondary active" for="use_and">
                                    <input type="checkbox" checked autocomplete="off" name="useAnd" id="use_and"> Find recipes with <b>ONLY</b> this ingredient(s)
                                </label>
                            </div>
                        </div>
        
                        <hr class="w-100">
        
                        {{-- INGREDIENT --}}
                        @php($index = 0)
                        @if (old('ingredients'))
                            {{-- If there are ingredients... --}}
                            {{-- ...iterate through other ingredients --}}
                            @foreach(old('ingredients') as $i)
                            <div class="col-12 form-group my-2" {{ $index == 0 ? 'id="origIngredientField"' : ''}}>
                                <label class="form-label" for="ingredients_{{ $index }}">Ingredient #{{ $index + 1 }}</label>
                                <input type="text" class="form-control" name="ingredients[]" id="ingredients_{{ $index }}" value="{{ old('ingredients.' . $index) }}">
                                <span class="text-danger">{{ $errors->first('ingredients.' . $index++) }}</span>
                            </div>
                            @endforeach
                        @else
                        {{-- Otherwise, just use the one liner --}}
                        <div class="col-12 form-group my-2" id="origIngredientField">
                            <label class="form-label" for="ingredients_0">Ingredient #1</label>
                            <input type="text" class="form-control" name="ingredients[]" id="ingredients_0" value="{{ old('ingredients.0') }}">
                            <span class="text-danger">{{ $errors->first('ingredients.' . $index++) }}</span>
                        </div>
                        @endif
                        {{-- Otherwise, just skip this part completely --}}
                    </div>
                    <span class="text-danger mb-2">{{ $errors->first('ingredients') }}</span>
        
                    {{-- SUBMIT FOR THE FORM --}}
                    <div class="col-12 d-flex flex-row my-2">
                        <button class="btn btn-primary mr-2" type="button" id="addIngredient" data-index="{{ $index }}" data-target="#ingredientField" data-to-clone="#origIngredientField">Add Ingredient</button>
                        <button class="btn btn-success mx-2" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </section>

    {{-- RESULTS LIST --}}


    <section id="recipe" class="mt-3">
        <div id="recipe_title" class="d-flex justify-content-center">
            <p class="font fw-bolder text-white mt-1">RECIPE</p>
        </div>
        {{-- {{dd($dish)}} --}}
        @if(!$message)
            <div id="recipe_list" class="d-flex justify-content-center flex-wrap">
                @foreach ($dish as $recipe)
                    <div id="recipe_item" class="m-2 d-flex flex-column text-center shadow" wire:key="recipe-{{$recipe->id}}">
                        {{-- {{dd($recipe->id)}} --}}
                        <div id="title_container" class="d-flex align-items-center justify-content-center">
                            <p class="text-break font" id="recipe_name">{{$recipe->recipe_name}}</p>
                        </div>
                        
                        <img src="{{asset('/img/adobo.jpg')}}" alt="" class="img-recipe">
                        <div id="count-star" class="mt-2 d-flex justify-content-between align-items-center">
                            <p class="text-break font" id="ingredient_count">{{$recipe->ingredient_count}} Ingredients</p>
                            @if(!is_null($recipe->average_rating))
                                <p class="stars font" id="averate_rating">{{round($recipe->average_rating, 1)}} Stars</p>
                            @else
                                <p class="stars font text-danger" id="averate_rating">{{$recipe->rating}} No Ratings Yet</p>
                            @endif
                        </div>
                        
                        <a id="recipe_id" href="{{route('recipe.show', ['recipe_name' => $recipe->recipe_name, 'id' => $recipe->id])}}" class="text-decoration-none btn btn-primary mt-2 text-white font">View</a></button>
                    </div>
                @endforeach
            </div>
            
            <div id="pagination" class="d-block d-flex justify-content-center pt-2 mt-5">
                {{ $dish->links() }}
            </div>
        @else
            <div id="no_result" class="d-flex justify-content-center flex-wrap">
                <h2 class="mt-5 font fs-1 text-danger">NO RESULTS FOUND</h2>
            </div>
        @endif
    </section>
    
</div>


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

        <div id="form_category" class="pt-2">
            <form action="" method="get" id="sort_form" class="d-flex justify-content-center">
                <div class="text-center d-flex flex-column me-4">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle">
                    <p>WEW</p>
                </div>
                <div class="text-center d-flex flex-column me-4">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle">
                </div>
                <div class="text-center d-flex flex-column me-4">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle">
                </div>
                <div class="text-center d-flex flex-column me-4">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle">
                </div>
                <div class="text-center d-flex flex-column me-4">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle">
                </div>
                <div class="text-center d-flex flex-column me-4">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle">
                </div>

            </form>
        </div>
    </section>

    {{-- SEARCH GENERATOR --}}
    {{-- <section id="ingredients_list" class="w-100">
        <div id="title" class="d-block w-100 d-flex justify-content-center">
            <p class="font fw-bolder text-white">INGREDIENTS</p>
        </div>

        <div id="list" class="d-flex justify-content-center"> --}}
            {{-- FORM TAG --}}
           
            {{-- <form id="form_container"  class=" w-100 d-inline-block d-flex justify-content-center mt-1 p-0 d-flex flex-wrap">  
                <div id="add_ingredients" class="d-flex flex-row ms-2 mb-2 fs-2">
                    <input type="text" name="add" id="add" class="border rounded-pill icon ps-3 font form-control" placeholder="Add Items..." size="5">
                    <button id="button_add" class="border me-5 bg bg-transparent"><i id="add_ingredient_form" class="fa-solid fa-plus fs-1 text-primary"></i></button>
                    <input type="submit" id="submit-form" class="hidden"/>
                </div>
            </form>
        </div>
        
        <div id="generate_button" class="d-block float-end me-4 mb-2">
            <button class="btn btn-primary"><label for="submit-form">Generate</label></button>
        </div>
    </section> --}}

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


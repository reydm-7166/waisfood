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

        <div id="form" class="pt-2">
            <form action="" method="get" class="d-flex justify-content-center">
                <div class="">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle border-0 me-5">
                </div>
                <div class="">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle border-0 me-5">
                </div>
                <div class="">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle border-0 me-5">
                </div>
                <div class="">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle border-0 me-5">
                </div>
                <div class="">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle border-0 me-5">
                </div>
                <div class="">
                    <img src="/img/adobo.jpg" alt="" id="category" class="border rounded-circle border-0 me-5">
                </div>

            </form>
        </div>
    </section>

    {{-- SEARCH GENERATOR --}}
    <section id="ingredients_list" class="w-100">
        <div id="title" class="d-block w-100 d-flex justify-content-center">
            <p class="font fw-bolder text-white">INGREDIENTS</p>
        </div>

        <div id="list" class="d-flex justify-content-center">
            {{-- FORM TAG --}}
           
            <form id="form_container"  class=" w-100 d-inline-block d-flex justify-content-center mt-1 p-0 d-flex flex-wrap">  
                <div id="add_ingredients" class="d-flex flex-row ms-2 mb-2 fs-2">
                    <input type="text" name="add" id="add" class="border rounded-pill icon ps-3 font form-control" placeholder="Add Items..." size="5">
                    <button id="button_add" class="border border-0 me-5 bg bg-transparent"><i id="add_ingredient_form" class="fa-solid fa-plus fs-1 text-primary"></i></button>
                    <input type="submit" id="submit-form" class="hidden"/>
                </div>
            </form>
        </div>
        
        <div id="generate_button" class="d-block float-end me-4 mb-2">
            <button class="btn btn-primary"><label for="submit-form">Generate</label></button>
        </div>
    </section>

    {{-- RESULTS LIST --}}


    <section id="recipe" class="mt-3">
        <div id="recipe_title" class="d-flex justify-content-center">
            <p class="font fw-bolder text-white mt-1">RECIPE</p>
        </div>
        @if(!$message)
            <div id="recipe_list" class="d-flex justify-content-center flex-wrap">
                @foreach ($dish as $recipe)
                    <div id="recipe_item" class="m-2 d-flex flex-column text-center" wire:key="recipe-{{$recipe->id}}">
                        <img src="{{asset('/img/adobo.jpg')}}" alt="" class="img-recipe">
                        <p class="text-break font mt-2 fw-bold" id="ingredient_count">{{$recipe->ingredient_count}} Ingredients</p>
                        <p class="text-break font mt-2" id="recipe_name">{{$recipe->dish_name}}</p>
                        <button class="btn btn-primary mt-2 text-white font" aria-label="recipe_id"><a id="recipe_id" href="{{route('recipe.show', $recipe->dish_name)}}" class="text-decoration-none">View</a></button>
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


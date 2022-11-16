
<div class="">
    
    <div id="recipe_title" class="d-flex justify-content-center">
        <p class="font fw-bolder text-white mt-1">RECIPE</p>
    </div>

    <div id="recipe_list" class="d-flex justify-content-start flex-wrap">
        @foreach ($dish as $recipe)
            <div id="recipe_item" class="me-4 mt-2 p-2 d-flex flex-column text-center" :wire:key="$recipe->id">
                <img src="{{asset('img/profile_picture.jpg')}}" alt="">
                <p class="text-break font mt-2 fw-bold" id="ingredient_count">{{$recipe->ingredient_count}} Ingredients</p>
                <p class="text-break font" id="recipe_name">{{$recipe->dish_name}}</p>
                <button class="btn btn-primary text-white font">View</button>
            </div>
        @endforeach
    </div>
    
    <div id="pagination" class="d-block d-flex justify-content-center pt-2 mt-5">
        {{ $dish->links() }}
    </div>
</div>


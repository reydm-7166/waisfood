
<div class="fav-food w-[auto] flex flex-col justify-center items-center" wire:key="recipe-{{$recipe->id}}">
    <div class="p-[5px] pb-[10px] text-center min-h-100">
        <p class="food-title font-bold text-[15px]">{{$recipe->recipe_name}}</p>
    </div>
    
    <img class="w-[auto] mb-[5px]" src="\assets\login-image.png" alt="food">

    
    <div id="rate_ingredients" class="flex justify-between w-full">
        <p class="time text-[15px] text-[gray]">{{$recipe->ingredient_count}} Ingredients</p>
        @if(!is_null($recipe->average_rating))
            <p class="time text-[15px] text-[gray]">{{round($recipe->average_rating, 1)}} Stars</p>
        @else
            <p class="time text-[15px] text-[gray]">{{$recipe->rating}} No Ratings Yet</p>
        @endif
    </div>
    
    
    <button class="w-full h-9 px-6 text-white transition-colors mt-[10px] duration-150 bg-[#f6941c] rounded-lg focus:shadow-outline hover:bg-[#f6941c]-800 hover:shadow-2xl">
        <a id="recipe_id" href="{{route('recipe.show', ['recipe_name' => $recipe->recipe_name, 'id' => $recipe->id])}}">View</a>
    </button>
      

</div>
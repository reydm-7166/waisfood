<div class="main-sec-page main-sec-two h-[80vh] bg-[#F3F61C] relative flex flex-col text-center justify-center items-center">
    <div class="fav-title text-[20px] mb-[50px] font-bold">MOST FAVOURITED RECIPES</div>
    <div class="fav-menu text-center grid justify-center grid-cols-4 gap-4 w-[90%]">

        @foreach ($recipes as $recipe)
            <div class="fav-food w-[320px] h-[500px] flex flex-col justify-center items-center relative">

                <div class="mb-[15px] rounded w-[95.23%] h-[300px] absolute top-2">
                    <a href="{{route('recipe-post.view', ['recipe_post_name' => $recipe->recipe_name, 'id' => $recipe->id])}}"><img class=" rounded w-full h-full" src="{{ asset('img/recipe-images/' . $recipe->recipe_image) }}" alt="food"></a>
                </div>

                <div class="text-center absolute bottom-0 w-[100%] h-[170px] px-3 ">

                    <p class="food-title"><a class="text-blue-500 hover:underline hover:text-blue-600 font-medium py-2" href="{{route('recipe-post.view', ['recipe_post_name' => $recipe->recipe_name, 'id' => $recipe->id])}}">{{ ucfirst($recipe->recipe_name) }}</a></p>
                    <div class="flex justify-between w-[100%]">
                        <p class="time text-[15px] text-[gray]">{{ number_format($recipe->avg_rating, 2, '.', ',') }}<i class="fa-solid fa-star text-yellow-500 ml-2"></i></p>
                        <p class="time text-[15px] text-[gray]">By: {{ ucfirst($recipe->author_name) }}</p>
                    </div>

                    <div class="p-[20px]">
                        <p class="food-title line-clamp-3 break-words">{{ ucfirst($recipe->description) }}</p>
                    </div>
                </div>

            </div>
        @endforeach

    </div>

    </div>
</div>

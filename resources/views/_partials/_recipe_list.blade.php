@foreach ($dish as $recipe)
    <div id="recipe_item" class="me-4 mt-2 p-2 d-flex flex-column text-center ">
        <img src="{{asset('img/profile_picture.jpg')}}" alt="">
        <p class="text-break font mt-2 fw-bold" id="ingredient_count">{{$recipe->ingredient_count}} Ingredients</p>
        <p class="text-break font" id="recipe_name">{{$recipe->dish_name}}</p>
        <button class="btn btn-primary text-white font">View</button>
    </div>
@endforeach


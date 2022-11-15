@foreach ($dish as $recipe)
    <div id="recipe_item" class="border border-primary me-4 mt-2">
        <p>{{$recipe->dish_name}}</p>
        <p>{{$recipe->description}}</p>
        <p>{{$recipe->id}}</p>
    </div>

@endforeach

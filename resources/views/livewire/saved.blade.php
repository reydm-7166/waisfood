<div>
   

    @auth
        <select class="form-select w-25" aria-label="Default select example" wire:model="saved_type">
            <option value="posts">Post</option>
            <option value="recipes">Recipe</option>
        </select>
        saved list here <br>
       

        @if ($saved_type == "recipes")
            recipes
            @include('_partials.saved._saved_recipes')

        @else
            posts
            @include('_partials.saved._saved_posts')
        @endif
            
    @endauth

    
</div> 

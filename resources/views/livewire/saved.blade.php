<div>
   

    @auth
        <select class="form-select w-25" aria-label="Default select example" wire:model="saved_type">
            <option value="post">Post</option>
            <option value="recipe">Recipe</option>
        </select>
        saved list here

        @if ($profile == "posts")
            posts
            @include('_partials.saved._saved_posts')
        @else
            recipes
            @include('_partials.saved._saved_recipes')
        @endif
            
    @endauth

    
</div> 

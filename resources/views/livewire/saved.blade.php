<div>
   

    @auth
        <select class="form-select w-25" aria-label="Default select example" wire:model="saved_type">
            <option value="post">Post</option>
            <option value="recipe">Recipe</option>
        </select>
        saved list here
        @if (!empty($saved))
            @foreach ($saved as $save)
                <div id="saved_container" wire:key="{{$save->id}}">
                    @foreach ($save->saved_items as $saved_item)
                        {{$saved_item->post_title}}
                        {{$saved_item->post_content}}

                        {{$saved_item->recipe_name}}
                        {{$saved_item->description}}
                        {{$saved_item->author_name}}
                        {{$saved_item->author_id}}
                    @endforeach
                </div>
            @endforeach
        @endif
    @endauth

    
</div> 

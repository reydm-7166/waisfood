
@foreach ($saved as $save)
    <div id="saved_container" class="border border-primary" wire:key="{{$save->id}}">
        @foreach ($save->saved_recipes as $saved_item)
            {{$saved_item->recipe_name}}
            {{$saved_item->description}}
            {{$saved_item->author_name}}
            {{$saved_item->author_id}}
        @endforeach
    </div>
@endforeach
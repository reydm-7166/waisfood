
@foreach ($saved as $save)
    <div id="saved_container" class="border border-primary" wire:key="{{$save->id}}">
        {{$save->id}}<br>
        {{$save->post_title}}<br>
        {{$save->post_content}}<br>

        {{$save->upvote_counts}}<br>
    </div>
@endforeach
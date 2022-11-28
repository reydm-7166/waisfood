<div id="reviews_container" class=" w-100">
    <p class="mt-2 font" id="review_count">
        @if (!empty($reviews))
            {{count($reviews)}}  Reviews
        @else
            No Reviews Yet
        @endif
    </p>
    {{-- {{dd($reviews)}} --}}
    {{-- ITERATE through data na pinass mula doon sa feedbacks livewire controller --}}

    @foreach ($reviews as $review)
    <div id="review_details" class="mt-2" wire:key="review-{{$review->feedback_id}}">
        <img src="{{ asset('img')}}/{{ $review->profile_picture }}" alt="" class="border rounded-circle border-0 d-inline-block">
        <div id="review_content" class="d-inline-block align-top" wire:key="review-{{$review->feedback_id}}">
            @php
                for($i=1; $i <=5; $i++){
                    if ($review->rating >= $i){
                        echo '<i class="fa-solid fa-star text-warning fs-4"></i>';
                    }
                    else{
                        echo '<i class="fa-regular fa-star fs-4 fw-lighter"></i>';
                    }
                }
            @endphp
            
            <p id="review_name" class="mt-2 text-primary align-top font" wire:key="review-{{$review->feedback_id}}"><a href="{{route('profile.index', $review->id)}}">{{$review->first_name}} {{$review->last_name}}</a></p>
            <p id="review_comment" class="mt-2 ps-3" wire:key="review-{{$review->feedback_id}}">&emsp;&emsp;{{$review->review}}
            @if($review->user_id == Auth::user()->id)
                <a id="edit" wire:click.prevent="edit({{$review->feedback_id}})"><i class="ms-2 fa-solid fa-pen-to-square text-primary"></i>[ Edit ]</a>
            @endif</p>
        </div>
    </div>
    @endforeach
</div>
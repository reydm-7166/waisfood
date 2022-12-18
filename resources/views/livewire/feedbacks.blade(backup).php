<div id="main_review_container" class="">
    <!-- {{-- REVIEWS CONTAINER ANDITO UNG MGA REVIEWS // ANDITO TO PARA EVERY NEW REVIEWS NA IADD MAILOLOAD AGAD SA LIVEWIRE --}} -->
    <div id="reviews_container" class=" w-100">
        <h2 class="mt-2 fs-2 font">
        @if (!empty($reviews))
            {{count($reviews)}}  Reviews
        @else
            No Reviews Yet
        @endif
        </h2>
        {{-- {{dd($reviews)}} --}}
        {{-- ITERATE through data na pinass mula doon sa feedbacks livewire controller --}}
        @foreach ($reviews as $review)
        <div id="review_details" class="mt-2" wire:key="review-{{$review->feedback_id}}">
            <img src="{{ asset('img')}}/{{ $review->profile_picture }}" alt="" class="border rounded-circle border-0 d-inline-block">
            <div id="review_content" class="d-inline-block align-top" wire:key="review-{{$review->id}}">
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
                
                <p id="review_name" class="mt-2 text-primary align-top font" wire:key="review-{{$review->id}}"><a href="{{route('profile.index', $review->id)}}">{{$review->first_name}} {{$review->last_name}}</a></p>
                <p id="review_comment" class="mt-2 ps-3 text-break" wire:key="review-{{$review->id}}">&emsp;&emsp;{{$review->review}}
                <div id="delete_edit" class="mt-3" wire:key="review-{{$review->id}}">
                    @auth
                        @if($review->user_id == Auth::user()->id)
                            <a id="edit" wire:click.prevent="delete({{$review->feedback_id}})" class="font float-end text-danger"><i class="ms-2 fa-solid fa-trash-can text-danger"></i>[ Delete Review ]</a>
                        
                            <a id="edit" wire:click.prevent="edit({{$review->feedback_id}})" data-bs-toggle="modal" data-bs-target="#updateStudentModal" class="font float-end text-primary"><i class="ms-2 fa-solid fa-pen-to-square text-primary"></i>[ Edit Review ]</a>

                        @endif
                    @endauth
                </div>
            </div>
        </div>
    @endforeach
    </div>


    <div id="add_review_container" class="pb-5 mt-1 mx-auto">
        <p class="font p-2" id="title" >Leave A Review</p>

        {{-- THIS IS FOR THE STAR RATING --}}

        <form wire:submit.prevent="submit" method="post">
            <div class="rating-css">
                <div class="star-icon">
                    <input type="radio" wire:model="rating" value="1" name="product_rating" id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" wire:model="rating" value="2" name="product_rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" wire:model="rating" value="3" name="product_rating" id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" wire:model="rating" value="4" name="product_rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" wire:model="rating" value="5" name="product_rating" checked id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                    
                    {{-- <input type="hidden" name="recipe_id" wire:model="recipe_id" value="{{$results[0]->id}}"> --}}
                    <p class="font text-dark d-inline-block ms-2" id="title">{{$rating}}/5 Rating</p>
                    
                </div>
            </div>
            {{-- THIS IF FOR THE REVIEW MESSAGE --}}
            <div id="review_message" class="">
                <label for="floatingTextarea" id="message_label" class="font fw-bold" id="title">Review</label>
                <textarea class="form-control font" placeholder="Leave a comment here" id="floatingTextarea" wire:model="review" id="title" oninput="this.style.height = ''; this.style.height = this.scrollHeight +'px'"></textarea>
                @error('review')<small class="text d-block text-danger font">{{ $message }}</small> @enderror
                
            </div>
        <input type="submit" class="btn btn-primary font px-3 py-2 float-end my-2 shadow" id="submit" value="Submit"></input>
        </form>
        
        @include('livewire.update_modal')
        
        @if (session()->has('flash_success'))
                <script type="text/javascript">
                    Swal.fire({
                        icon: 'success',
                        title: `Success`,
                        iconColor: 'white',
                        html: `<p class="text-white font mx-auto swal-text">Review Added Successfully!</p>`,
                        background: `#a5dc86`,
                        position: `top`,
                        showConfirmButton: false,
                        timer: 5000,
                        toast: true,
                        customClass: {
                            title: 'text-white',
                        },
                    });
                </script>
            @php
                (Session::forget("message"))
            @endphp
        @endif
        @if (session()->has('flash_error'))
                    <script type="text/javascript">
                        Swal.fire({
                        icon: 'error',
                        title: `Error`,
                        iconColor: 'white',
                        html: `<p class="text-white font mx-auto swal-text">You already have a review published. We suggest that you edit it!</p>`,
                        background: `#f27474`,
                        position: `top`,
                        timer: 5000,
                        showConfirmButton: false,
                        toast: true,
                        customClass: {
                            title: 'text-white',
                        },
                    });
                </script>
            @php
                (Session::forget("message"))
            @endphp
        @endif
    </div>
    
        
</div>
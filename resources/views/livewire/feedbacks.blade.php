<div class="mt-[60px] com-sec">
    <p class="text-[30px] mb-[20px]">
        @if (!empty($reviews))
            {{count($reviews)}}  Reviews
        @else
            No Reviews Yet
        @endif
    </p>
    <!-- actual comments -->
    @foreach ($reviews as $review)
        <div class="flex mb-[30px] border border-green-500" wire:key="review-{{$review->feedback_id}}">
            <div class="mr-[30px]" wire:key="review-{{$review->id}}">
                <div class="com-prof w-[120px] h-[120px] bg-[#2e2f31] rounded-[50%]"></div>
            </div>
            <div>
                <div class="text-[14px]">
                    <p class="name font-bold mb-[20px]">{{$review->first_name}} {{$review->last_name}}</p>
                    <p>{{$review->review}}</p>
                    <p>
                        @php
                            for($i=1; $i <=5; $i++){
                                if ($review->rating >= $i){
                                    echo '<i class="fa-solid fa-star text-yellow-400 fs-4"></i>';
                                }
                                else{
                                    echo '<i class="fa-regular fa-star fs-4 fw-lighter"></i>';
                                }
                            }
                        @endphp</p>
                </div>
                <div class="mt-[20px] text-right">
                    @auth
                        @if($review->user_id == Auth::user()->id)
                            <a id="edit" wire:click.prevent="delete({{$review->feedback_id}})" class="font float-end text-danger"><i class="ms-2 fa-solid fa-trash-can text-danger"></i>[ Delete Review ]</a>
                        
                            <a id="edit" wire:click.prevent="edit({{$review->feedback_id}})" data-bs-toggle="modal" data-bs-target="#updateReviewModal" class="font float-end text-primary"><i class="ms-2 fa-solid fa-pen-to-square text-primary"></i>[ Edit Review ]</a>

                        @endif
                    @endauth
                </div>
            </div>
        </div>
    @endforeach

    <!-- comment-form -->
    <div class="com-form mt-[30px] flex justify-center mb-[40px] w-[65%]  m-[auto]">
        <div class="w-[100%] text-center">
            <p class="text-[30px] text-left">Leave a Review</p>

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
                        

                        <p class="inline-block m-2 text-black text-xl" id="title">{{$rating}}/5 Rating</p>
                    </div>
                </div>
                {{-- THIS IF FOR THE REVIEW MESSAGE --}}
                    
                <div>
                    <textarea class="bg-[#F7F6F3] p-[12px] w-[100%]" name="" wire:model="review" id="" cols="48" rows="8" placeholder="Write Message"></textarea>
                    @error('review')<small class="text d-block text-danger font">{{ $message }}</small> @enderror
                </div>
                <div class="mt-[20px] text-left">
                    <input type="submit" class="bg-[#f6941c] text-[white] rounded p-[12px]" value="Submit Review">
                </div>
            </form>

            @include('livewire.update_modal')

        </div>
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
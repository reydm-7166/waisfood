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
        <div id="review_message" class="form-floating">
            <textarea class="form-control font" placeholder="Leave a comment here" id="floatingTextarea" wire:model="review" id="title"></textarea>
            @error('review')
                <small class="form-text d-block text-danger font" id="title">{{$errors->first('review')}}</small>
            @enderror
            <label for="floatingTextarea" id="message_label" class="font fw-bold" id="title">Message</label>
        </div>
    <input type="submit" class="btn btn-primary font px-3 py-2 float-end my-2 shadow" id="submit" value="Submit"></input>
    </form>

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
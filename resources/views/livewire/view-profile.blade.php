<div>
    <select class="form-select w-25" aria-label="Default select example" wire:model="profile">
        <option value="posts">Post</option>
        <option value="reviews">Reviews</option>
        
       
    </select>
    {{-- {{dd($contents)}} --}}
    @if ($profile == "posts")
        posts
        @include('_partials.profile._profile_posts')
    @else
        reviews
        @include('_partials.profile._profile_reviews')
    @endif
    
</div>

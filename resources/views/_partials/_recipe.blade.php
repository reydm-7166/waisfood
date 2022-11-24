<div id="recipe_container" class="h-100 container-fluid mt-3">

    <div id="recipe_name" class="w-100 p-3 mb-2 mt-2 text-center d-block">
        <h1 class="font fw-bolder font-and-color">{{$result[0]->recipe_name}}</h1>
    </div>
    
    <div id="recipe_details_container" class="mb-3">
        <img src="{{asset('img/adobo.jpg')}}" alt="">

        <div id="recipe_details" class="ps-2 pe-2">
            <p id="posted_by" class="d-inline-block p-1 border border-0 mt-2 fs-6 rounded font text-muted">Authored by: {{ucfirst($result[0]->author_name)}}</p>
           
                <p id="comment_count" class="d-inline-block text-primary fst-italic fw-bold p-1 fs-6"> 
                    @if (!empty($reviews))
                        {{count($reviews)}} 
                    @else
                        No
                    @endif
                    Reviews</p><br>
           
            
            <h2 class="d-inline-block mt-2 fs-3 fw-bolder font-and-color text-dark">{{$result[0]->recipe_name}}</h2>
            <h2 id="rating" class="d-inline-block mt-2 float-end pt-2 fs-6 font">
                @if (!empty($reviews))
                    @php
                        $average = 0;
                    @endphp
                    @foreach ($reviews as $review)
                        @php
                            $average += $review->rating;
                        @endphp
                    @endforeach
                    Ratings:  ({{round($average / count($reviews), 2)}}<i class="fa-solid fa-star font-and-color"></i>)
                @else
                    No Ratings Yet
                @endif
                
            </h2><br>
            
            <p class="d-inline-block mt-3 fw-bold">Ingredients:</p>

            @foreach ($result as $list)
                @if ($list->ingredients)
                    <p class="d-inline-block fst-italic">{{$list->measurement}} of <a class="text-primary text-decoration-underline">{{$list->ingredients}}</a> |</p>
                @else
                    <p class="d-inline-block fst-italic text-danger">NO INGREDIENTS LISTED YET</p>
                @endif
            @endforeach
            <p class="d-block mt-3 fw-bold mb-3">Directions:</p>

            @if (!empty($directions[0]))
                @foreach ($directions as $direction)
                    <p id="directions_details" class="mt-1">Step {{$direction->direction_number}}:    {{$direction->direction}}</p>
                @endforeach
            @else
                <p class="d-inline-block fst-italic text-danger">NO DIRECTIONS LISTED YET</p>
            @endif
       
           
            
        </div>
        <p id="tags" class="mt-2"><b>Tags:</b> (iuupdate pa tong section na to)</p>
    </div>

    <div id="add_recipe" class="float-end ">
        <p>NO</p>
        <p>MORE</p>
        <p>FOOD</p>
        <p>WASTE.</p>

        <div id="add_recipe_bottom" class="">
            <p class="">You have your own recipe you want to share with our community?</p>
            <button class="btn btn-transparent text-light border border-light rounded-2 m-3 ms-5 mt-5 font">Submit Recipe</button>
        </div>
    </div>

    <div id="reviews_container" class=" w-100">
        <h2 class="mt-2 fs-2 font">
        @if (!empty($reviews))
            {{count($reviews)}}  Reviews
        @else
            No Reviews Yet
        @endif
        </h2>

        @foreach ($reviews as $review)
            <div id="review_details" class="mt-4">
                <img src="{{ asset('img')}}/{{ $review->profile_picture }}" alt="" class="border rounded-circle border-0 d-inline-block">
                <div id="review_content" class="d-inline-block align-top mb-4">
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
                        
                    
                    <p id="review_name" class="d-block mt-2 text-primary align-top font fs-5"><a href="{{route('profile.index', $review->id)}}">{{$review->first_name}} {{$review->last_name}}</a></p>
                    <p id="review_comment" class="mt-2 mb-5 ps-3">&emsp;&emsp;{{$review->review}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
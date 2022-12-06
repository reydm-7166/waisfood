<div id="recipe_container" class="h-100 container-fluid mt-3">

    <div id="recipe_name" class="w-100 p-3 mb-2 mt-2 text-center d-block">
        <h1 class="font fw-bolder font-and-color">{{$results[0]->recipe_name}}</h1>
    </div>

    <div id="recipe_details_container" class="mb-3">
        
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($image_file as $image_files)
                    @if ($loop->index == 0)
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$loop->index}}" class="active" aria-current="true" aria-label="Slide {{$loop->index + 1}}"></button>
                    @else
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$loop->index}}" aria-label="Slide {{$loop->index + 1}}"></button>
                    @endif
                    
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($image_file as $image_files)
                    <div class="carousel-item 
                        @if ($loop->index == 0)
                            {{"active"}}
                        @endif" data-bs-interval="10000">
                        <img src="{{ asset('img/recipe-images/' . $image_files->recipe_image) }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>



        <div id="recipe_details" class="ps-2 pe-2 mb-4">
            <p id="posted_by" class="d-inline-block p-1 mt-2 fs-6 rounded font text-muted">Posted by: {{ucfirst($results[0]->author_name)}}</p>
           
                <p id="comment_count" class="d-inline-block text-primary fw-bold p-1 fs-6"><a href="#review_details">
                    @if (!empty($reviews))
                        {{count($reviews)}} 
                    @else
                        No
                    @endif
                    Comments<a/>
                </p><br>
           
            
            <h2 class="d-inline-block mt-2 fs-3 fw-bolder font-and-color text-dark">{{$results[0]->recipe_name}}</h2>
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

            @foreach ($results as $list)
                @if ($list->ingredient)
                    <p class="d-inline-block text-[14px]">{{$list->measurement}} of <a class="text-primary text-decoration-underline">{{$list->ingredient}}</a> |</p>
                @else
                    <p class="d-inline-block fst-italic text-danger">NO INGREDIENTS LISTED YET</p>
                @endif
            @endforeach
            <p class="d-block mt-3 fw-bold mb-3">Directions:</p>

            @if (!empty($directions[0]))
                @foreach ($directions as $direction)
                    <p id="directions_details" class="mt-1 ps-5 leading-[25px]">Step {{$direction->direction_number}}:    {{$direction->direction}}</p>
                @endforeach
            @else
                <p class="d-inline-block fst-italic text-danger leading-[25px]">NO DIRECTIONS LISTED YET</p>
            @endif
       
           
            
        </div>
        <div id="tags" class=""><p class="d-inline-block p-1 fw-bold font">Tags:</p>
            @foreach ($tags as $tag)
                <p id="elements" class="d-inline-block bg bg-info rounded shadow p-1 font me-2">{{$tag->tag_name}}</p>
            @endforeach
        </div>
    </div>

    <div id="add_recipe" class="float-end ">
        <p>NO</p>
        <p>MORE</p>
        <p>FOOD</p>
        <p>WASTE.</p>

        <div id="add_recipe_bottom" class="">
            <p class="">You have your own recipe you want to share with our community?</p>
            <p id="submit" class="btn btn-transparent text-light rounded-2 m-3 mt-5 font">Submit Recipe</p>
        </div>
    </div>

   
        
        {{-- REVIEWS CONTAINER --}}
        
        
        
        {{-- THIS IS FOR THE ADD RVIEW CONTAINER --}}

        @auth
            @livewire('comments', ['recipe_id' => $results[0]->recipe_id])
        @endauth

        @guest
            <h1 class="m-8">LOG IN TO ADD COMMENT</h1>
        @endguest
        
    </div>
</div>
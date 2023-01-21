<div class="generator-two">
    <div class="recipe-two-nav">@livewire('reusable.navbar')</div>
    <div class="gen-two-con w-[66%] m-[auto] mt-[20px]">

        <div><p class="text-[30px] text-center mb-[50px] text-[#f6941c]">{{$results[0]->recipe_name}}</p></div>
        <input type="hidden" name="recipe_id" id="recipe_id" value="{{$results[0]->recipe_id}}">
        <!-- GENERATED -->
        <div class="generated flex">
            @auth
                @if (Auth::user()->role_as == 1)
                    <div id="viewingAs" class="bg-blue-500 absolute top-40 right-5 w-64 h-36 pt-2 text-center align-middle rounded-md">
                        <a href="{{ route('admin.recipe-appoval') }}" class="text-white float-left ml-2"><i class="fa-solid fa-backward-step mr-2"></i>Go Back</a><br>
                        <p class="opacity-100 text-white mt-4"><i class="fa-solid fa-eye"></i> Viewing As Admin </p>
                        <button class="bg-green-500 hover:shadow-lg mt-2 text-white font-bold py-2 px-4 rounded-full" id="confirm_done">
                            <a href="{{route('admin.confirm_done')}}" class="hover:text-white">
                                Done
                            </a>
                        </button>
                    </div>
                @endif
            @endauth

            <div class="gen-con flex-1 mr-[5px] h-[auto] relative ">
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
                                @endif" data-bs-interval="5000">
                                <img src="{{ asset('img/recipe-images/' . $image_files->recipe_image) }}" id="image_carousel" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev z-50" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next z-50" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="mt-[30px] max-h-[600px] overflow-y-scroll">
                    <div class="flex mb-[13px]">
                        <div class="admin mr-[10px] text-[12px]">Posted by: <p class="italic inline-block"><a href="">{{$results[0]->author_name}}</a></p></div>
                    </div>
                    <div class="flex justify-between items-center gen-head">
                        <div class="">
                            <p class="text-[36px] mb-[20px] inline-block">{{$results[0]->recipe_name}}</p>

                            @livewire('save-unsave', ['recipe_id' => $results[0]->recipe_id])
                        </div>

                        @livewire('vote-count', ['recipe_id' => $results[0]->recipe_id])

                    </div>

                    <div class="text-[14px]">
                        <p class="d-inline-block mt-3 fw-bold mb-[20px]">Ingredients:</p>
                        @foreach ($results as $list)
                            @if ($list->ingredient)
                                <p class="d-inline-block text-[14px]">{{$list->measurement}} of <a class="text-primary text-decoration-underline">{{$list->ingredient}}</a> |</p>
                            @else
                                <p class="d-inline-block fst-italic text-danger">NO INGREDIENTS LISTED YET</p>
                            @endif
                        @endforeach
                        <div class="leading-[25px]">
                            <p class="fw-bold">Directions:</p>
                            @if (!empty($directions[0]))
                                @foreach ($directions as $direction)
                                    <p id="directions_details" class="mt-1 ps-5 leading-[25px]">Step {{$direction->direction_number}}:    {{$direction->direction}}</p>
                                @endforeach
                            @else
                                <p class="d-inline-block fst-italic text-danger leading-[25px]">NO DIRECTIONS LISTED YET</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- absolute pagination -->
                <div class="pagination flex justify-between items-center absolute w-[100%] bottom-0 mt-[100px]">
                    <div class="ml-[10px] tag">Tags:
                        @foreach ($tags as $tag)
                            <p id="elements" class="d-inline-block bg bg-info rounded shadow p-1 font me-2">{{$tag->tag_name}}</p>
                        @endforeach
                    </div>

                </div>
            </div>
            <div class="com-ad w-[30%]">
                <img src="\assets\Community Ad.png" alt="ads">
            </div>
        </div>
        <!-- COM SEC -->
        @auth
            @livewire('comments', ['recipe_id' => $results[0]->recipe_id])
        @endauth

        @guest
            <h1 class="m-8">LOG IN TO ADD COMMENT</h1>
        @endguest
    </div>
</div>


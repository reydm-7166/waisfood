<div class="gen-two-con w-[66%] m-[auto] mt-[20px]">
    <div><p class="text-[30px] text-center mb-[50px] text-[#f6941c] font-bold">{{$results[0]->recipe_name}}</p></div>
    <!-- GENERATED -->
    <div class="generated flex">
        <div class="gen-con flex-1 mr-[5px] h-[auto] relative">
            <img class="w-[100%]" src="{{ asset('img/recipe-images/' . $image_file) }}" alt="food">
            <div class="mt-[30px] max-h-[600px] overflow-y-scroll">
                <div class="flex mb-[13px]">
                    <div class="admin mr-[10px] text-[12px]"><i class="fa-regular fa-user text-[#6FB43F] mr-[5px]"></i> Authored by: <b>{{ucfirst($results[0]->author_name)}}</b></div>
                    <div class="comments text-[12px]"><i class="fa-regular fa-comment text-[#6FB43F] mr-[5px]"></i>
                        @if (!empty($reviews))
                            {{count($reviews)}} 
                        @else
                            No
                        @endif
                            Reviews
                    </div>
                </div>
                <div class="flex justify-between items-center gen-head"> 
                    <div><p class="text-[36px] mb-[20px]">{{$results[0]->recipe_name}}</p></div>
                    <div class="mr-[20px] flex items-center  gap-3 font-bold">
                        <div class="flex gap-3 items-center text-[#f6941c]">
                            @if (!empty($reviews))
                            @php
                                $average = 0;
                            @endphp
                            @foreach ($reviews as $review)
                                @php
                                    $average += $review->rating;
                                @endphp
                            @endforeach
                            Ratings: ({{round($average / count($reviews), 2)}}<i class="fa-solid fa-star font-and-color"></i>)
                        @else
                            No Ratings Yet
                        @endif
                        </div>
                    </div>
                </div>
                <div class="text-[14px]"> 
                    <p class="mb-[20px]">INGREDIENTS:  
                        @foreach ($results as $list)
                            @if ($list->ingredient)
                               {{$list->measurement}} of <b>{{$list->ingredient}}</b> |
                            @else
                                <p class="d-inline-block fst-italic text-danger">NO INGREDIENTS LISTED YET</p>
                            @endif
                        @endforeach
                    </p> 
                    <div class="leading-[25px]">
                        <p>Directions</p>
                        @if (!empty($directions[0]))
                            @foreach ($directions as $direction)
                                <p>{{$direction->direction_number}}: {{$direction->direction}}</p>
                            @endforeach
                        @else
                            <p>NO DIRECTIONS LISTED YET</p>
                        @endif
                    </div>
                </div>
            </div>
            <!-- absolute pagination -->
            <div class="pagination flex justify-between items-center absolute w-[100%] bottom-0 mt-[100px]">
                <div class="ml-[10px] tag">
                    @foreach ($tags as $tag)
                        Tags: <p id="elements" class="inline-block bg-[#0dcaf0] border rounded border-0 shadow p-1 font me-2">{{$tag->tag_name}}</p>
                    @endforeach

                </div>

            </div>
        </div>
        <div class="com-ad w-[30%] ">
            <img src="\assets\Community Ad.png" alt="ads">
        </div>
    </div>
    <!-- COM SEC -->
    @livewire('feedbacks', ['recipe_id' => $results[0]->recipe_id])
</div>
</div>
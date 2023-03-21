@if (!empty($recipe_posts))
    @foreach ($recipe_post as $recipe)

        <div class="mb-[30px]" id="recipe-container" wire:key="status-{{$recipe->id}}">
        <div class="">
                <img class="w-[100%]" src="\assets\login-image.png" alt="readmore image">
        </div>
            <div class="p-[30px]">
                <div class="text-right mb-[20px] mt-[10px]">
                    <p class="text-[15px]">{{date('M d, Y', strtotime($recipe->updated_at))}} /
                        <span class="font-bold
                        @if ($recipe->vote_count >= 0)
                            text-[#f6941c]
                        @else
                             text-red-600
                        @endif


                        ">Upvotes: {{$recipe->vote_count}} </span>

                        / Ingredients: {{$recipe->ingredient_count}}</span> /
                        <i class="fa-regular fa-comment-dots text-[#f6941c] hover:cursor-pointer hover:underline hover:text-blue-600"></i>
                        <span>{{$recipe->comment_count}}</span>
                    </p>
                </div>
                <div>
                    <h1 class="font-bold text-[25px] mb-[20px]">{{ucfirst($recipe->recipe_name)}}</h1>
                    <p class="text-[gray] mb-[20px] break-all line-clamp-3">{{$recipe->description}}</p>
                    <button class="text-[white] p-[10px] pl-[30px] pr-[30px] bg-[#2e2f31] mt-[20px] mb-[10px]">
                        <a href="{{route('recipe-post.view', ['recipe_post_name' => $recipe->recipe_name, 'id' => $recipe->id])}}">
                            READ MORE
                        </a>
                    </button>
                </div>
            </div>
        </div>
    @endforeach
@endif

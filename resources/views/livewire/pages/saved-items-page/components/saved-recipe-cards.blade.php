@foreach ($recipe as $recipe_detail)
    @foreach($recipe_detail->recipe_detail as $recipe)
        <div class="m-[5px] rounded-[20px] p-[15px] saved_recipes">
            <div class="flex flex-col h-[600px] w-[100%]">
                <div class="relative bg-[#2e2f31] h-[60%]">
                    <div class="time bg-[#f6941c] absolute bottom-0 right-11 p-[8px] pl-[15px] pr-[15px]">
                        <p>{{date('M d, Y', strtotime($recipe->updated_at));}}</p>
                    </div>
                </div>
                <div class="h-[40%] categ-details flex flex-col ml-[30px] justify-center pl-[30px] pr-[40px]">     
                        <div class="flex mb-[13px]">
                            <div class="admin mr-[10px] text-[13px] hover:cursor-pointer hover:underline hover:text-blue-600"><i class="fa-regular fa-user text-[#6FB43F] mr-[3px]"></i> {{ucfirst($recipe->author_name)}}</div>
                            <div class="comments text-[13px] mr-[5px] hover:cursor-pointer hover:underline hover:text-blue-600"><i class="fa-regular text-[#6FB43F] fa-comment-dots mr-[3px]"></i> {{$recipe_detail->recipe_comment}}</div> 

                            <div class="comments text-[13px] hover:cursor-pointer hover:underline hover:text-blue-600"> 
                                @if ($recipe->is_approved == 0)
                                    | Not Published
                                @else
                                    | Published
                                @endif
                            </div>

                        </div>
                        <div>
                            @if ($recipe->is_approved == 0)
                                    <p class="leading-[30px] text-[20px] font-bold hover:text-[#f6941c] hover:cursor-pointer hover:underline"><a href="{{route('recipe-post.view', ['recipe_post_name' => $recipe->recipe_name, 'id' => $recipe->id])}}">{{ucfirst($recipe->recipe_name)}}</a></p>
                                @else
                                    <p class="leading-[30px] text-[20px] font-bold hover:text-[#f6941c] hover:cursor-pointer hover:underline"><a href="{{route('recipe.show', ['recipe_name' => $recipe->recipe_name, 'id' => $recipe->id])}}">{{ucfirst($recipe->recipe_name)}}</a></p>
                                @endif

                            
                            
                        </div>
                        <div>
                            <p class="text-[gray] text-[12px] mt-[20px] line-clamp-3">{{ucfirst($recipe->description)}}</p>
                        </div>
                </div>
            </div>  
        </div>
    @endforeach
@endforeach
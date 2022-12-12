<div class="w-[100%] border-[1px] border-solid border-gray-300 text-center flex flex-col items-center pb-[30px]">
   <div class="mb-[40px] mt-[50px] p-[30px] w-[150px] h-[150px] relative">
        <img class="absolute top-0 left-0 rounded-[50%] w-[auto] bg-[gray]"  src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="profile pic">
   </div>

    <div class="p-[20px]">
        <p class="font-bold tetx-[30px]">{{Auth::user()->first_name . " " . Auth::user()->last_name}}</p>
        <p class="text-[#f6941c] mb-[20px] mt-[10px]">Home Cook</p>
        <p class="leading-[26px] text-[gray] text- mb-[20px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, perspiciatis!</p>
    </div>
    <div class="w-[100%] p-[20px]">
        <div class="flex justify-around mb-[20px] mt-[20px]">
            <div class="flex flex-col"><p>Upvotes Received</p><span class="text-[#f6941c]">{{$total_votes}}</span></div>
            <div><p>Reviews Published</p><span class="text-[#f6941c]">{{$reviews_made}}</span></div>
            
        </div>
        <div>
            <p>Recipes Published</p>
            <span class="text-[#f6941c]">
                @if ($recipe_published > 0)
                    {{$recipe_published}}
                @else
                    None
                @endif
            </span>
        </div>
        <div class="flex flex-col mt-[10px]"><p>Recipes Posted</p><span class="text-[#f6941c]">{{$recipe_count}}</span></div>
    </div>
    <div>
        <button class="bg-[#f6941c] rounded text-[15px] text-white flex pt-[15px] pb-[15px] pr-[25px] pl-[25px] justify-center items-center">
            <div class="mr-[10px] w-[20px] h-[20px] border-[2px] border-[white] border-solid rounded-[50%] flex items-center justify-center">
                <i class="fa-regular fa-user text-[12px]"></i> 
            </div>
            <div class="font-bold">Follow Me</div>
        </button>
    </div>
</div>

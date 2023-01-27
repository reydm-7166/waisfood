<div class="w-[100%] border-[1px] border-solid border-gray-300 text-center flex flex-col items-center pb-[30px]">
   <div class="mb-[40px] mt-[50px] w-[150px] h-[150px] text-center">
        <img class="rounded-[50%] mx-auto align-middle border-solid" src="{{ asset('assets/profile-images/' . Auth::user()->profile_picture) }}" id="pp" alt="profile pic">
        <div class="text-sky-400"><a href="" class="pb-1 border-b-2 border-blue-300"><i class="fa-regular fa-pen-to-square mr-1"></i> Edit</a></div>
   </div>

    <div class="p-[20px]">
        <p class="font-bold tetx-[30px]">{{Auth::user()->first_name . " " . Auth::user()->last_name}}</p>
        <p class="text-[#f6941c] mb-[20px] mt-[10px]"><i class="fa-solid fa-id-badge mr-[5px] hover:cursor-pointer"> </i>Home Cook</p>
        {{-- <p class="leading-[26px] text-[gray] text- mb-[20px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, perspiciatis!</p> --}}
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
    </div>
</div>

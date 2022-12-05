<div class="mb-[50px]">
    <div class="flex justify-between items-center pl-[20px] pr-[20px] pb-[10px] pt-[10px]">
        <div class="flex">
            <div class="w-[45px] h-[45px] bg-[gray] rounded-[50%]">
                <img class="w-[100%]" src="{{ asset('img/profile-images/' . $post->profile_picture) }}" alt="profile-pic">
            </div>
            <div class="ml-[18px]">
                <p>{{$post->first_name}} {{$post->last_name}}</p>
                <p class="text-[13px] text-[gray] font-bold">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
            </div>
        </div>
        <div class="font-bold text-[20px] text-[gray] tracking-[3px]">
            <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex items-center p-1 text-sm font-medium text-center rounded-lg hover:bg-gray-100 focus:ring-1 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button"> 
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
            </button>
            
            <!-- Dropdown menu -->
            <div id="dropdownDotsHorizontal" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-white-700 dark:divide-gray-600">
                <ul class="py-1 text-sm dark:text-dark-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                    <li>
                    <a href="#" class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-white-600 dark:hover:text-dark">Save</a>
                    </li>
                    <li>
                    <a href="#" class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-white-600 dark:hover:text-dark">Report</a>
                    </li>
                    <li>
                    <a href="#" class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-white-600 dark:hover:text-dark">Edit</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="">
         <img class="w-[100%]" src="\assets\login-image.png" alt="readmore image">
    </div>
     <div class="p-[30px] pt-[10px] w-[100%] ">
        <div>
            <p>{{$post->post_title}}</p>
            <p class="text-[gray] text-[13px]">Tags: </p>
        </div>
        <div class="mt-[15px]">
            <p class="truncate ...">{{$post->post_content}}</p>
        </div>
        <div class="w-[100%] mb-[10px] mt-[10px] border-t border-indigo-500">
            @if(!empty($post->comments_count))
                <p class="text-right text-[gray] font-bold italic">{{$post->comments_count}} Comments</p>
            @else
            <p class="text-right text-[gray]">No Comments yet</p>
            @endif
            
        </div>
        <form class="flex justify-between items-center gap-[10px]">
            <div class="w-[35px] h-[35px] bg-[gray] rounded-[50%]">
                <img class="w-[35px] h-[35px]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="profile-pic">
            </div>
           <div class="w-[90%]">
                <input class="p-[8px] rounded w-[100%] bg-[lightGray]" type="text" placeholder="Write comments...">
            </div>
        </form>
        <div class="text-right mt-[25px]">
            <button class="bg-[#f6941c] p-[10px] pr-[30px] pl-[30px] rounded-[15px]">Read More</button>
        </div>
     </div>

 </div>
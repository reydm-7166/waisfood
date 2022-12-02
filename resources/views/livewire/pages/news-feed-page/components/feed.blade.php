<div class="mb-[50px]">
    <div class="flex justify-between items-center  pl-[20px] pr-[20px] pb-[10px] pt-[10px]">
        <div class="flex">
            <div class="w-[45px] h-[45px] bg-[gray] rounded-[50%]">
                <img class="w-[100%]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="profile-pic">
            </div>
            <div class="ml-[18px]">
                <p><a href="">{{$post->first_name}} {{$post->last_name}}</a></p>
                <p class="text-[13px] text-[gray] mt-[-5px]">Yesterday at 16:30</p>
            </div>
        </div>
        <div class="font-bold text-[20px] text-[gray] tracking-[3px]">...</div>
    </div>
    <div class="">
         <img class="w-[100%]" src="\assets\login-image.png" alt="readmore image">
    </div>
     <div class="p-[30px] pt-[10px] w-[100%] ">
        <div>
            <p>{{$post->post_title}}</p>
            <p class="text-[gray] text-[13px]">Tags</p>
        </div>
        <div class="mt-[15px]">
            <p class="truncate ...">{{$post->post_content}}</p>
        </div>
        <div class="w-[100%] mb-[10px]">
            <p class="text-right text-[gray]">12 Comments</p>
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
 
<div class="nav w-[100%] pl-[35px] pr-[35px] pt-[10px] pb-[10px] flex items-center text-[#f6941c]">
   <div class="nav-logo bg-[transparent] flex-1">
        <img class="w-[120px] ml-[-20px]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="Wais logo"></div>
   <div class="nav-menu bg-[transparent] flex-1">
    <ul class="flex justify-around items-center">
        <li class="text-[20px]"><a href="{{route('index')}}">Home</a></li>
        <li class="text-[20px]"><a href="{{route('generator')}}">Generator</a></li>
        <li class="text-[20px]"><a href="">About Us</a></li>
        <li class="text-[20px]"><a href="{{route('post.index')}}">Community</a></li>
        <li class="nav-acc text-[25px] flex items-center justify-center">
            <div class="text-[#f6941c]">
                <i class="fa-regular fa-user"></i>
            </div>
            @auth
            <div class="nav-content z-10 cursor-pointer shadow">
                <ul class="text-[gray]">
                    <div class="p-[10px] pl-0 pr-0 bg-[white]"></div>
                    <div class="tri"></div>
                    <li class="text-[15px] p-[12px] mt-[14px] flex justify-between w-[100%]">
                        <a href="{{route('view.profile')}}">VIEW MY PROFILE</a> <i class="fa-regular fa-user"></i>
                    </li>
                    <li class="text-[15px] p-[12px] flex justify-between w-[100%]">
                        <a href="{{route('saved.items')}}">VIEW SAVED</a> <i class="fa-regular fa-bookmark"></i></i>
                    </li>
                    <li class="text-[15px] p-[12px] flex justify-between w-[100%]">
                        <a href="#">CREATE POST</a> <i class="fa-solid fa-plus"></i></i>
                    </li>
                    {{-- <li class="text-[15px] p-[12px] flex justify-between w-[100%]">
                        <a href="#">READ MORE</a> <i class="fa-regular fa-user"></i>
                    </li> --}}
                    <li class="text-[15px] p-[12px] flex justify-between w-[100%]">
                        <a href="{{route('logout')}}">SIGN OUT</a> <i class="fa-solid fa-right-from-bracket"></i></i>
                    </li>
                </ul>
            </div>
            @endauth

            @guest
            <div class="nav-content">
                <ul class="text-[gray]">
                    <div class="p-[10px] pl-0 pr-0 bg-[white]"></div>
                    <div class="tri"></div>
                    <li class="text-[15px] p-[12px] mt-[14px] flex justify-between w-[100%]">
                        <a href="{{route('login.index')}}">YOU MUST BE LOGGED IN</a> <i class="fa-regular fa-user"></i>
                    </li>
                </ul>
            </div>
            @endguest
        </li>
    </ul>
   </div>
</div>

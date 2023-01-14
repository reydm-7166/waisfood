<div class="main-page-con relative bg-[#f6941c]">
    <div class="main-nav absolute w-[100%] bg-[transparent] pl-[35px] pr-[35px] pt-[10px] pb-[10px] flex items-center">
        <div class="nav-logo bg-[transparent] flex-1">
            <img class="w-[120px] hide ml-[-20px]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="Wais logo"></div>
        <div class="nav-menu bg-[transparent] flex-1">
            <ul class="flex justify-around items-center">
                <li class="text-[20px] text-white z-10"><a href="{{route('index')}}">Home</a></li>
                <li class="text-[20px] text-white z-10"><a href="{{route('generator')}}">WaisFood Engine</a></li>
                <li class="text-[20px] text-white z-10"><a href="">About Us</a></li>
                <li class="text-[20px] text-white z-10"><a href="{{route('post.index')}}">Community</a></li>
                {{-- <li class="nav-acc text-[25px] flex items-center justify-center">
                    <div class="text-[#f6941c]">
                        <i class="fa-regular fa-user text-white"></i>
                    </div>
                    <div class="nav-content">
                        <ul class="text-[gray]">
                            <div class="p-[10px] pl-0 pr-0 bg-[white]"></div>
                            <div class="tri"></div>
                            <li class="text-[15px] p-[12px] mt-[14px] flex justify-between w-[100%]">
                                <a href="{{route('login.index')}}">VIEW MY PROFILE</a> <i class="fa-regular fa-user"></i>
                            </li>
                            <li class="text-[15px] p-[12px] flex justify-between w-[100%]">
                                <a href="{{route('login.index')}}">VIEW SAVED</a> <i class="fa-regular fa-user"></i>
                            </li>
                            <li class="text-[15px] p-[12px] flex justify-between w-[100%]">
                                <a href="#">CREATE POST</a> <i class="fa-regular fa-user"></i>
                            </li>
                            <li class="text-[15px] p-[12px] flex justify-between w-[100%]">
                                <a href="#">READ MORE</a> <i class="fa-regular fa-user"></i>
                            </li>
                            <li class="text-[15px] p-[12px] flex justify-between w-[100%]">
                                <a href="{{route('logout')}}">SIGN OUT</a> <i class="fa-regular fa-user"></i>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
    <!-- SECTION 1 -->
    @livewire('pages.main-page.components.section-one')
    <!-- SECTION 2 -->
    @livewire('pages.main-page.components.section-two')
    <!-- SECTION 3 -->
    @livewire('pages.main-page.components.section-three')
</div>




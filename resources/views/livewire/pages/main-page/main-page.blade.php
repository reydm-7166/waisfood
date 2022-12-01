<div class="main-page-con relative bg-[#f6941c]">
    <div class="main-nav absolute w-[100%] bg-[transparent] pl-[35px] pr-[35px] pt-[10px] pb-[10px] flex items-center">
        <div class="nav-logo bg-[transparent] flex-1">
            <img class="w-[120px] hide ml-[-20px]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="Wais logo"></div>
        <div class="nav-menu bg-[transparent] flex-1">
            <ul class="flex justify-around items-center">
                <li class="text-[20px] text-[white]">Home</li>
                <li class="text-[20px] text-[white]">Generator</li>
                <li class="text-[20px] text-[white]">About Us</li>
                <li class="text-[20px] text-[white]">Blog</li>
                <li class="wais-user text-[25px] text-[white] flex items-center justify-center border-white rounded-[50%] border-[2px] border-solid w-[45px] h-[45px]"><i class="fa-regular fa-user"></i></li>
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


 

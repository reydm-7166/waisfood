<div class="main-page-con relative bg-[#f6941c]">
    <div class="main-nav absolute w-[100%] bg-[transparent] pl-[35px] pr-[35px] pt-[10px] pb-[10px] flex items-center">
        <div class="nav-logo bg-[transparent] flex-1">
            <img class="w-[120px] hide ml-[-20px]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="Wais logo"></div>
        <div class="nav-menu bg-[transparent] flex-1">
            <ul class="flex justify-around items-center">
                <li class="text-[20px] text-white z-10"><a href="{{route('index')}}">Home</a></li>
                <li class="text-[20px] text-white z-10"><a href="{{route('generator')}}">WaisFood</a></li>
                <li class="text-[20px] text-white z-10"><a href="{{route('post.index')}}">Community</a></li>
            </ul>
        </div>
    </div>

    <!-- SECTION 1 -->
    @livewire('pages.main-page.components.section-one')
    <!-- SECTION 2 -->
    @include('livewire.main-page-component.section-two')
    <!-- SECTION 3 -->
    @include('livewire.main-page-component.section-three')
</div>




<div class="main-page h-[100vh] flex relative">
    <div class="burger flex-1">
        <div>
            <img class="burger-blob absolute" src="\assets\blob.png" alt="blob">
            <img class="burger-img absolute" src="\assets\burger.png" alt="butger">
        </div>
    </div>
    <div class="absolute top-[10px] left-[30px]">
        <img class="w-[130px] ml-[-20px]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="Wais logo">
    </div>
    <div class="description flex-1 text-[white] flex flex-col items-end justify-center pr-[70px] mt-[40px]">
        <div class="des-title des-t-one text-[50px] font-bold leading-[55px] text-right mb-[30px]">
            <p>Enjoy cooking</p>
            <p>while saving our planet</p>
            <p>and your wallet!</p>
        </div>
        <div class="des-title des-t-two text-right leading-[25px] mb-[60px] text-[19.5px]">
            <p>WaisFood PH is a food recipe generator that aims to lower</p>
            <p>food waste  by encouraging the usage of leftover</p>
            <p>ingredients. This will address our kitchen concerns by</p>
            <p>being resourceful without compromising anything</p>
            <p>and is actually helpful in saving our body,</p>
            <p>planet, and our wallet.</p>
        </div>
        <a
            @if (!Auth::check())
                href="{{route('register.create')}}"
            @else
                href="{{route('post.index')}}"
            @endif

            >
            <button class="create-btn text-[#f6941c] flex p-[15px] bg-[white] rounded-[50px]">
                @if (!Auth::check())
                    CREATE ACCOUNT
                    <i class="fa-solid fa-plus h-[20px] w-[20px] rounded-[50%] bg-[#f6941c] p-[5px] text-[white] flex items-center justify-center ml-[10px]"></i>
                @else
                    BROWSE WAISFOOD
                    <i class="fa-solid fa-arrow-right-from-bracket text-[#f6941c] mt-1 flex items-center justify-center ml-[10px]"></i>
                @endif


            </button>
        </a>
    </div>
</div>

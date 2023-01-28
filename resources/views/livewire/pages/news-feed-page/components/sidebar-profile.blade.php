<div class="w-[100%] p-[10px] pb-[30px]">

    <div class="flex items-center">
        <div class="w-[55px] h-[55px] rounded-full">
            @if (Auth::check())
                <img class="w-[55px] h-[55px] rounded-full object-fit" src="{{ asset('assets/profile-images/' . Auth::user()->profile_picture) }} " alt="profile-pic">
            @else
                <img class="w-[100%]  rounded-full" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="profile-pic">
            @endif
        </div>
        <div class="ml-[18px]">
            <p class="font-bold">
                @auth
                    {{ucfirst($logged_user[0]->first_name)}} {{ucfirst($logged_user[0]->last_name)}}
                @endauth
                @guest
                    Log in to view profile
                @endguest

            </p>
        </div>
    </div>
    <div>
        <ul>
            <li class="p-[10px] hover:bg-[lightGray] mb-[5px]">
                <i class="fa-solid fa-kitchen-set text-[#f6941c] text-lg"></i>
                @auth
                    <a class="ml-[10px]" href="{{route('create.post')}}">Create Post</a>
                @endauth
                @guest
                    Log in to publish a post
                @endguest

            </li>
            <li class="p-[10px] hover:bg-[lightGray] mb-[5px]">
                <i class="fa-regular fa-user text-[#f6941c]"></i>
                <a class="ml-[10px]" href="{{route('generator')}}">WaisFood Engine</a>
            </li>
        </ul>
    </div>
    {{-- <div class="mt-[20px]">
        <button class="bg-[lightGray] p-[10px] w-[100%]">See More ⬇</button>
    </div> --}}

 </div>

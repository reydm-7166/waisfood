@auth
    @foreach ($recipe_posts as $post)
        <div class="mb-[50px]">
            <div class="flex justify-between items-center pl-[20px] pr-[20px] pb-[10px] pt-[10px]">
                <div class="flex p-2">
                    <div class="w-[55px] h-[55px] rounded-full">
                        <a href="{{ route('profile.index', $post->author_id) }}"><img class="w-[55px] h-[55px] object-fit rounded-full" src="{{ asset('assets/profile-images/' . $post->profile_picture) }}" alt=""></a>
                    </div>
                    <div class="ml-[18px]">
                        <p><a href="{{ route('profile.index', $post->author_id) }}">{{$post->first_name}} {{$post->last_name}}</a></p>
                        <p class="text-[13px] text-[gray] font-bold">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                    </div>
                </div>

                    <!-- Dropdown menu -->
                <div class="font-bold text-[20px] text-[gray] tracking-[3px]">
                    <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal_{{$post->recipe_id}}" class="inline-flex items-center px-1 text-sm font-sm text-center rounded-md hover:bg-gray-100 focus:ring-1 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-[#f6941c] dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                    </button>

                    <div id="dropdownDotsHorizontal_{{$post->recipe_id}}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-white-700">

                        <ul class="py-1 text-sm text-[#f6941c] dark:text-dark-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                            @if (Auth::user()->id == $post->author_id)
                                <li>
                                    <a class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-white-600 dark:hover:text-dark">Edit</a>
                                </li>
                            @endif
                            <li>
                                <a class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-white-600 dark:hover:text-dark">Report</a>

                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="">
                <img class="w-[100%] rounded-md" src="
                @if (!empty($post->recipe_images))
                    {{ asset('img/recipe-images/' . $post->recipe_images[0]->recipe_image) }}
                @endif
               " alt="thumbnail image" id="thumbnail_newsfeed">
            </div>
            <div class="p-[30px] pt-[10px] w-[100%] ">
                <div>
                    <p class="font-bold text-lg">{{$post->recipe_name}}</p>

                    <p class="text-[gray] text-[13px]">Tags:
                        <small class="bg-[#f6941c] rounded-md text-white p-1">Post Recipe</small>
                        <small class="bg-[#f6941c] rounded-md text-white p-1">
                            @if (!empty($post->tags))
                                {{$post->tags[0]->tag_name}}
                            @endif
                    </small>
                    </p>

                </div>
                <div class="mt-[15px]">
                    <p class="line-clamp-3 break-words" id="content">{{$post->description}}</p>
                </div>
                <div class="w-[100%] mb-[10px] mt-[10px]">
                    @if(!empty($post->comments_count))
                        <p class="text-right text-[gray] italic">{{$post->comments_count}} Comments</p>
                    @else
                        <p class="text-right text-[gray]">No Comments yet</p>
                    @endif
                </div>
                <form class="flex justify-between items-center gap-[10px]">
                    <div class="w-[35px] h-[35px] bg-[gray] rounded-[50%]">
                        <img class="w-[35px] h-[35px]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="">
                    </div>
                <div class="w-[90%]">
                        <input class="p-[8px] rounded w-[100%] bg-[lightGray]" type="text" placeholder="Write comments...">
                    </div>
                </form>
                <div class="text-right mt-[25px]">
                    <button class="inline-block px-6 py-3.5 bg-[#f6941c] text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-[#f6941c] hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">
                        <a href="{{route('recipe-post.view', ['recipe_post_name' => $post->recipe_name, 'id' => $post->id])}}"
                    >
                        Read More
                        </a>
                    </button>
                </div>
            </div>

        </div>
    @endforeach

    @foreach ($newsfeed_posts as $post)

        <div class="mb-[50px]">
            <div class="flex justify-between items-center pl-[20px] pr-[20px] pb-[10px] pt-[10px]">
                <div class="flex">
                    <div class="w-[55px] h-[55px] rounded-full">
                        <img class="w-[55px] h-[55px] object-fit rounded-full" src="{{ asset('img/profile-images/' . $post->profile_picture) }}" alt="">
                    </div>
                    <div class="ml-[18px]">
                        <p>{{$post->first_name}} {{$post->last_name}}</p>
                        <p class="text-[13px] text-[gray] font-bold">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                    </div>
                </div>
                <div class="font-bold text-[20px] text-[gray] tracking-[3px]">
                    <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal_{{$post->unique_id}}" class="inline-flex items-center px-1 text-sm font-sm text-center rounded-md hover:bg-gray-100 focus:ring-1 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-[#f6941c] dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                    </button>

                    <!-- Dropdown menu -->

                    <div id="dropdownDotsHorizontal_{{$post->unique_id}}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-white-700">
                        <ul class="py-1 text-sm text-[#f6941c] dark:text-dark-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                                <a href="#" class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-grey-600 dark:hover:text-dark">Save</a>
                            </li>
                            @if ($post->user_id == $logged_user[0]->id)
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-white-600 dark:hover:text-dark">Edit</a>
                                </li>
                            @endif
                            <li>
                                <a href="#" class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-white-600 dark:hover:text-dark">Report</a>

                            </li>

                        </ul>
                    </div>

                </div>
            </div>
            <div class="">
                {{-- @if (!empty($post->post_images))
                    <img class="w-[100%]" src="{{ asset('img/uploaded_image/post_image/' . $post->post_images[0]->image_name) }}" alt="thumbnail image" id="thumbnail_newsfeed">
                @endif --}}
            </div>
            <div class="p-[30px] pt-[10px] w-[100%] ">
                <div>
                    <p class="font-bold text-lg">{{ucfirst($post->post_title)}}</p>
                    <div class="mt-[15px]">
                        <p class="line-clamp-3 break-words italic" id="content">{{ucfirst($post->post_content)}}</p>
                    </div>
                    <p class="text-[gray] text-[13px] mt-[10px]">Tags:
                        <small class="bg-[#f6941c] rounded-md text-white p-1">Post Status</small>
                            @if (!empty($post->tags))
                                <small class="bg-[#f6941c] rounded-md text-white p-1">
                                    {{$post->tags[0]->tag_name}}
                                </small>
                            @endif
                    </p>

                </div>

                <div class="w-[100%] mb-[10px] mt-[10px]">
                    @if(!empty($post->comments_count))
                        <p class="text-right text-[gray] italic">{{$post->comments_count}} Comments</p>
                    @else
                        <p class="text-right text-[gray]">No Comments yet</p>
                    @endif
                </div>
                <form class="flex justify-between items-center gap-[10px]">
                    <div class="w-[35px] h-[35px] bg-[gray] rounded-[50%]">
                        <img class="w-[35px] h-[35px]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="">
                    </div>
                <div class="w-[90%]">
                        <input class="p-[8px] rounded w-[100%] bg-[lightGray]" type="text" placeholder="Write comments...">
                    </div>
                </form>
                <div class="text-right mt-[25px]">
                    <button class="inline-block px-6 py-3.5 bg-[#f6941c] text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-[#f6941c] hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">
                        <a href="">
                        Read More
                        </a>
                    </button>
                </div>
            </div>

        </div>
    @endforeach
@endauth

@guest
    {{-- loop thorugh the recipe post collection --}}
    @foreach ($recipe_posts as $post)

        <div class="mb-[50px]">
            <div class="flex justify-between items-center pl-[20px] pr-[20px] pb-[10px] pt-[10px]">
                <div class="flex">
                    <div class="w-[55px] h-[55px] rounded-full">
                        <img class="w-[55px] h-[55px] object-fit rounded-full" src="{{ asset('assets/profile-images/' . $post->profile_picture) }}" alt="">
                    </div>
                    <div class="ml-[18px]">
                        <p>{{$post->first_name}} {{$post->last_name}}</p>
                        <p class="text-[13px] text-[gray] font-bold">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                    </div>
                </div>
                <div class="font-bold text-[20px] text-[gray] tracking-[3px]">
                    <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex items-center px-1 text-sm font-sm text-center rounded-md hover:bg-gray-100 focus:ring-1 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-[#f6941c] dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownDotsHorizontal" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-white-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-[#f6941c] dark:text-dark-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                                <a href="#" class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-white-600 dark:hover:text-dark">Report</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="">
                <img class="w-[100%] rounded-md" src="
                    @if (!empty($post->recipe_images))
                        {{ asset('img/recipe-images/' . $post->recipe_images[0]->recipe_image) }}
                    @endif
                   " alt="thumbnail image" id="thumbnail_newsfeed">
            </div>
            <div class="p-[30px] pt-[10px] w-[100%] ">
                <div>
                    <p class="font-bold text-lg">{{$post->recipe_name}}</p>

                    <p class="text-[gray] text-[13px]">Tags:
                        <small class="bg-[#f6941c] rounded-md text-white p-1">Post Recipe</small>
                        <small class="bg-[#f6941c] rounded-md text-white p-1">
                            @if (!empty($post->tags))
                                {{$post->tags[0]->tag_name}}
                            @endif
                    </small>
                    </p>

                </div>
                <div class="mt-[15px]">
                    <p class="line-clamp-3 break-words" id="content">{{$post->description}}</p>
                </div>
                <div class="w-[100%] mb-[10px] mt-[10px]">
                    @if(!empty($post->comments_count))
                        <p class="text-right text-[gray] italic">{{$post->comments_count}} Comments</p>
                    @else
                        <p class="text-right text-[gray]">No Comments yet</p>
                    @endif
                </div>
                <form class="flex justify-between items-center gap-[10px]">
                    <div class="w-[35px] h-[35px] bg-[gray] rounded-[50%]">
                        <img class="w-[35px] h-[35px]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="">
                    </div>
                <div class="w-[90%]">
                        <input class="p-[8px] rounded w-[100%] bg-[lightGray]" type="text" placeholder="Write comments...">
                    </div>
                </form>
                <div class="text-right mt-[25px]">
                    <button class="inline-block px-6 py-3.5 bg-[#f6941c] text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-[#f6941c] hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out"><a href="{{route('recipe-post.view', ['recipe_post_name' => $post->recipe_name, 'id' => $post->id])}}">  Read More</a></button>
                </div>
            </div>

        </div>
    @endforeach

    @foreach ($newsfeed_posts as $post)
        <div class="mb-[50px]">
            <div class="flex justify-between items-center pl-[20px] pr-[20px] pb-[10px] pt-[10px]">
                <div class="flex">
                    <div class="w-[55px] h-[55px] rounded-full">
                        <img class="w-[55px] h-[55px] object-fit rounded-full" src="{{ asset('img/profile-images/' . $post->profile_picture) }}" alt="">
                    </div>
                    <div class="ml-[18px]">
                        <p>{{$post->first_name}} {{$post->last_name}}</p>
                        <p class="text-[13px] text-[gray] font-bold">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                    </div>
                </div>
                <div class="font-bold text-[20px] text-[gray] tracking-[3px]">
                    <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex items-center px-1 text-sm font-sm text-center rounded-md hover:bg-gray-100 focus:ring-1 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-[#f6941c] dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownDotsHorizontal" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-white-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-[#f6941c] dark:text-dark-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                                <a href="#" class="block py-2 px-4 hover:bg-white-100 dark:hover:bg-white-600 dark:hover:text-dark">Report</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="">
                @if (!empty($post->post_images))
                <img class="w-[100%]" src="{{ asset('img/uploaded_image/post_image/' . $post->post_images) }}" alt="thumbnail image" id="thumbnail_newsfeed">
            @endif
            </div>
            <div class="p-[30px] pt-[10px] w-[100%] ">
                <div>
                    <p class="font-bold text-lg">{{$post->post_title}}</p>

                    <p class="text-[gray] text-[13px]">Tags:
                        <small class="bg-[#f6941c] rounded-md text-white p-1">Post Status</small>
                        <small class="bg-[#f6941c] rounded-md text-white p-1">
                            @if (!empty($post->tags))
                                {{$post->tags[0]->tag_name}}
                            @endif
                    </small>
                    </p>

                </div>
                <div class="mt-[15px]">
                    <p class="line-clamp-3 break-words" id="content">{{$post->post_content}}</p>
                </div>
                <div class="w-[100%] mb-[10px] mt-[10px]">
                    @if(!empty($post->comments_count))
                        <p class="text-right text-[gray] italic">{{$post->comments_count}} Comments</p>
                    @else
                        <p class="text-right text-[gray]">No Comments yet</p>
                    @endif
                </div>
                <form class="flex justify-between items-center gap-[10px]">
                    <div class="w-[35px] h-[35px] bg-[gray] rounded-[50%]">
                        <img class="w-[35px] h-[35px]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="">
                    </div>
                <div class="w-[90%]">
                        <input class="p-[8px] rounded w-[100%] bg-[lightGray]" type="text" placeholder="Write comments...">
                    </div>
                </form>
                <div class="text-right mt-[25px]">
                    <button class="inline-block px-6 py-3.5 bg-[#f6941c] text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-[#f6941c] hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out"><a href="">Read More</a></button>
                </div>
            </div>

        </div>
    @endforeach
@endguest

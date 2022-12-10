@if (!empty($status_posts))
    @foreach ($status_posts as $status)
        <div class="mb-[20px] border-solid border-2 border-[#f6941c] rounded-lg shadow-md" id="status-container" wire:key="status-{{$status->id}}">
        <div class="">
            @if ($status->post_image)
                <img class="w-[100%]" src="\assets\login-image.png" alt="readmore image">
            @endif
                
        </div class="border-solid border-2 border-sky-500">
            <div class="p-[30px]">
                <div class="text-right mb-[20px] mt-[10px]">
                    <p class="text-[15px]">{{date('M d, Y', strtotime($status->updated_at))}} / <span class="text-[#f6941c]">Upvotes: {{$status->like_count}} </span> / Comment: {{$status->comment_count}}
            </div>
            <div>
                    <h1 class="font-bold text-[25px] mb-[20px]">{{ucfirst($status->post_title)}}</h1>
                    <p class="text-[gray] mb-[20px] break-all line-clamp-3">{{$status->post_content}}</p>
                    <button class="text-[white] p-[10px] pl-[30px] pr-[30px] bg-[#2e2f31] mt-[20px] mb-[10px]">READ MORE</button>
                </div>
            </div>
        </div>
    @endforeach
@endif 
<div class="feed readmore-main ">
    <div class="mb-[20px]">
        @livewire('reusable.navbar')
    </div>
    <div class="readmore flex justify-center w-[80%] m-[auto]">
        <div class="readmore-prof w-[30%]">
            @livewire("pages.news-feed-page.components.sidebar-profile")
        </div>
        <div class="w-[70%]  pl-[50px] ">
            <div>
                @livewire("pages.news-feed-page.components.create-post")
            </div>
            <div>
                @livewire("pages.news-feed-page.components.feed")
                @livewire("pages.news-feed-page.components.feed")
                @livewire("pages.news-feed-page.components.feed")
                @livewire("pages.news-feed-page.components.feed")
            </div>
        </div>
    </div>
</div>
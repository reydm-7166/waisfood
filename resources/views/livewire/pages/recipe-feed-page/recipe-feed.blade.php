<div>
    <div>
        @livewire('reusable.navbar')
    </div>
    <div>
        <div>
            <div><p class="text-[30px] text-center mb-[50px] text-[#f6941c] mt-[20px]">RECIPE FEED</p></div>
        </div>
        <div class="gallery  rounded-[30px] grid justify-center w-[90%] m-[auto] grid-cols-3 gap-[1.5] p-[10px] mt-[40px]"> 
            <div class="m-[5px] rounded-[20px] p-[15px]">@livewire('pages.recipe-feed-page.components.recipe-feed-card')</div>  
            <div class="m-[5px] rounded-[20px] p-[15px]">@livewire('pages.recipe-feed-page.components.recipe-feed-card')</div>  
            <div class="m-[5px] rounded-[20px] p-[15px]">@livewire('pages.recipe-feed-page.components.recipe-feed-card')</div>  
            <div class="m-[5px] rounded-[20px] p-[15px]">@livewire('pages.recipe-feed-page.components.recipe-feed-card')</div>  
            <div class="m-[5px] rounded-[20px] p-[15px]">@livewire('pages.recipe-feed-page.components.recipe-feed-card')</div>  
            <div class="m-[5px] rounded-[20px] p-[15px]">@livewire('pages.recipe-feed-page.components.recipe-feed-card')</div>    
       </div>

    </div>
</div>
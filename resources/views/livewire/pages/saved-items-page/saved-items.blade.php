<div>
    <div>
        @livewire('reusable.navbar')
    </div>
    <div>
        <div class="w-[90%] m-auto">
            <div><p class="text-[30px] text-center mb-[50px] text-[#f6941c] mt-[20px]">SAVED RECIPES</p></div>
            <div class="w-[100%] flex justify-end">
                <select name="cars" id="cars" class="drp bg-[#F7F6F3] rounded w-[200px]  p-[15px] pl-[20px] pr-[35px] bg-[transparent]">
                    <option value="Browse" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Filter by</option>
                    <option value="Hello" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View my post only</option>
                    <option value="World" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View my recipes only</option>
                    <option value="KC" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View all</option>
                </select>

            </div>
        </div>
        <div class="gallery rounded-[30px] grid justify-center w-[90%] m-[auto] grid-cols-3 gap-[1.5] p-[10px] mt-[40px]"> 
            <div class="m-[5px] rounded-[20px] p-[15px]">@livewire('pages.saved-items-page.components.saved-cards')</div>  
            <div class="m-[5px] rounded-[20px] p-[15px]">@livewire('pages.saved-items-page.components.saved-cards')</div>  
            <div class="m-[5px] rounded-[20px] p-[15px]">@livewire('pages.saved-items-page.components.saved-cards')</div>  
            <div class="m-[5px] rounded-[20px] p-[15px]">@livewire('pages.saved-items-page.components.saved-cards')</div>  
            <div class="m-[5px] rounded-[20px] p-[15px]">@livewire('pages.saved-items-page.components.saved-cards')</div>  
            <div class="m-[5px] rounded-[20px] p-[15px]">@livewire('pages.saved-items-page.components.saved-cards')</div>  
       </div>

    </div>
</div>
 <div>
    <div>
        @livewire('reusable.navbar')
    </div>
    <div>
        <div class="w-[90%] m-auto">
            <div><p class="text-[30px] text-center mb-[50px] text-[#f6941c] mt-[20px]">SAVED RECIPES</p></div>
 

            <div class="w-[100%] flex justify-end z-50">
                <div x-data="{dropdownMenu: false}" class="relative w-[250px]">
                    <button @click="dropdownMenu = ! dropdownMenu" class="flex items-center justify-between p-2 bg-[#F7F6F3] rounded-md w-[100%]">
                        <span class="mr-4 px-4 py-3">Filter by </span>
                        <i class="fa-solid fa-caret-down px-4 py-4"></i>
                    </button>
                    <div x-show="dropdownMenu" class="z-10 absolute right-0 py-2 mt-2 bg-[#F7F6F3] rounded-md shadow-xl w-[100%]">
                        <a href="#" class="block px-4 py-4 text-sm    hover:bg-gray-400 hover:text-white">
                            View my post only
                        </a>
                        <a href="#" class="block px-4 py-4 text-sm   hover:bg-gray-400 hover:text-white">
                            View my recipes only
                        </a>
                        <a href="#" class="block px-4 py-4 text-sm   hover:bg-gray-400 hover:text-white">
                            View all
                        </a>
                    </div>
                </div>
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
 


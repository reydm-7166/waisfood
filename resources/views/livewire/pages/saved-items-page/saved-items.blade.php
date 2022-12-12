 <div>
    <div>
        @livewire('reusable.navbar')
    </div>
    <div>

        <div class="w-[90%] m-auto">
            <div><p class="text-[30px] text-center mb-[50px] text-[#f6941c] mt-[20px]">SAVED ITEMS</p></div>
 

            <div class="w-[100%] flex justify-end z-50">
                <div x-data="{dropdownMenu: false}" class="relative w-[250px]">
                    <button @click="dropdownMenu = ! dropdownMenu" class="flex items-center justify-between p-2 bg-[#F7F6F3] rounded-md w-[100%]">
                        <span class="mr-4 px-4 py-3">Filter by </span>
                        <i class="fa-solid fa-caret-down px-4 py-4"></i>
                    </button>
                    <div x-show="dropdownMenu" class="z-10 absolute right-0 py-2 mt-2 bg-[#F7F6F3] rounded-md shadow-xl w-[100%]">
                        <a wire:click="saved_status" class="block px-4 py-4 text-sm cursor-pointer hover:bg-gray-400 hover:text-white">
                            View my post only
                        </a>
                        <a wire:click="saved_recipe" class="block px-4 py-4 text-sm cursor-pointer hover:bg-gray-400 hover:text-white">
                            View my recipes only
                        </a>
                        <a wire:click="all_saved" class="block px-4 py-4 text-sm cursor-pointer hover:bg-gray-400 hover:text-white">
                            View all
                        </a>
                    </div>
                </div>
            </div>

            
        </div>
        <div class="gallery rounded-[30px] grid justify-center w-[90%] m-[auto] grid-cols-3 gap-[1.5] p-[10px] mt-[40px]"> 

        
            
        @if (!empty($recipe))
            @include('livewire.pages.saved-items-page.components.saved-recipe-cards')
        @endif

        @if (!empty($status))
            @include('livewire.pages.saved-items-page.components.saved-post-cards')
        @endif

       </div>

    </div>
</div>
 


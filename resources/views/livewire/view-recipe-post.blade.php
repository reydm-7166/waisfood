<div class="w-[70%] pl-[50px] ">
    <div class="w-[100%] flex justify-end z-50 mb-[20px]">
        <div x-data="{dropdownMenu: false}" class="relative w-[250px]">
            <button @click="dropdownMenu = ! dropdownMenu" class="flex items-center justify-between p-2 bg-[#F7F6F3] rounded-md w-[100%] hover:shadow ">
                <span class="mr-4 px-4 py-3">Filter by </span>
                <i class="fa-solid fa-caret-down px-4 py-4"></i>
            </button>
            <div x-show="dropdownMenu" class="z-10 absolute right-0 py-2 mt-2 bg-[#F7F6F3] rounded-md shadow-xl w-[100%]">
                <a wire:click="status_post" class="block px-4 py-4 text-sm cursor-pointer hover:bg-gray-400 hover:text-white">
                    View my post only
                </a>
                <a wire:click="recipe_post" class="block px-4 py-4 text-sm cursor-pointer hover:bg-gray-400 hover:text-white">
                    View my recipes only
                </a>
                <a wire:click="all_post" class="block px-4 py-4 text-sm cursor-pointer hover:bg-gray-400 hover:text-white">
                    View all
                </a>
            </div>
        </div>
    </div>

    @if (!empty($recipe_posts))
        @include('livewire.pages.read-more-page.components.recipe-post-cards')
    @endif

    @if (!empty($status_posts))
        @include('livewire.pages.read-more-page.components.status-post-cards')
    @endif
</div>

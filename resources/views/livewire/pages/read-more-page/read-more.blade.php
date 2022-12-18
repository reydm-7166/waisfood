@extends('layout.app-in-use')

<div class="readmore-main">
    <div class="mb-[20px]">
        @livewire('reusable.navbar')
    </div>
    <div class="readmore flex justify-center w-[80%] m-[auto]">
        <div class="readmore-prof w-[30%]">
            @livewire("reusable.profile-card")
        </div>
        <div class="w-[70%]  pl-[50px] ">
            <div class="w-[100%] flex justify-end z-50 mb-[20px]">
                <div x-data="{dropdownMenu: false}" class="relative w-[250px]">
                    <button @click="dropdownMenu = ! dropdownMenu" class="flex items-center justify-between p-2 bg-[#F7F6F3] rounded-md w-[100%] hover:shadow ">
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
             @livewire("pages.read-more-page.components.read-more-cards")
        </div>
    </div>
</div>
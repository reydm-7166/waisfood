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
            <div class="w-[100%] flex justify-end mb-[30px]">
                <select name="cars" id="cars" class="drp bg-[#F7F6F3] rounded w-[200px]  p-[15px] pl-[20px] pr-[35px] bg-[transparent]">
                    <option value="Browse" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Filter by</option>
                    <option value="Hello" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View my post only</option>
                    <option value="World" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View my recipes only</option>
                    <option value="KC" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View all</option>
                </select>
            </div>
             @livewire("pages.read-more-page.components.read-more-cards")
             @livewire("pages.read-more-page.components.read-more-cards")
             @livewire("pages.read-more-page.components.read-more-cards")
             @livewire("pages.read-more-page.components.read-more-cards")
        </div>
    </div>
</div>
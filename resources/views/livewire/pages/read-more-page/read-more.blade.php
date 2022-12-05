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
             @livewire("pages.read-more-page.components.read-more-cards")
             @livewire("pages.read-more-page.components.read-more-cards")
             @livewire("pages.read-more-page.components.read-more-cards")
             @livewire("pages.read-more-page.components.read-more-cards")
        </div>
    </div>
</div>
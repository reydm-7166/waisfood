@extends('layout.app-in-use')

<div class="readmore-main">
    <div class="mb-[20px]">
        @livewire('reusable.navbar')
    </div>
    <div class="readmore flex justify-center w-[80%] m-[auto]">
        <div class="readmore-prof w-[30%]">
            @include('livewire.reusable.profile-card')
        </div>

        @livewire('view-recipe-post', ['total_votes' => $total_votes])
    </div>
</div>

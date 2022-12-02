@extends('layout.app-in-use')

@section('body')
    <div class="feed readmore-main ">
        <div class="mb-[20px]">
            @livewire('reusable.navbar')
        </div>
        <div class="readmore flex justify-center w-[80%] m-[auto]">
            <div class="readmore-prof w-[30%]">
                @include("livewire.pages.news-feed-page.components.sidebar-profile")
            </div>
            <div class="w-[70%]  pl-[50px] ">
                <div>
                    @include('livewire.pages.news-feed-page.components.create-post')
                </div>
                <div>
                    @foreach ($newsfeed_posts as $post)
                        @include('livewire.pages.news-feed-page.components.feed')
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
@endsection
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

@section('add_script_create-post')
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

    <script>
        @if(Session::has('post-success'))
            $(document).ready(() => {
                let message = '{{Session::get('post-success')}}';

                Swal.fire({
                    icon: 'success',
                    title: `Success`,
                    iconColor: 'white',
                    html: '<p class="text-white font mx-auto swal-text">'+ message +'</p>',
                    background: `#a5dc86`,
                    position: `top`,
                    showConfirmButton: false,
                    timer: 5000,
                    toast: true,
                    customClass: {
                        title: 'text-white',
                    },
                });
            });
        @endif
    </script>
@endsection
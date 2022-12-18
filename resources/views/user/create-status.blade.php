@extends('layout.app-in-use')

@section('body')
<div class="">
    <div class="mb-[20px]">
        @livewire('reusable.navbar')
    </div>

    <form action="{{route('store.status')}}" method="POST">
        @csrf
        <div class="w-[50%] m-[auto] flex gap-12 create-post">
            
            <div class="profile-more-info flex-[2]">

                <div class="flex flex-col mb-[20px]">
                    <label for="title" class="mb-[15px] font-bold">Post Title</label>
                    <input type="text" name="post_title" id="input_post_title" class="bg-[#F7F6F3] p-[15px]" placeholder="Add Post Title" value="{{ old('post_title') }}">
                    @if($errors->first('post_title'))
                        <small class=" text-red-500 font-bold">{{ $errors->first('post_title') }}</small>
                    @endif
                </div>


                <div class="flex flex-col mb-[20px]">
                    <label for="post_content" class="mb-[15px] font-bold"></label>
                    <textarea name="post_content" cols="30" rows="7" class="bg-[#F7F6F3] p-[15px] w-[100%]" value="{{ old('post_content') }}" placeholder="What's on your mind? Ask the community"></textarea>
                    @if($errors->first('post_content'))
                        <small class=" text-red-500 font-bold">{{ $errors->first('post_content') }}</small>
                    @endif
                </div>



                <div class="mt-[60px] mb-[50px]">
                    <div class="terms mb-[20px] flex">
                      <div class="mr-[20px]">

                      </div>

                    </div>
                    <div class="sbmt flex gap-3 float-right">
                        <input class="text-[white] text-[16px] rounded-sm hover:cursor-pointer hover:shadow-lg bg-[#f6941c] p-[15px] w-[220px]" type="submit" value="Submit Post">
                        <button class="text-[gray] text-[16px] p-[15px] bg-[#F7F6F3] w-[120px]">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection


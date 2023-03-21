<div class="third-sec-page h-[95vh] w-[100%] bg-[white] flex flex-col justify-center items-center">
    <div class="one leading-[35px] text-center mt-[30px] mb-[35px]">
        <p class="text-[#f6941c]">News & Articles</p>
        <p class="text-[45px] font-bold">From the blog</p>
    </div>

    <div class="two flex h-[100%] from-blog">


        @foreach ($data->response->results as $index => $news)
            @if($index <= 3)
                @if($index == 0)
                    <div class="big-how w-[530px] h-[87%] mt-[0px]">
                        <div class="head h-[62%]">
                            <a href="{{ $news->webUrl }}" target="_blank"><img class="h-full w-full object-cover" src="{{ $news->fields->thumbnail }}" alt="no thumbnail found"></a>
                        </div>
                        <div class="head-sub h-[40%] bg-[#F7F6F3] pr-[30px] pl-[30px] flex flex-col justify-center">
                            <div class="text-[12px] flex items-center mb-[20px]">
                                <div class="date p-[5px] pl-[20px] pr-[20px] rounded bg-[#6FB43F] mr-[20px]">{{ \Carbon\Carbon::parse($news->webPublicationDate)->format('d M, Y') }}</div>
                                <div class="admin mr-[10px]"><i class="fa-regular fa-user text-[#6FB43F] mr-[5px]"></i><a href="{{ $news->webUrl }}" target="_blank">{{ $news->fields->byline }}</a></div>
                            </div>
                            <div>
                                <p class="text-[23px] font-bold leading-[40px]"><a href="{{ $news->webUrl }}" target="_blank">{{ $news->webTitle }}</a></p>
                            </div>
                        </div>
                    </div>
                @else
                    @if($index > 0)
                        @if($index == 1)
                            <div class="small-hows w-[530px] h-[89%] bg-[#F7F6F3] m-[10px] mt-[0px] flex flex-col justify-center items-center p-[45px]">
                                <div class="categ flex justify-between mb-[45px]">
                                    <div class="categ-img">
                                        <div class="w-[100px] h-[100px] rounded">
                                            <a href="{{ $news->webUrl }}" target="_blank"><img class="h-full w-full object-cover" src="{{ $news->fields->thumbnail }}" alt="no thumbnail found"></a>
                                        </div>
                                    </div>
                                    <div class="categ-details flex flex-col ml-[30px]">
                                        <div class="flex mb-[13px]">
                                            <div class="admin mr-[10px] text-[12px]"><i class="fa-regular fa-user text-[#6FB43F] mr-[5px]"></i><a href="{{ $news->webUrl }}" target="_blank">{{ $news->fields->byline }}</a></div>
                                            <div class="comments text-[12px] pl-[5px] pr-[5px] rounded bg-[#6FB43F] ">{{ \Carbon\Carbon::parse($news->webPublicationDate)->format('d M, Y') }}</div>
                                        </div>
                                        <div>
                                            <p class="leading-[25px] text-[14px] font-bold hover:text-[#f6941c]"><a href="{{ $news->webUrl }}" target="_blank">{{ $news->webTitle }}</a></p>
                                        </div>
                                    </div>
                                </div>
                        @else
                        <div class="categ flex justify-between mb-[45px]">
                            <div class="categ-img">
                                <div class="w-[100px] h-[100px] rounded">
                                    <a href="{{ $news->webUrl }}" target="_blank"><img class="h-full w-full object-cover" src="{{ $news->fields->thumbnail }}" alt="no thumbnail found"></a>
                                </div>
                            </div>
                            <div class="categ-details flex flex-col ml-[30px]">
                                <div class="flex mb-[13px]">
                                    <div class="admin mr-[10px] text-[12px]"><i class="fa-regular fa-user text-[#6FB43F] mr-[5px]"></i><a href="{{ $news->webUrl }}" target="_blank">{{ $news->fields->byline }}</a></div>
                                    <div class="comments text-[12px] pl-[5px] pr-[5px] rounded bg-[#6FB43F] ">{{ \Carbon\Carbon::parse($news->webPublicationDate)->format('d M, Y') }}</div>
                                </div>
                                <div>
                                    <p class="leading-[25px] text-[14px] font-bold hover:text-[#f6941c]"><a href="{{ $news->webUrl }}" target="_blank">{{ $news->webTitle }}</a></p>
                                </div>
                            </div>
                        </div>
                        @endif

                    @endif
                @endif
            @endif
        @endforeach
                            </div>
    </div>
</div>

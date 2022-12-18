{{-- {{dd($status)}} --}}
@foreach ($status as $status_detail)
    @foreach($status_detail->status_detail as $status)
        <div class="m-[5px] rounded-[20px] p-[15px] saved_posts">
            <div class="flex flex-col h-[600px] w-[100%]">
                <div class="relative bg-[#2e2f31] h-[60%]">
                    <div class="time bg-[#f6941c] absolute bottom-0 right-11 p-[8px] pl-[15px] pr-[15px]">
                        <p>{{date('M d, Y', strtotime($status->updated_at));}}</p>
                    </div>
                </div>
                <div class="h-[40%] categ-details flex flex-col ml-[30px] justify-center pl-[30px] pr-[40px]">     
                    <div class="flex mb-[13px]">
                        <div class="admin mr-[10px] text-[13px] hover:cursor-pointer hover:underline hover:text-blue-600"><i class="fa-regular fa-user text-[#6FB43F] mr-[3px]"></i> {{ucfirst($status_detail->author_name)}}</div>
                        <div class="comments text-[13px] mr-[5px] hover:cursor-pointer hover:underline hover:text-blue-600"><i class="fa-regular text-[#6FB43F] fa-comment-dots mr-[3px]"></i> {{$status_detail->status_comment}}</div> 

                        <div class="comments text-[13px] hover:cursor-pointer hover:underline hover:text-blue-600"> 
                            
                        </div>

                    </div>
                    <div>
                        <p class="leading-[30px] text-[20px] font-bold hover:text-[#f6941c] hover:cursor-pointer hover:underline"><a href="">{{ucfirst($status->post_title)}}</a></p>

                    </div>
                    <div>
                        <p class="text-[gray] text-[12px] mt-[20px] line-clamp-3">{{ucfirst($status->post_content)}}</p>
                    </div>
                </div>
            </div>  
        </div>
    @endforeach
@endforeach


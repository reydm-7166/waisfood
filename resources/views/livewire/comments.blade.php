<div>
    <div class="mt-[60px] com-sec">
        <div>
            <p class="text-[25px] italic mb-[20px]">
                @if (!empty($comments))
                    {{count($comments)}}  Comments
                @else
                    No Comments Yet
                @endif
            </p>
            <!-- actual comments -->
            @foreach ($comments as $comment)
                <div class="flex mb-[30px]" wire:key="comment-{{$comment->comment_id}}" id="comment_details">
                    <div class="mr-[20px] image-pp" wire:key="comment-{{$comment->id}}">
                        <img class="com-prof w-[65px] h-[65px] rounded-[50%] inline-block" src="{{ asset('img/profile-images')}}/{{ $comment->profile_picture }}" id="pp"></img>
                    </div>
                    <div class="inline-block test">
                        <div class="text-[14px]">
                            <p class="name font-bold mb-[20px] cursor-pointer wire:key="comment-{{$comment->id}}" hover:text-blue-500"><a href="">{{$comment->first_name}} {{$comment->last_name}}</a></p>
                            <p class="break-all pl-3 pb-1"  wire:key="comment-{{$comment->id}}" d="comment_content">&emsp;&emsp;{{$comment->comment_content}}</p>
                        </div>
                        <div class="mt-[20px] text-right" id="delete_edit" wire:key="comment-{{$comment->id}}">
                            @auth
                                @if($comment->user_id == Auth::user()->id)
                                    <a id="edit" wire:click.prevent="delete({{$comment->comment_id}})"class="font float-end text-danger cursor-pointer"><i class="ms-2 fa-solid fa-trash-can text-danger"></i>[ Delete Comment ]</a>
                                
                                    <a id="edit" 
                                        wire:click.prevent="get_comment({{$comment->comment_id}})"
                                        
                                        data-bs-toggle="modal" data-bs-target="#exampleModalScrollable"
                                        class="font float-end text-primary cursor-pointer">
                                        <i class="ms-2 fa-solid fa-pen-to-square text-primary"></i>
                                            [ Edit Comment ]
                                    </a>
                                
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- comment-form -->
    </div>
    <div id="add_comment_container" class="pb-5 mt-4 mb-5 mx-auto">
        <form wire:submit.prevent="submit" method="post">

            {{-- THIS IF FOR THE REVIEW MESSAGE --}}
            <div id="comment_message" class="">
                <label for="floatingTextarea" id="message_label" class="font fw-bold">Leave a comment</label>
                <textarea required class="form-control font" placeholder="Tell us what you think" id="floatingTextarea" wire:model="message" oninput="this.style.height = ''; this.style.height = this.scrollHeight +'px'"></textarea>
                @error('review')<small class="text d-block text-danger font">{{ $message }}</small> @enderror
                
            </div>
        <input type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded float-end mt-2" id="submit" value="Submit"></input>
        </form>

    </div>


<!-- Edit Modal -->
    <div  wire:ignore.self class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="exampleModalScrollable" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div
                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                    Modal title
                </h5>
                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="modal" id="close" aria-label="Close"></button>
                </div>
                <div class="modal-body relative">
                    <div class="flex justify-center">
                        <div class="mb-3 xl:w-96">
                            <form wire:submit.prevent="update_comment">
                                @csrf
                                <textarea
                                    class="
                                    form-control
                                    block
                                    w-full
                                    text-base
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                    "
                                    wire:model="comment"
                                    name="comment"
                                    rows="5"
                                    oninput="this.style.height = ''; this.style.height = this.scrollHeight +'px'"
                                    placeholder="Your message"
                                >
                                </textarea>
                                @error('comment')<small class="text d-block text-danger font">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
                        <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md mt-3">
                            <button type="button"
                                class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit"
                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                Save changes
                            </button>
                            </form>
                        </div>
            </div>
        </div>
    </div>



  

</div>



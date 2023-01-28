<div class="w-[100%] border-[1px] border-solid border-gray-300 text-center flex flex-col items-center pb-[30px]">
   <div class="mb-[40px] mt-[50px] w-[150px] h-[150px] text-center">
        <img class="rounded-[50%] mx-auto align-middle border-solid" src="{{ asset('assets/profile-images/' . Auth::user()->profile_picture) }}" id="pp" alt="profile pic">
        @if ($user_id == Auth::user()->id)
            <div class="text-sky-400 mt-2" id="editBtn">
                <a href="" class="pb-1 border-b-2 border-blue-300"><i class="fa-regular fa-pen-to-square mr-1"></i> Edit Avatar</a>
            </div>
        @endif

        <form action="{{ route('profile.change-picture') }}" method="post" id="submitForm" class="invisible mt-[-20px]" enctype="multipart/form-data">
            @csrf
            <input type="file" name="picture" class="my-1">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 text-sm rounded mt-2">
                Submit
            </button>
        </form>
   </div>

    <div class="p-[20px] mt-[50px]">
        <p class="font-bold tetx-[30px]">{{Auth::user()->first_name . " " . Auth::user()->last_name}}</p>
        <p class="text-[#f6941c] mb-[20px] mt-[10px]"><i class="fa-solid fa-id-badge mr-[5px] hover:cursor-pointer"></i>Home Cook</p>
        {{-- <p class="leading-[26px] text-[gray] text- mb-[20px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, perspiciatis!</p> --}}
    </div>
    <div class="w-[100%] p-[20px]">
        <div class="flex justify-around mb-[20px] mt-[20px]">
            <div class="flex flex-col"><p>Upvotes Received</p><span class="text-[#f6941c]">{{$total_votes}}</span></div>
            <div><p>Reviews Published</p><span class="text-[#f6941c]">{{$reviews_made}}</span></div>

        </div>
        <div>
            <p>Recipes Published</p>
            <span class="text-[#f6941c]">
                @if ($recipe_published > 0)
                    {{$recipe_published}}
                @else
                    None
                @endif
            </span>
        </div>
        <div class="flex flex-col mt-[10px]"><p>Recipes Posted</p><span class="text-[#f6941c]">{{$recipe_count}}</span></div>
    </div>
    <div>
    </div>

    <div class="modal fade" id="updateInfo" tabindex="-1" aria-labelledby="updateInfoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateInfoLabel">Update Recipe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form >
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Recipe Name</label>
                            <input type="text" class="form-control">
                            @error('recipe_edit_name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Recipe Tag</label>
                            <input type="text" class="form-control">
                            @error('recipe_edit_tag') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>

                        <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('profile_pic_script')
    <script>
        $(document).ready(function () {
            $('#editBtn').click(function(e){
                e.preventDefault();

                $('#submitForm').removeClass("invisible");
                $('#editBtn').addClass('invisible');
            });

            @if(session()->has('profile-changed'))
                Swal.fire({
                    icon: 'success',
                    title: `Updated Successfully!`,
                    iconColor: 'white',
                    background: `#a5dc86`,
                    position: `top-right`,
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true,
                    customClass: {
                        title: 'text-white',
                    },
                });
            @endif
        });
    </script>
@endsection

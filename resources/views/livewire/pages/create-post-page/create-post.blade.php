<div class="">
    <div class="mb-[20px]">
        @livewire('reusable.navbar')
    </div>
    <form>
        <div class="w-[80%] m-[auto] flex items-center gap-8 font-bold mb-[20px]">
            <img class="rounded-[50%] w-[80px] h-[80px] bg-[gray]"  src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="profile pic">
            <p class="text-[20px]">Reymond Domingo</p>
        </div>
        <div class="w-[80%] m-[auto] flex gap-12 create-post">
            <div class="profile-info flex-1">
                <div class=" w-[100%] h-[300px] bg-[#F7F6F3] flex justify-center items-center">
                    {{-- add photo section here  --}} photo section here
                </div>
                <div class="flex flex-col mb-[20px] mt-[30px]">
                    {{-- tags --}}
                    <label for="tags" class="mb-[15px]">Tags</label>
                    <input type="text" name="tags" class="bg-[#F7F6F3] p-[15px]">
                </div>
            </div>
            <div class="profile-more-info  flex-[2]">
                <div class="flex flex-col mb-[20px]">
                    <label for="title" class="mb-[15px] font-bold">Title</label>
                    <input type="text" name="title" class="bg-[#F7F6F3] p-[15px]">
                </div>
                <div class="flex flex-col mb-[20px]">
                    <label for="description" class="mb-[15px] font-bold">Description</label>
                    <textarea name="description" cols="30" rows="7" class="bg-[#F7F6F3] p-[15px] w-[100%]"></textarea>
                </div>
                <div class="flex flex-col mb-[20px]">
                    <label for="ingredients" class="mb-[15px] font-bold">Ingredients</label>
                    <textarea name="ingredients" cols="30" rows="7" class="bg-[#F7F6F3] p-[15px] w-[100%]">Put each ingredient on its own line</textarea>
                </div>
                <div class="flex flex-col mb-[20px]">
                    <label for="directions" class="mb-[15px] font-bold">Directions</label>
                    <textarea name="directions" cols="30" rows="7" class="bg-[#F7F6F3] p-[15px] w-[100%]">Put each steps on its own line</textarea>
                </div>
                <div class="mt-[60px] mb-[50px]">
                    <div class="terms mb-[20px] flex">
                      <div class="mr-[20px]">
                            <button class="bg-[#6FB43F] flex justify-center items-center w-[40px] h-[40px] rounded-[50%]">
                                ✔
                            </button>
                      </div>
                      <div>
                            <p class="text-[15px] text-[gray]">Public and submit this as a Kitchen Approved recipe. By choosing yes, you agree to the Terms & Conditions.</p>
                      </div>
                    </div>
                    <div class="sbmt flex gap-3">
                        <input class="text-[white] text-[16px] bg-[#f6941c] p-[15px] w-[220px]" type="submit" value="Save Recipe">
                        <button class="text-[gray] text-[16px] p-[15px] bg-[#F7F6F3] w-[120px]">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
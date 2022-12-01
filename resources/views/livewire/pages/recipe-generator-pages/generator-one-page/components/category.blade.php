<div class="categories mb-[20px]">
            <div><p class="text-[25px] text-[#f6941c] text-center mb-[20px]">sort by categories</p></div>
            <div class="circle-con grid grid-cols-6 gap-2 justify-around  mb-[20px]">
                @include('livewire.pages.recipe-generator-pages.generator-one-page.components.circle-categ')
                @include('livewire.pages.recipe-generator-pages.generator-one-page.components.circle-categ')
                @include('livewire.pages.recipe-generator-pages.generator-one-page.components.circle-categ')
                @include('livewire.pages.recipe-generator-pages.generator-one-page.components.circle-categ')
                @include('livewire.pages.recipe-generator-pages.generator-one-page.components.circle-categ')
                @include('livewire.pages.recipe-generator-pages.generator-one-page.components.circle-categ')
            </div>

            <div class="sort bg-[#F6B25F] rounded-[30px] grid grid-cols-7 gap-3 p-[20px] border border-sky-500">
                <div id="formcontainer" class="w-full border border-sky-500">
                    <form action="{{route('generator.form.submit')}}" class="form row w-full" method="POST" enctype="multipart/form-data" id="form_submit">
                        <div>
                            <label for="error" class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500">Your name</label>
                            <input type="text" id="error" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500" placeholder="Error input">
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, snapp!</span> Some error message.</p>
                          </div>
                    </form>
                </div>
                
            </div>
        </div>
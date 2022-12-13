<div class="generator-one">
    <div class="recipe-one-nav">@livewire('reusable.navbar')</div>
        <div class="generator-one-con w-[80%] m-[auto]">
            <div><p class="text-[30px] text-center mb-[30px] text-[#f6941c]">FIND RECIPE</p></div>
        <div>
            <!-- SEARCH -->
                @include('livewire.pages.recipe-generator-pages.generator-one-page.components.search')
            <!-- CATEGORIES -->
                @include('livewire.pages.recipe-generator-pages.generator-one-page.components.category')
            <!-- GALLERY RESULT -->
                @include('livewire.pages.recipe-generator-pages.generator-one-page.components.gallery-result')

                <div class="pagination con w-[100%] flex items-center justify-center">
                    <div id="pagination" class="d-block d-flex justify-content-center pt-2 mt-5">
                        {{ $dish->links('custom-paginate.paginate') }}
                     </div>
                </div>

        </div>
    </div>
</div>

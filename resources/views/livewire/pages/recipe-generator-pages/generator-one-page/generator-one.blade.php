<div class="generator-one">
    <div class="recipe-one-nav">@livewire('reusable.navbar')</div>
    <div class="generator-one-con w-[80%] m-[auto]">
        <div><p class="text-[30px] text-center mb-[30px] text-[#f6941c]">RECIPE GENERATOR</p></div>
        <div>
        <!-- SEARCH -->
            @livewire("pages.recipe-generator-pages.generator-one-page.components.search")
        <!-- CATEGORIES -->
            @livewire("pages.recipe-generator-pages.generator-one-page.components.category")
        <!-- GALLERY RESULT -->
            @livewire("pages.recipe-generator-pages.generator-one-page.components.gallery-result")
        </div>

    </div>
</div>

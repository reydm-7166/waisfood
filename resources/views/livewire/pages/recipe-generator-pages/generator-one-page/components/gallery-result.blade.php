
<div class="gallery rounded-[30px] bg-[#F6B25F] grid justify-center grid-cols-4 gap-[1.5] p-[10px] mt-[40px] border" id="recipe_list"> 
      @if(!$message)
            @foreach ($dish as $recipe) 
                  <div class="m-[5px] rounded-[20px] p-[15px] bg-[white]">@include('livewire.reusable.food-cards')</div>
            @endforeach
                 
      @endif
      <div class="border border-orange-500 flex justify-center">
            {{ $dish->links('custom-paginate.paginate') }}
      </div>

 </div>
 

     
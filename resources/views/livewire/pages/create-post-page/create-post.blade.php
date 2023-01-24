@extends('layout.app-in-use')

@section('body')
<div class="">
    <div class="mb-[20px]">
        @livewire('reusable.navbar')
    </div>

    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="w-[80%] m-[auto] flex items-center gap-8 font-bold mb-[20px]">
            <img class="rounded-[50%] w-[80px] h-[80px] bg-[gray]"  src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="profile pic">
            <p class="text-[20px]">Reymond Domingo</p>
        </div>
        <div class="w-[80%] m-[auto] flex gap-12 create-post">
            <div class="profile-info flex-1">
                <div class="mb-[15px] w-[100%] h-[300px] bg-[#F7F6F3] flex flex-col justify-center items-center hover:shadow border-1 border-blue-400">
                    <label for="image_upload" class="font-bold cursor-pointer">Add a Photo</label>
                    <label for="image_upload" class="mt-[13px] text-[13px] cursor-pointer">(no smaller than 960 x 960)</p>
                </div>

                <div class="shrink-0 text-center">
                    <label class="block">
                        <input type="file"
                            required
                            id="image_upload"
                            name="post_image[]"
                            class="block text-sm text-slate-500 bg-[#F7F6F3] p-[10px]
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-200 file:text-violet-700
                            hover:file:bg-violet-100"
                            placeholder="Add Images" accept="image/*" multiple>
                            @if($errors->first('post_image'))
                                <small class="form-text d-block text-red-500 fw-bold">{{ $errors->first('post_image') }}</small>
                            @endif
                    </label>
                </div>

                <div class="flex justify-between gap-4 mb-[10px] add-inp">
                    <div class="flex flex-col mb-[20px]">
                        {{-- <label for="preptime" class="mb-[15px]">Prep Time (optional)</label> --}}
                        <input type="hidden" name="preptime" class="bg-[#F7F6F3] p-[15px]">
                    </div>
                    <div class="flex flex-col mb-[20px]  ">
                        {{-- <label for="cooktime" class="mb-[15px]">Cook Time (optional)</label> --}}
                        <input type="hidden" name="cooktime" class="bg-[#F7F6F3] p-[15px]">
                    </div>
                </div>
                <div class="flex justify-between gap-4 mb-[10px] add-inp">
                    <div class="flex flex-col mb-[20px] ">
                        {{-- <label for="ready" class="mb-[15px]">Ready in (optional)</label> --}}
                        <input type="hidden" name="ready" class="bg-[#F7F6F3] p-[15px]">
                    </div>
                    <div class="flex flex-col mb-[20px]  ">
                        {{-- <label for="servings" class="mb-[15px]">Num of Servings (optional)</label> --}}
                        <input type="hidden" name="servings" class="bg-[#F7F6F3] p-[15px]  ">
                    </div>
                </div>

                <div class="flex flex-col mb-[20px] ">
                    {{-- tags --}}
                    <label for="tags" class="mb-[15px]">Tags</label>
                    <input type="text" name="post_tags" id="input_post_tags" class="bg-[#F7F6F3] p-[15px]" placeholder="Add Tags" value="{{ old('post_tags') }}">
                    @if($errors->first('post_tags'))
                        <small class="form-text d-block text-red-500 fw-bold">{{ $errors->first('post_tags') }}</small>
                    @endif

                </div>

            </div>
            <div class="profile-more-info flex-[2]">

                <div class="flex flex-col mb-[20px]">
                    <label for="input_post_title" class="mb-[15px] font-bold">Recipe Name</label>
                    <input type="text" name="recipe_name" id="input_post_title" class="bg-[#F7F6F3] p-[15px]" placeholder="Add Recipe Title" value="{{ old('recipe_name') }}">
                    @if($errors->first('recipe_name'))
                        <small class="form-text d-block text-red-500 fw-bold">{{ $errors->first('recipe_name') }}</small>
                    @endif
                </div>


                <div class="flex flex-col mb-[20px]">
                    <label for="recipe_description" class="mb-[15px] font-bold">Description <small class="fw-thin"><i>(50 char. minimum)</i></small></label>
                    <textarea name="recipe_description" required cols="30" rows="7" minlength="50" class="bg-[#F7F6F3] p-[15px] w-[100%]" placeholder="Say something about this recipe. Minimum of 50 characters"></textarea>
                    @if($errors->first('recipe_description'))
                        <small class="form-text d-block text-red-500 fw-bold">{{ $errors->first('recipe_description') }}</small>
                    @endif
                </div>

                <div class="flex flex-col mb-[20px]" id="ingredientField">
                    @php($index = 0)
                    @if (old('ingredients'))
                        {{-- If there are ingredients... --}}
                        {{-- ...iterate through other ingredients --}}
                        @foreach(old('ingredients') as $i)
                            <div class="col-12 form-group my-2" {{ $index == 0 ? 'id="origIngredientField"' : ''}}>
                                <label class="mb-[15px]" for="ingredients_{{ $index }}">Ingredient #{{ $index + 1 }}</label>
                                <input type="text"
                                class="bg-[#F7F6F3] mt-[15px] p-[15px] w-[100%] text-base focus:outline-none focus:border-green-400"
                                    name="ingredients[]"
                                    id="ingredients_{{ $index }}"
                                    value="{{ old('ingredients.' . $index) }}"
                                    placeholder="Ingredient {{$index}}">
                                <span class="text-red-500">{{ $errors->first('ingredients.' . $index++) }}</span>

                                <input required type="text"
                                    required
                                    class="bg-[#F7F6F3] mt-[15px] p-[15px] w-[100%] text-base focus:outline-none focus:border-green-400"
                                    name="measurements[]"
                                    id="measurements_{{ $index }}"
                                    placeholder="Measurement {{$index}}">
                            </div>
                        @endforeach
                    @else
                    {{-- Otherwise, just use the one liner --}}
                    <div class="col-12 form-group my-2 w-full" id="origIngredientField">
                        <label class="" for="ingredients_0">Ingredient #1</label>
                        <input type="text"
                                class="bg-[#F7F6F3] mt-[15px] p-[15px] w-[100%] text-base focus:outline-none focus:border-green-400"
                                name="ingredients[]"
                                id="ingredients_0"
                                value="{{ old('ingredients.0') }}"
                                placeholder="Ingredient 1">
                        <span class="text-red-500">{{ $errors->first('ingredients.' . $index++) }}</span>

                        <input type="text"
                                required
                                class="bg-[#F7F6F3] mt-[15px] p-[5px] w-[100%] text-sm focus:outline-none focus:border-green-400"
                                name="measurements[]"
                                id="measurements_0"
                                placeholder="Measurement">
                    </div>
                    @endif

                </div>
                <button
                        type="button"
                        class="px-6 py-2.5 bg-green-600 text-white font-medium text-base leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out"
                        id="addIngredient"
                        data-index="{{ $index }}"
                        data-target="#ingredientField"
                        data-to-clone="#origIngredientField"
                    >
                    Add Ingredient
                </button>



                <div class="flex flex-col mb-[20px]" id="directionField">
                    @php($index = 0)
                    @if (old('directions'))
                        {{-- If there are ingredients... --}}
                        {{-- ...iterate through other ingredients --}}
                        @foreach(old('directions') as $i)
                        <div class="col-12 form-group my-2" {{ $index == 0 ? 'id="origDirectionField"' : ''}}>
                            <label class="mb-[15px]" for="directions_{{ $index }}">Direction #{{ $index + 1 }}</label>
                            <input type="text"
                            class="bg-[#F7F6F3] mt-[15px] p-[15px] w-[100%] text-base focus:outline-none focus:border-green-400"
                                name="directions[]"
                                id="directions_{{ $index }}"
                                value="{{ old('directions.' . $index) }}"
                                placeholder="Direction {{$index}}">
                            <span class="text-red-500">{{ $errors->first('directions.' . $index++) }}</span>
                        </div>
                        @endforeach
                    @else
                    {{-- Otherwise, just use the one liner --}}
                    <div class="col-12 form-group my-2 w-full" id="origDirectionField">
                        <label class="" for="directions_0">Direction #1</label>
                        <input type="text"
                        class=" bg-[#F7F6F3] mt-[15px] p-[15px] w-[100%] text-base focus:outline-none focus:border-green-400"
                        name="directions[]"
                        id="directions_0"
                        value="{{ old('directions.0') }}"
                        placeholder="Direction 1">
                        <span class="text-red-500">{{ $errors->first('directions.' . $index++) }}</span>
                    </div>
                    @endif

                </div>
                <button
                        type="button"
                        class="px-6 py-2.5 bg-green-600 text-white font-medium text-base leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out"
                        id="addDirection"
                        data-index="{{ $index }}"
                        data-target="#directionField"
                        data-to-clone="#origDirectionField"
                    >
                    Add Direction
                </button>


                <div class="mt-[60px] mb-[50px]">
                    <div class="terms mb-[20px] flex">
                      <div class="mr-[20px]">
                            <button class="bg-[#6FB43F] flex justify-center items-center w-[40px] h-[40px] rounded-[50%]">
                                ✔
                            </button>
                      </div>
                      <div>
                            <p class="text-[15px] text-[gray]">By choosing yes, you agree to the Terms & Conditions.</p>
                            <small class="text-[12px] fs-italic text-[gray]">Note: This is still subjected for reviewing.</small>
                      </div>
                    </div>
                    <div class="sbmt flex gap-3">
                        {{-- <input class=" hover:" type="submit" value="Save Recipe"> --}}
                        <button type="submit" class="text-[white] text-[16px] bg-[#f6941c] p-[15px] w-[220px] hover:bg-[#f6941c]-700 hover:cursor-pointer hover:shadow-lg">
                            Save Recipe
                        </button>
                        <button class="text-[gray] text-[16px] p-[15px] bg-[#F7F6F3] w-[120px]">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection


@section('add_script_create-post')
    <script type="text/javascript">
        $(document).ready(() => {
            $("#addIngredient").on('click', (e) => {
                let obj = $(e.currentTarget);
                let index = parseInt(obj.attr('data-index'));
                let target =  $(obj.attr('data-target'));
                let toClone = $(obj.attr('data-to-clone'));

                // Clone the field and remove the id to prevent mishaps.
                let clone = toClone.clone().removeAttr("id");
                // Clean the input field.
                clone.find('input, textarea').val("");
                // Increment the "for" and "id" attributes, label number, then lastly, update the "data-index"
                let forField = $(`#${clone.find('label').attr("for")}`);
                let newFieldId = forField.attr("id").substr(0, forField.attr("id").lastIndexOf("_") + 1) + index;
                clone.find('label').attr("for", newFieldId);
                clone.find(`input#${forField.attr("id")}, textarea#${forField.attr("id")}`).attr("id", newFieldId);
                clone.find('label').text(clone.find('label').text().substr(0, clone.find('label').text().lastIndexOf("#") + 1) + (index + 1));
                obj.attr('data-index', ++index);
                // Append the cloned element to the target.
                target.append(clone);
            });


        $("#addDirection").on('click', (e) => {

            let obj = $(e.currentTarget);
            let index = parseInt(obj.attr('data-index'));
            let target =  $(obj.attr('data-target'));
            let toClone = $(obj.attr('data-to-clone'));
            console.log(target);
            // Clone the field and remove the id to prevent mishaps.
            let clone = toClone.clone().removeAttr("id");
            // Clean the input field.
            clone.find('input, textarea').val("");
            // Increment the "for" and "id" attributes, label number, then lastly, update the "data-index"
            let forField = $(`#${clone.find('label').attr("for")}`);
            let newFieldId = forField.attr("id").substr(0, forField.attr("id").lastIndexOf("_") + 1) + index;
            clone.find('label').attr("for", newFieldId);
            clone.find(`input#${forField.attr("id")}, textarea#${forField.attr("id")}`).attr("id", newFieldId);
            clone.find('label').text(clone.find('label').text().substr(0, clone.find('label').text().lastIndexOf("#") + 1) + (index + 1));
            obj.attr('data-index', ++index);
            // Append the cloned element to the target.
            target.append(clone);
        });
    });
    </script>
@endsection

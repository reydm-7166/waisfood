<div class="categories mb-[20px]">
	<div>
		<p class="text-[25px] text-[#f6941c] text-center">RECIPE GENERATOR</p>
	</div>

	<div class="sort gap-3 py-0 p-[20px] duration-150 ease-in-out">
		<form action="{{route('generator.form.submit')}}" class="w-full inline-block" method="POST" enctype="multipart/form-data" id="form_submit">
			@csrf

			{{-- ACTUAL FORM FIELDS --}}
			<div class="mt-2 w-100 flex flex-col" id="ingredientField">
				{{-- RECIPES WITH THIS INGREDIENT(S) "OR" RECIPES WITH ONLY THIS INGREDIENT(S) --}}
				<div id="input_container">
					{{-- INGREDIENT --}}
					<div id="input_forms">
						<label class="form-label" for="ingredients[]">Ingredients</label>
						@php($index = 0)
						@if (old('ingredients'))
							{{-- If there are ingredients... --}}
							{{-- ...iterate through other ingredients --}}
							@foreach(old('ingredients') as $i)
							<div class="my-2 w-full relative" {{ $index == 0 ? 'id="origIngredientField"' : ''}}>
								<input type="text" 
									class="w-[100%] bg-[#F7F6F3] p-[18px]"
									name="ingredients[]" 
									value="{{ old('ingredients.' . $index) }}"
									placeholder="Ingredient">
								<span class="text-danger">{{ $errors->first('ingredients.' . $index++) }}</span>
							</div>
							@endforeach
						@else
						{{-- Otherwise, just use the one liner --}}
						<div class="my-2 w-full relative" id="origIngredientField">
							<input type="text" 
								class="w-[100%] bg-[#F7F6F3] p-[18px]"
								name="ingredients[]" 
								value="{{ old('ingredients.0') }}"
								placeholder="Ingredient">
							<span class="text-danger">{{ $errors->first('ingredients.' . $index++) }}</span>
						</div>
						@endif
					</div>
					{{-- Otherwise, just skip this part completely --}}
				</div>

				<span class="text-danger mb-2">{{ $errors->first('ingredients') }}</span>
			</div>

			{{-- ACTION BUTTON --}}
			<div class="flex flex-col margin-x-auto">
				<label class="btn btn-secondary active" for="search_type_ONLY">
					<span><input type="radio" {{ old('search_type') == 'ONLY' ? 'checked' : (old('search_type') ? '' : 'checked') }} autocomplete="off" name="search_type" id="search_type_ONLY" value="ONLY" /> Find recipes that contains <b>only all these ingredients</b></span>
				</label>

				<label class="btn btn-secondary active" for="search_type_OR">
					<span><input type="radio" {{ old('search_type') == 'OR' ? 'checked' : '' }} autocomplete="off" name="search_type" id="search_type_OR" value="OR" /> Find recipes with <b>at least one of the ingredients</b></span>
				</label>
				
				<label class="btn btn-secondary active" for="search_type_AND">
					<span><input type="radio" {{ old('search_type') == 'AND' ? 'checked' : '' }} autocomplete="off" name="search_type" id="search_type_AND" value="AND" /> Find recipes that <b>contains all these ingredients</b></span>
				</label>
			</div>
				
			{{-- SUBMIT FOR THE FORM --}}
			<div id="disclaimer" class="w-1/5 inline-block align-top ml-5">
				<div class="col-12 flex flex-row my-2">
					<button 
						class="mx-5 px-6 py-2.5 bg-[#f6941c] text-white font-medium text-base leading-tight uppercase rounded shadow-md hover:bg-[#ffc278] hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:bg-[#ff8c00] active:shadow-lg transition duration-150 ease-in-out" 
						type="button" 
						id="addIngredient" 
						data-index="{{ $index }}" 
						data-target="#ingredientField" 
						data-to-clone="#origIngredientField">Add
					</button>

					<button 
						class="px-6 py-2.5 bg-[#f6941c] text-white font-medium text-base leading-tight uppercase rounded shadow-md hover:bg-[#ffc278] hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:bg-[#ff8c00] active:shadow-lg transition duration-150 ease-in-out" 
						type="submit">Submit
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
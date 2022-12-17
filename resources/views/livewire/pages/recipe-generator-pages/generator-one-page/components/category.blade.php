<div class="categories mb-[20px]">
	<div>
		<p class="text-[25px] text-[#f6941c] text-center mb-[20px]">GENERATE RECIPE</p>
	</div>

	<div class="sort bg-[#F6B25F] rounded-[30px] gap-3 p-[20px] duration-150 ease-in-out">
		<form action="{{route('generator.form.submit')}}" class="w-full inline-block" method="POST" enctype="multipart/form-data" id="form_submit">
			@csrf
			{{-- ACTUAL FORM FIELDS --}}
			<div class="col-12 mt-2  w-4/6 inline-block" id="ingredientField">
				{{-- RECIPES WITH THIS INGREDIENT(S) "OR" RECIPES WITH ONLY THIS INGREDIENT(S) --}}
				<div id="input_container">
					<div class="d-flex">
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
					</div>

					<hr class="w-100">
	
					{{-- INGREDIENT --}}
					<div id="input_forms">
						<label class="form-label" for="ingredients[]">Ingredients</label>
						@php($index = 0)
						@if (old('ingredients'))
							{{-- If there are ingredients... --}}
							{{-- ...iterate through other ingredients --}}
							@foreach(old('ingredients') as $i)
							<div class="col-12 form-group my-2 relative" {{ $index == 0 ? 'id="origIngredientField"' : ''}}>
								<input type="text" 
								class=" w-full px-4 py-2 text-base border-b-2 border-gray-400 focus:outline-none focus:border-green-400"
									name="ingredients[]" 
									value="{{ old('ingredients.' . $index) }}">
								<span class="text-danger">{{ $errors->first('ingredients.' . $index++) }}</span>
							</div>
							@endforeach
						@else
						{{-- Otherwise, just use the one liner --}}
						<div class="col-12 form-group my-2 w-2/6 relative" id="origIngredientField">
							<input type="text" 
							class=" w-full px-2 py-1 text-base border-b-2 border-gray-400 rounded-lg focus:outline-none focus:border-green-400"
							name="ingredients[]" 
							value="{{ old('ingredients.0') }}">
							<span class="text-danger">{{ $errors->first('ingredients.' . $index++) }}</span>
						</div>
						@endif
					</div>
					{{-- Otherwise, just skip this part completely --}}
				</div>

				<span class="text-danger mb-2">{{ $errors->first('ingredients') }}</span>
			</div>
				
			{{-- SUBMIT FOR THE FORM --}}
			<div id="disclaimer" class="w-1/5 inline-block align-top ml-5">
				<div class="col-12 flex flex-row my-2">
					<button 
						class="mx-5 px-6 py-2.5 bg-blue-400 text-white font-medium text-base leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out" 
						type="button" 
						id="addIngredient" 
						data-index="{{ $index }}" 
						data-target="#ingredientField" 
						data-to-clone="#origIngredientField">Add
					</button>

					<button 
						class="px-6 py-2.5 bg-blue-600 text-white font-medium text-base leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" 
						type="submit">Submit
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
@extends('generator.layout')

@section('content')
<div class="card m-auto">
	<h3 class="card-header text-center">Provide Ingredients</h3>

	<div class="card-body">
		<form action="{{ route('generator.form.submit') }}" class="form row" method="POST" enctype="multipart/form-data">
			@csrf

			{{-- ACTUAL FORM FIELDS --}}
			<div class="col-12 mt-2" id="ingredientField">

				{{-- INGREDIENT --}}
				@php($index = 0)
				@if (old('ingredients'))
					{{-- If there are ingredients... --}}
					{{-- ...iterate through other ingredients --}}
					@foreach(old('ingredients') as $i)
					<div class="col-12 form-group my-2" {{ $index == 0 ? 'id="origIngredientField"' : ''}}>
						<label class="form-label" for="ingredients_{{ $index }}">Ingredient #{{ $index + 1 }}</label>
						<input type="text" class="form-control" name="ingredients[]" id="ingredients_{{ $index }}" value="{{ old('ingredients.' . $index) }}">
						<span class="text-danger">{{ $errors->first('ingredients.' . $index++) }}</span>
					</div>
					@endforeach
				@else
				{{-- Otherwise, just use the one liner --}}
				<div class="col-12 form-group my-2" id="origIngredientField">
					<label class="form-label" for="ingredients_0">Ingredient #1</label>
					<input type="text" class="form-control" name="ingredients[]" id="ingredients_0" value="{{ old('ingredients.0') }}">
					<span class="text-danger">{{ $errors->first('ingredients.' . $index++) }}</span>
				</div>
				@endif
				{{-- Otherwise, just skip this part completely --}}
			</div>
			<span class="text-danger mb-2">{{ $errors->first('ingredients') }}</span>

			{{-- SUBMIT FOR THE FORM --}}
			<div class="col-12 d-flex flex-row my-2">
				<button class="btn btn-primary mr-2" type="button" id="addIngredient" data-index="{{ $index }}" data-target="#ingredientField" data-to-clone="#origIngredientField">Add Ingredient</button>
				<button class="btn btn-success mx-2" type="submit">Submit</button>
			</div>
		</form>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(() => {
		$(document).one('click submit', 'button[type=submit], input[type=submit]', (e) => {
			let obj = $(e.currentTarget);

			if (obj.hasClass('disabled')) {
				e.preventDefault();
			}
			else {
				obj.addClass('disabled');
			}
		});

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
	});
</script>
@endsection
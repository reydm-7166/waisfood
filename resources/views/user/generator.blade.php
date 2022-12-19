@extends('layout.app')

{{-- LESS // CSS --}}
@section('less_import')
	{{-- LIVEWIRE --}}
   
	<link rel="stylesheet/less" type="text/css" href="{{ asset('css/index.less') }}" />
	<script src="https://cdn.jsdelivr.net/npm/less" ></script>
	{{-- TAILWIND --}}
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	{{-- FONT STYLE --}}
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
		@import url('https://fonts.googleapis.com/css2?family= Lexend+Deca: wght@300;400 &display=swap');
	</style>
@endsection
{{-- jQuery --}}
@section('javascript')
	<script src="https://kit.fontawesome.com/4f2d93f234.js" crossorigin="anonymous"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="{{ asset('js/register_fade_success.js') }}"></script>
	<script src="{{ asset('js/ajax_generator.js') }}" type="text/javascript"></script>
	
@endsection

@section('page title')
	WaisFood PH
@endsection

@section('body')
	<main class="min-vh-100">


	{{-- <nav id="navigation_index" class="w-100 position-relative">
		@include('_partials._navigation_index')
	</nav> --}}

	{{-- SEARCH --}}
	

	@livewire('pagination')

	</div>

	</main>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(() => {
			$(document).one('click submit', 'button[type=submit], input[type=submit]', (e) => {
				let obj = $(e.currentTarget);
			});

			$("#addIngredient").on('click', (e) => {
				let obj = $(e.currentTarget);
				let index = parseInt(obj.attr('data-index'));
				let target =  $(obj.attr('data-target'));
				let toClone = $(obj.attr('data-to-clone'));
				let wireModel = 'wire:model';

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

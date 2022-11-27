@extends('generator.layout')

@section('content')
<div class="card m-auto w-50">
	<h3 class="card-header">Available Recipes</h3>
	
	<div class="card-body">
		<table class="table table-striped text-center align-middle">
			<thead>
				<tr>
					<th scope="col">Recipe</th>
					<th scope="col">Ingredients</th>
					<th scope="col"></th>
				</tr>
			</thead>

			<tbody>
				@if (isset($recipes))
					@forelse($recipes as $r)
					@php ($ingredients = [])
					<tr>
						<td scope="row">{{ $r->recipe_name }}</td>
						
						<td>
							<ul>
								@foreach($r->ingredients as $i)
								<li>{{ $i->ingredient }}</li>
								@php (array_push($ingredients, $i->ingredient))
								@endforeach
							</ul>
						</td>

						<td>
							{{-- COPY TO CLIPBOARD --}}
							<a href="javascript:void(0);" class="btn btn-primary" onclick="navigator.clipboard.writeText($(this).parent().find('textarea').text()); Swal.fire({title: `Ingredients copied`, position: `top`, showConfirmButton: false, toast: true, timer: `5000`, background: `#28a745`, customClass: {title: `text-white text-center`, content: `text-white`, popup: `px-3`}});">Copy recipe</a>
							<textarea class="d-none" rows="5">{{ implode(', ', $ingredients) }}</textarea>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="3" class="text-center">Nothing to show~</td>
					</tr>
					@endforelse
				@else
				<tr>
					<td colspan="3" class="text-center">Nothing to show~</td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
	
	<div class="card-footer">
		<a href="{{ route('generator.form.index') }}" class="btn btn-secondary">Go Back</a>
	</div>
</div>
@endsection
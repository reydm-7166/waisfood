@extends('layout.admin')

@section('title', 'User Management')

@section('css')

	
	<style>
		.font-and-color {
			color: #f3b363;
			font-family: 'Montserrat', sans-serif;

		}
		.font {
			font-family: 'Montserrat', sans-serif;
		}
	</style>
@endsection

@section('body')
<div class="overflow-x-auto pt-5">
	{{-- TABS --}}
	<ul class="nav nav-pills mb-3 flex justify-content-between" id="pills-tab" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link btn btn-outline-orange border mx-1 px-3 py-1" id="pills-recipe-tab" data-bs-toggle="pill" data-bs-target="#pills-recipe" type="button" role="tab" aria-controls="pills-recipe" aria-selected="true">Recipes</button>
		</li>

		<li>
			<form action="">
				<div class="dropdown">
					<a class="dropdown-toggle me-3 btn btn-outline-orange border" href="#" id="pills-tab" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="fa-solid fa-filter"></i> Filter
					</a>
				  
					<ul class="dropdown-menu me-3">
					  <li><a class="dropdown-item" href="#">Alphabetical (A-Z)</a></li>
					  <li><a class="dropdown-item" href="#">Alphabetical (Z-A)</a></li>
					</ul>
				  </div>
			</form>
		</li>
		
	</ul>

	
	{{-- <tr class="card-body my-2 py-3 shadow-sm fw-bold">
		<th class="text-orange border-0" colspan="12">Recipes<small class="ms-5 text-muted"><small>{{ count($arr) }} Total</small></small></th>
	</tr> --}}
	@livewire('content-management')
		
</div>
@endsection

@section('css')
<style type="text/css">
	.show-active[data-bs-toggle="collapse"] { transition: 0.25s ease-in-out; }
	.show-active[data-bs-toggle="collapse"]:not(.collapsed) { background-color: rgb(255 208 151); }
</style>
@endsection
@extends('layout.admin')

@section('title', 'Recipe Management')

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
	

	@livewire('content-management')
		
</div>
@endsection

@section('css')
<style type="text/css">
	.show-active[data-bs-toggle="collapse"] { transition: 0.25s ease-in-out; }
	.show-active[data-bs-toggle="collapse"]:not(.collapsed) { background-color: rgb(255 208 151); }
</style>
@endsection
@extends('_layouts.default')

@section('title', 'Create Page - Pages - Dashboard - '.config('app.name'))
@section('description', 'Create Page - Pages - Dashboard - '.config('app.name'))
@section('keywords', 'Create, Page, Pages, Dashboard, '.config('app.name'))

@push('styles')
	<link rel="stylesheet" href="{{ mix('/assets/dashboard/css/global.css') }}">
@endpush

@push('headScripts')
	<script async>
	'use strict';
	
	window.User = {!! Auth::check() ? Auth::user() : 'null' !!};
	
	window.Laravel = {'csrfToken': '{{ csrf_token() }}'};
	</script>
@endpush

@push('bodyScripts')
	<script async src="{{ mix('/assets/dashboard/js/global.js') }}"></script>
@endpush

@section('content')
		<div class="row wrapper">
			@include('dashboard._partials.sidebar')
			<div class="col-md-9 col-lg-9 main">
				@include('dashboard._partials.message')
				@include('dashboard._partials.pageTitle')
				<div class="row">
					<div class="col">
						<form name="" id="" class="" role="form" method="POST" action="{{ url('/dashboard/pages') }}">
							{{ csrf_field() }}
							<button type="submit" name="" id="" class="" title="">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection

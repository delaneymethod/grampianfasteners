@extends('_layouts.default')

@section('title', 'Delete Carousel - Carousels - '.config('app.name'))
@section('description', 'Delete Carousel - Carousels - '.config('app.name'))
@section('keywords', 'Delete, Carousel, Carousels, '.config('app.name'))

@push('styles')
	@include('cp._partials.styles')
@endpush

@push('headScripts')
	@include('cp._partials.headScripts')
@endpush

@push('bodyScripts')
	@include('cp._partials.bodyScripts')
@endpush

@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('cp._partials.sidebar')
			<div class="{{ $mainSmCols }} {{ $mainMdCols }} {{ $mainLgCols }} {{ $mainXlCols }} main">
				@include('cp._partials.message')
				@include('cp._partials.pageTitle')
				<div class="content padding bg-white">
					<p>Please confirm that you wish to delete the <strong>{{ $carousel->title }}</strong> carousel.</p>
					<p class="font-weight-bold text-warning"><i class="icon fa fa-exclamation-triangle" aria-hidden="true"></i>Caution: This action cannot be undone.</p>
					<form name="removeCarousel" id="removeCarousel" class="removeCarousel" role="form" method="POST" action="/cp/carousels/{{ $carousel->id }}">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<div class="spacer"></div>
						<div class="spacer" style="width: auto;margin-left: -15px;margin-right: -15px;margin-bottom: -30px;"><hr></div>
						<div class="form-buttons">
							@if ($currentUser->hasPermission('view_carousels'))
								<a href="/cp/carousels" title="Cancel" class="btn btn-link text-secondary" tabindex="2" title="Cancel">Cancel</a>
							@endif
							<button type="submit" name="submit_remove_carousel" id="submit_remove_carousel" class="pull-right btn btn-danger" tabindex="1" title="Delete">Delete</button>
						</div>
					</form>
				</div>
				@include('cp._partials.footer')
			</div>
		</div>
	</div>
@endsection

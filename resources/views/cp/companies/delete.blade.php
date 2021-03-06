@extends('_layouts.default')

@section('title', 'Delete Company - Companies - '.config('app.name'))
@section('description', 'Delete Company - Companies - '.config('app.name'))
@section('keywords', 'Delete, Company, Companies, '.config('app.name'))

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
					<p>Please confirm that you wish to delete the <strong>{{ $company->title }}</strong> company.</p>
					<p class="font-weight-bold text-warning"><i class="icon fa fa-exclamation-triangle" aria-hidden="true"></i>Caution: This action cannot be undone.</p>
					<form name="removeCompany" id="removeCompany" class="removeCompany" role="form" method="POST" action="/cp/companies/{{ $company->id }}">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<div class="spacer"></div>
						<div class="spacer" style="width: auto;margin-left: -15px;margin-right: -15px;margin-bottom: -30px;"><hr></div>
						<div class="form-buttons">
							@if ($currentUser->hasPermission('view_companies'))
								<a href="/cp/companies" title="Cancel" class="btn btn-link text-secondary" tabindex="2" title="Cancel">Cancel</a>
							@endif
							<button type="submit" name="submit_remove_company" id="submit_remove_company" class="pull-right btn btn-danger" tabindex="1" title="Delete">Delete</button>
						</div>
					</form>
				</div>
				@include('cp._partials.footer')
			</div>
		</div>
	</div>
@endsection
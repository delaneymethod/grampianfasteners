@extends('_layouts.default')

@section('title', 'Companies - '.config('app.name'))
@section('description', 'Companies - '.config('app.name'))
@section('keywords', 'Companies, '.config('app.name'))

@push('styles')
	<link rel="stylesheet" href="{{ mix('/assets/css/cp.css') }}">
@endpush

@push('headScripts')
@endpush

@push('bodyScripts')
	<script async src="{{ mix('/assets/js/cp.js') }}"></script>
	@include('cp._partials.listeners')
@endpush

@section('content')
	<div class="container-fluid">
		<div class="row">
			@include('cp._partials.sidebar')
			<div class="{{ $mainSmCols }} {{ $mainMdCols }} {{ $mainLgCols }} {{ $mainXlCols }} main">
				@include('cp._partials.message')
				@include('cp._partials.pageTitle')
				@if ($currentUser->hasPermission('create_companies'))
					<div class="row">
						<div class="col-12">
							<ul class="list-unstyled list-inline buttons">
								<li class="list-inline-item"><a href="/cp/companies/create" title="Add Company" class="btn btn-success"><i class="icon fa fa-plus" aria-hidden="true"></i>Add Company</a></li>
							</ul>
						</div>
					</div>
				@endif
				<div class="content padding bg-white">	
					<div class="spacer"></div>
					<table id="datatable" class="table table-striped table-bordered table-hover table-responsive" cellspacing="0" border="0" cellpadding="0" width="100%">
						<thead>
							<tr>
								<th class="align-middle">Title</th>
								<th class="align-middle no-sort">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($companies as $company)
								<tr>
									<td class="align-middle">{{ $company->title }}</td>
									@if ($currentUser->hasPermission('edit_companies') || ($currentUser->hasPermission('delete_companies') && $company->id != $currentUser->company_id))
										<td class="align-middle actions dropdown text-center" id="submenu">
											<a href="javascript:void(0);" title="Company Actions" class="dropdown-toggle" id="pageActions" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												@if ($currentUser->hasPermission('edit_companies'))
													<li class="dropdown-item gf-info"><a href="/cp/companies/{{ $company->id }}/edit" title="Edit Company"><i class="icon fa fa-pencil" aria-hidden="true"></i>Edit Company</a></li>
												@endif
												@if ($currentUser->hasPermission('delete_companies') && $company->id != $currentUser->company_id)
													<li class="dropdown-item gf-danger"><a href="/cp/companies/{{ $company->id }}/delete" title="Delete Company"><i class="icon fa fa-trash" aria-hidden="true"></i>Delete Company</a></li>
												@endif
											</ul>
										</td>
									@else
										<td class="align-middle">&nbsp;</td>
									@endif
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@include('cp._partials.footer')
			</div>
		</div>
	</div>
@endsection

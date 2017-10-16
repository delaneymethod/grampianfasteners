@extends('_layouts.default')

@section('title', 'Globals - '.config('app.name'))
@section('description', 'Globals - '.config('app.name'))
@section('keywords', 'Globals, '.config('app.name'))

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
				@if ($currentUser->hasPermission('create_globals'))
					<div class="row">
						<div class="col-12">
							<ul class="list-unstyled list-inline buttons">
								<li class="list-inline-item"><a href="/cp/globals/create" title="Add Global" class="btn btn-success"><i class="icon fa fa-plus" aria-hidden="true"></i>Add Global</a></li>
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
								<th class="align-middle">Handle</th>
								<th class="align-middle no-sort">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($globals as $global)
								<tr>
									<td class="align-middle">{{ $global->title }}</td>
									<td class="align-middle">{{ $global->handle }}</td>
									@if ($currentUser->hasPermission('edit_globals') || $currentUser->hasPermission('delete_globals'))
										<td class="align-middle actions dropdown text-center" id="submenu">
											<a href="javascript:void(0);" title="Global Actions" class="dropdown-toggle" id="pageActions" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												@if ($currentUser->hasPermission('edit_globals'))
													<li class="dropdown-item gf-info"><a href="/cp/globals/{{ $global->id }}/edit" title="Edit Global"><i class="icon fa fa-pencil" aria-hidden="true"></i>Edit Global</a></li>
												@endif
												@if ($currentUser->hasPermission('delete_globals'))
													<li class="dropdown-item gf-danger"><a href="/cp/globals/{{ $global->id }}/delete" title="Delete Global"><i class="icon fa fa-trash" aria-hidden="true"></i>Delete Global</a></li>
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
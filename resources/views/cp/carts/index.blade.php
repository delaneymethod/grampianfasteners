@extends('_layouts.default')

@section('title', 'Carts - '.config('app.name'))
@section('description', 'Carts - '.config('app.name'))
@section('keywords', 'Carts, '.config('app.name'))

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
					<table id="datatable" class="table table-hover" cellspacing="0" border="0" cellpadding="0" width="100%">
						<thead>
							<tr>
								<th class="align-middle d-none d-sm-table-cell d-md-table-cell d-lg-table-cell d-xl-table-cell">Instance</th>
								<th class="align-middle">User</th>
								<th class="align-middle d-none d-sm-none d-md-none d-lg-table-cell d-xl-table-cell">Location</th>
								<th class="align-middle text-center">Saved</th>
								<th class="align-middle text-center d-none d-sm-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Items</th>
								<th class="align-middle no-sort">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($carts as $cart)
								<tr>
									<td class="align-middle d-none d-sm-table-cell d-md-table-cell d-lg-table-cell d-xl-table-cell">{{ $cart->instance }}</td>
									<td class="align-middle">{{ $cart->user->first_name }} {{ $cart->user->last_name }}</td>
									<td class="align-middle d-none d-sm-none d-md-none d-lg-table-cell d-xl-table-cell">{{ str_replace('<br>', ', ', $cart->user->location->postal_address) }}</td>
									<td class="align-middle text-center"><span class="d-none d-sm-none d-md-none d-lg-inline d-xl-inline">{{ $cart->created_at }}</span><span class="d-inline d-sm-inline d-md-inline d-lg-none d-xl-none">{{ $cart->created_at->format('Y-m-d') }}</span></td>
									<td class="align-middle text-center d-none d-sm-none d-md-table-cell d-lg-table-cell d-xl-table-cell">{{ $cart->count() }}</td>
									<td class="align-middle actions dropdown text-center" id="submenu">
										<a href="javascript:void(0);" title="Cart Actions" rel="nofollow" class="dropdown-toggle needsclick" id="pageActions" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
										<ul class="dropdown-menu dropdown-menu-right">
											@if ($currentUser->hasPermission('view_carts'))
												<li class="dropdown-item gf-info"><a href="/cp/carts/{{ $cart->identifier }}" title="View Cart"><i class="icon fa fa-eye" aria-hidden="true"></i>View Cart</a></li>
											@endif
										</ul>
									</td>
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

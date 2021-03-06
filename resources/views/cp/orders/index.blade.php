@extends('_layouts.default')

@section('title', 'Orders - '.config('app.name'))
@section('description', 'Orders - '.config('app.name'))
@section('keywords', 'Orders, '.config('app.name'))

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
								<th class="align-middle no-sort">&nbsp;</th>
								<th class="align-middle">Order Number</th>
								<th class="align-middle d-none d-sm-table-cell d-md-table-cell d-lg-table-cell d-xl-table-cell">PO Number</th>
								<th class="align-middle d-none d-sm-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Location</th>
								<th class="align-middle d-none d-sm-none d-md-none d-lg-table-cell d-xl-table-cell">Date</th>
								<th class="align-middle no-sort">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($orders as $order)
								<tr>
									<td class="align-middle status text-center"><i id="order-{{ $order->id }}-status-icon" class="fa fa-circle fa-1 status_id-{{ $order->status->id }}" title="{{ $order->status->title }}" data-toggle="tooltip" data-placement="top" aria-hidden="true"></i></td>
									<td class="align-middle" data-search="{{ $order->po_number }} {{ $order->created_at->format('d F Y H:i:s A') }} {{ $order->postal_address }}">{{ $order->order_number }}{!! ($order->isPending()) ? '&nbsp;<span id="order-'.$order->id.'-status-badge" class="badge badge-pill badge-warning align-middle text-uppercase"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;'.$order->status->title.'</span>' : '' !!}</td>
									<td class="align-middle d-none d-sm-table-cell d-md-table-cell d-lg-table-cell d-xl-table-cell">{{ $order->po_number }}</td>
									<td class="align-middle d-none d-sm-none d-md-table-cell d-lg-table-cell d-xl-table-cell">{{ str_replace('<br>', ', ', $order->postal_address) }}</td>
									<td class="align-middle d-none d-sm-none d-none d-lg-table-cell d-xl-table-cell">{{ $order->created_at }}</td>
									@if ($currentUser->hasPermission('view_orders'))
										<td class="align-middle actions dropdown text-center" id="submenu">
											<a href="javascript:void(0);" title="Order Actions" rel="nofollow" class="dropdown-toggle needsclick" id="pageActions" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												@if ($currentUser->hasPermission('view_orders'))
													<li class="dropdown-item gf-info"><a href="/cp/orders/{{ $order->id }}" title="View Order"><i class="icon fa fa-eye" aria-hidden="true"></i>View Order</a></li>
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

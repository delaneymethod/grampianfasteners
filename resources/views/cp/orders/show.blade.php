@extends('_layouts.default')

@section('title', 'Order - Orders - '.config('app.name'))
@section('description', 'Order - Orders - '.config('app.name'))
@section('keywords', 'Order, Orders, '.config('app.name'))

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
					<div class="row">
						@if ($currentUser->isSuperAdmin())
							<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
								<h5>Order ID</h5>
								<p class="text-muted">{{ $order->id }}</p>
							</div>
							<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
								<h5>Order Solution ID</h5>
								<p class="text-muted">{{ $order->solution_id }}</p>
							</div>
						@endif
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<h5>Order Type</h5>
							<p class="text-muted">{{ $order->order_type->title }}</p>
						</div>
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<h5>Order Number</h5>
							<p class="text-muted">{{ $order->order_number }}</p>
						</div>
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<h5>PO Number</h5>
							<p class="text-muted">{{ $order->po_number }}</p>
						</div>
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<h5>Order Status</h5>
							<p id="order-{{ $order->id }}-status" class="status_id-{{ $order->status->id }}">{{ $order->status->title }}</p>
						</div>
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<h5>Order Date</h5>
							<p class="text-muted">{{ $order->created_at }}</p>
						</div>
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<h5>Originator</h5>
							<p class="text-muted">{{ $order->user->first_name }} {{ $order->user->last_name }}<br><a href="mailto:{{ $order->user->email }}" title="Email {{ $order->user->first_name }}" class="text-gf-red">{{ $order->user->email }}</a><br>@if (!empty($order->user->telephone) && !empty($order->user->mobile)){{ $order->user->telephone }} / {{ $order->user->mobile }}@elseif (!empty($order->user->telephone)){{ $order->user->telephone }}@elseif (!empty($order->user->mobile)){{ $order->user->mobile }}@endif</p>
						</div>
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<h5>Company</h5>
							<p class="text-muted">{{ $order->user->company->title }}</p>
						</div>
					</div>
					<div class="row">
						<div class="spacer"></div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<h5>Order Billing Location</h5>
							<p class="text-muted">{{ $order->user->location->title }}<br>{!! nl2br($order->user->location_postal_address) !!}</p>
						</div>
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<h5>Order Shipping Location</h5>
							<p class="text-muted">{!! nl2br($order->postal_address) !!}</p>
						</div>
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<h5>Order Shipping Method</h5>
							<p class="text-muted">{{ $order->shipping_method->title }}</p>
						</div>
					</div>
					<div class="row">
						<div class="spacer"></div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<h5>Order Notes</h5>
							<p class="text-muted">{{ $order->notes ?? 'N/A' }}</p>
						</div>
					</div>
					<div class="row">
						<div class="spacer"></div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<h5>Order Items</h5>
							<table class="text-muted table table-responsive" cellspacing="0" border="0" cellpadding="0" width="100%">
								<thead>
									<tr class="bg-default text-white">
										<th class="align-middle">&nbsp;</th>
										<th class="align-middle">Product</th>
										<th class="align-middle">Product Commodity</th>
										<th class="align-middle text-center">Qty</th>
										<th class="align-middle text-center">Tax</th>
										<th class="align-middle text-right">Price</th>
										<th class="align-middle text-right">Total</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($order->product_commodities as $productCommodity)
										<tr>
											<td class="align-middle text-center"><a href="{{ $productCommodity->product->url }}" title="{{ $productCommodity->product->title }}" target="_blank" class="text-gf-info"><img src="/assets/img/loading.svg" data-src="{{ $productCommodity->product->image_url }}" data-src-retina="{{ $productCommodity->product->image_url }}" class="img-fluid" width="100px" alt="{{ $productCommodity->product->title }}"></a></td>
											<td class="align-middle">{{ $productCommodity->product->title }}</td>
											<td class="align-middle">{{ $productCommodity->title }}</td>
											<td class="align-middle text-center">{{ $productCommodity->pivot->quantity }}</td>
											<td class="align-middle text-center">{{ $productCommodity->pivot->tax_rate }}&#37;</td>
											<td class="align-middle text-right">{{ $order->currency }}{{ number_format($productCommodity->pivot->price, 2, '.', ',') }}</td>
											<td class="align-middle text-right">{{ $order->currency }}{{ number_format($productCommodity->pivot->price_tax, 2, '.', ',') }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<p>&nbsp;</p>
							<ul class="list-unstyled list-inline">
								<li class="list-inline-item"><a href="/cp/orders" title="View All Orders" class="btn btn-primary">View All Orders</a></li>
								<li class="list-inline-item"><a href="/cp/orders/{{ $order->id }}/pdf" title="Download PDF Version" class="btn btn-link text-secondary">Download PDF Version</a></li>
							</ul>
						</div>
					</div>
				</div>
				@include('cp._partials.footer')
			</div>
		</div>
	</div>
@endsection

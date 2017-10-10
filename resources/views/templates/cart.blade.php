			@php ($totalSavedCarts = $savedCarts->count())
			<div class="row">
				<div class="col-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
					<h3>{{ $page->title }}</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-12 spacer"></div>
			</div>
			@if (!empty($page->section1Content))
				<div class="row">
					<div class="col-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
						{!! $page->section1Content !!}
					</div>
				</div>
				<div class="row">
					<div class="col-12 spacer tall"></div>
				</div>
			@endif
			@if ($cart->count > 0)
				<div class="row">
					<div class="col-12 spacer tall"></div>
				</div>
				<div class="row">
					<div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-2 text-center text-sm-center text-md-center text-lg-left text-xl-left">
						<a href="/products" title="Browse Products" class="btn btn-outline-secondary">Browse Products</a>
						<div class="spacer d-block d-sm-block d-md-block d-lg-none d-xl-none"></div>
					</div>	
					<div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-2 text-center text-sm-center text-md-center text-lg-left text-xl-left">
						<a href="/cart/save" title="Save Cart for Later" class="btn btn-outline-secondary">Save Cart for Later</a>
						<div class="spacer d-block d-sm-block d-md-block d-lg-none d-xl-none"></div>
					</div>
					<div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-2 text-center text-sm-center text-md-center text-lg-left text-xl-left">
						@component('_components.cart.removeProductCommodity', [
							'id' => 0,
							'rowId' => '',
							'instance' => 'cart',
							'action' => 'delete_cart',
							'buttonLabel' => 'Empty Cart',
							'extraClasses' => 'btn btn-outline-warning'
						])
						@endcomponent
						<div class="spacer d-block d-sm-block d-md-none d-lg-none d-xl-none"></div>
					</div>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center text-sm-center text-md-center text-lg-right text-xl-right">
						<a href="/cart/checkout" title="Proceed to Checkout" class="btn btn-danger">Proceed to Checkout</a>
					</div>
				</div>
				<div class="row">
					<div class="col-12 spacer"></div>
				</div>	
				<div class="row">
					<div class="col-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
						<table class="table table-responsive" cellspacing="0" border="0" cellpadding="0" width="100%">
							<thead>
								<tr class="bg-default text-white very-tall">
									<th class="align-middle d-none d-sm-none d-md-block d-lg-block d-xl-block">&nbsp;</th>
									<th class="align-middle">Product</th>
									<th colspan="3" class="align-middle text-center">Qty</th>
									<th class="align-middle text-right">Price</th>
									<th class="align-middle text-right">Subtotal</th>
									<th class="align-middle d-none d-sm-none d-md-block d-lg-block d-xl-block">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($cart->product_commodities as $productCommodity)
									<tr>
										<td class="align-middle d-none d-sm-none d-md-block d-lg-block d-xl-block text-center"><a href="{{ $productCommodity->model->product->url }}" title="{{ $productCommodity->model->product->title }}" class="text-gf-blue-gray"><img src="/assets/img/loading.svg" data-src="{{ $productCommodity->model->product->image_url }}" class="lazyload img-fluid" width="100px" alt="{{ $productCommodity->model->product->title }}"></a></td>
										<td class="align-middle"><a href="{{ $productCommodity->model->product->url }}" title="{{ $productCommodity->model->product->title }}" class="text-gf-blue-gray">{{ $productCommodity->name }}</a></td>
										<td class="align-middle text-center">
											@component('_components.cart.updateProductCommodity', [
												'id' => $productCommodity->id, 
												'rowId' => $productCommodity->rowId,
												'instance' => 'cart',
												'quantity' => ($productCommodity->qty - 1),
												'buttonLabel' => '<i class="fa fa-minus" aria-hidden="true"></i>',
												'extraClasses' => 'btn-styled-gf-blue-gray'
											])
											@endcomponent
										</td>
										<td class="align-middle text-center">{{ $productCommodity->qty }}</td>
										<td class="align-middle text-center">
											@component('_components.cart.updateProductCommodity', [
												'id' => $productCommodity->id, 
												'rowId' => $productCommodity->rowId,
												'instance' => 'cart',
												'quantity' => ($productCommodity->qty + 1),
												'buttonLabel' => '<i class="fa fa-plus" aria-hidden="true"></i>',
												'extraClasses' => 'btn-styled-gf-blue-gray'
											])
											@endcomponent
										</td>
										<td class="align-middle text-right">{{ $productCommodity->price() }}</td>
										<td class="align-middle text-right">{{ $productCommodity->total() }}</td>
										<td class="align-middle d-none d-sm-none d-md-block d-lg-block d-xl-block text-center">
											@component('_components.cart.removeProductCommodity', [
												'id' => $productCommodity->id,
												'rowId' => $productCommodity->rowId,
												'instance' => 'cart',
												'action' => 'delete_product_commodity',
												'buttonLabel' => 'Remove',
												'extraClasses' => 'btn btn-link text-gf-blue-gray'
											])
											@endcomponent
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-12 spacer"></div>
				</div>
				<div class="row">
					<div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-2 text-center text-sm-center text-md-center text-lg-left text-xl-left">
						<a href="/products" title="Browse Products" class="btn btn-outline-secondary">Browse Products</a>
						<div class="spacer d-block d-sm-block d-md-block d-lg-none d-xl-none"></div>
					</div>	
					<div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-2 text-center text-sm-center text-md-center text-lg-left text-xl-left">
						<a href="/cart/save" title="Save Cart for Later" class="btn btn-outline-secondary">Save Cart for Later</a>
						<div class="spacer d-block d-sm-block d-md-block d-lg-none d-xl-none"></div>
					</div>
					<div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-2 text-center text-sm-center text-md-center text-lg-left text-xl-left">
						@component('_components.cart.removeProductCommodity', [
							'id' => 0,
							'rowId' => '',
							'instance' => 'cart',
							'action' => 'delete_cart',
							'buttonLabel' => 'Empty Cart',
							'extraClasses' => 'btn btn-outline-warning'
						])
						@endcomponent
						<div class="spacer d-block d-sm-block d-md-none d-lg-none d-xl-none"></div>
					</div>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center text-sm-center text-md-center text-lg-right text-xl-right">
						<a href="/cart/checkout" title="Proceed to Checkout" class="btn btn-danger">Proceed to Checkout</a>
					</div>
				</div>	
			@else
				<div class="row">
					<div class="col-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
						<p>There are currently no items in your cart!</p>
					</div>
				</div>
			@endif
			@if ($totalSavedCarts > 0)
				<div class="row">
					<div class="col-12 spacer very-tall"></div>
				</div>
				<div class="row">
					<div class="col-12 spacer very-tall"></div>
				</div>
				<div class="row">
					<div class="col-12 spacer very-tall"></div>
				</div>
				<div class="row">
					<div class="col-12 spacer very-tall"><hr></div>
				</div>
				<div class="row">
					<div class="col-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
						<h5>Saved Carts</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-12 spacer"></div>
				</div>
				<div class="row">
					<div class="col-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
						<p>You have {{ $totalSavedCarts }} saved cart{{ ($totalSavedCarts == 1) ? '' : 's' }}.</p>
						<p>Restoring a cart will merge all items into your current cart.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-12 spacer"></div>
				</div>
				<div class="row">
					<div class="col-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">	
						<table class="table table-responsive" cellspacing="0" border="0" cellpadding="0" width="100%">
							<thead>
								<tr class="bg-info text-white very-tall">
									<th class="align-middle">Date / Time</th>
									<th class="align-middle text-center">Items</th>
									<th class="align-middle">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($savedCarts as $savedCart)
									<tr class="very-tall">
										<td class="align-middle"><a href="/cp/carts/{{ $savedCart->identifier }}" title="View Cart" target="_blank" class="text-gf-blue-gray">{{ $savedCart->created_at }}</a></td>
										<td class="align-middle text-center">{{ $savedCart->content->count() }}</td>
										<td class="align-middle text-right"><a href="/cart/restore/{{ $savedCart->identifier }}" title="Restore Cart" class="text-gf-blue-gray">Restore Cart</a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
			@if ($wishlistCart->count > 0)
				<div class="row">
					<div class="col-12 spacer very-tall"></div>
				</div>
				<div class="row">
					<div class="col-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
						<h5>Wishlist</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-12 spacer"></div>
				</div>
				<div class="row">
					<div class="col-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
						<table class="table table-responsive" cellspacing="0" border="0" cellpadding="0" width="100%">
							<thead>
								<tr class="bg-info text-white very-tall">
									<th class="align-middle" colspan="4">Product</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($wishlistCart->product_commodities as $productCommodity)
									@php ($productCommodityProduct = $productCommodity->model->product)
									<tr>
										<td class="align-middle text-center d-none d-sm-none d-md-block d-lg-block d-xl-block"><a href="{{ $productCommodityProduct->url }}" title="{{ $productCommodityProduct->title }}" class="text-gf-blue-gray"><img data-src="{{ $productCommodityProduct->image_url }}" class="lazyload img-fluid" width="100px" alt="{{ $productCommodityProduct->title }}"></a></td>
										<td class="align-middle text-left"><a href="{{ $productCommodityProduct->url }}" title="{{ $productCommodityProduct->title }}" class="text-gf-blue-gray">{{ $productCommodity->name }}</a></td>
										<td class="align-middle text-center">	
											@component('_components.cart.addProductCommodity', [
												'id' => $productCommodity->id, 
												'instance' => 'cart', 
												'action' => 'remove_wishlist',
												'extraClasses' => 'btn btn-outline-success',
												'redirectTo' => ''
											])
											@endcomponent
										</td>
										<td class="align-middle text-center">	
											@component('_components.cart.removeProductCommodity', [
												'id' => $productCommodity->id,
												'rowId' => $productCommodity->rowId,
												'instance' => 'wishlist',
												'action' => 'delete_product_commodity',
												'buttonLabel' => 'Remove',
												'extraClasses' => 'btn btn-link text-gf-blue-gray'
											])
											@endcomponent
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>		
			@endif
			
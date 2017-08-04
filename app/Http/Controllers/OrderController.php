<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Traits\CartTrait;
use App\Http\Traits\UserTrait;
use App\Http\Traits\OrderTrait;
use App\Http\Traits\StatusTrait;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
	use CartTrait;
	use UserTrait;
	use OrderTrait;
	use StatusTrait;
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->middleware('auth');
	}

	/**
	 * Get orders view.
	 *
	 * @params	Request 	$request
	 * @return 	Response
	 */
   	public function index(Request $request)
	{
		$currentUser = $this->getAuthenticatedUser();
		
		if ($currentUser->hasPermission('view_orders')) {
			$title = 'Orders';
		
			$subTitle = $currentUser->company->title;
		
			$orders = $this->getOrders();
		
			return view('cp.orders.index', compact('currentUser', 'title', 'subTitle', 'orders'));
		}
		
		abort(403, 'Unauthorised action');
	}
	
	/**
     * Creates a new order.
     *
	 * @params Request 	$request
     * @return Response
     */
    public function store(Request $request)
    {
	    $currentUser = $this->getAuthenticatedUser();

		if ($currentUser->hasPermission('create_orders')) {
			// Remove any Cross-site scripting (XSS)
			$cleanedOrder = $this->sanitizerInput($request->all());
			
			// Get the cart instance
			$cart = $this->getCartInstance('cart');
			
			// Create our order based on cart content
			$cleanedOrder['products'] = [];
			
			foreach ($cart->products as $product) {
				array_push($cleanedOrder['products'], [
					'product_id' => $product->id,
					'quantity' => $product->qty,
					'price' => $product->price,
					'price_tax' => $product->priceTax,
					'tax_rate' => $product->taxRate,
				]);
			}
			
			$cleanedOrder['count'] = $cart->count;
			$cleanedOrder['tax'] = $cart->tax;
			$cleanedOrder['subtotal'] = $cart->subtotal;
			$cleanedOrder['total'] = $cart->total;
			
			$products = count($cart->products) - 1;
			
			// Set some dynamic rules to valid our order
			$rules = [];
			$rules['user_id'] = 'required|integer';
			
			foreach (range(0, $products) as $index) {
				$rules['products.'.$index.'.product_id'] = 'required|integer';
				$rules['products.'.$index.'.quantity'] = 'required|integer';
				$rules['products.'.$index.'.price'] = 'required|numeric';
				$rules['products.'.$index.'.price_tax'] = 'required|numeric';
				$rules['products.'.$index.'.tax_rate'] = 'required|numeric';
			}
			
			$rules['count'] = 'required|integer';
			$rules['tax'] = 'required|numeric';
			$rules['subtotal'] = 'required|numeric';
			$rules['total'] = 'required|numeric';
			
			// Make sure all the input data is what we actually save
			$validator = $this->validatorInput($cleanedOrder, $rules);

			if ($validator->fails()) {
				$message = '';
				
				$errors = [];
				
				foreach ($validator->errors()->messages() as $error) {
					array_push($errors, $error[0]);
				}
				
				$message = implode(' ', $errors);
				
				dd($message);
				
				abort(500, $message);
			}

			dd('so far so good');
			
			DB::beginTransaction();

			try {
				/*
				// Create new model
				$order = new Order;
	
				// Set our field data
				$order->_ = $cleanedOrder['-'];
				
				$order->save();
				*/
				
				// finally empty the cart instance
				$this->destroyCart();
			} catch (QueryException $queryException) {
				DB::rollback();
			
				Log::info('SQL: '.$queryException->getSql());

				Log::info('Bindings: '.implode(', ', $queryException->getBindings()));

				abort(500, $queryException);
			} catch (Exception $exception) {
				DB::rollback();

				abort(500, $exception);
			}

			DB::commit();

			return redirect('/cart/checkout/success');
		}

		abort(403, 'Unauthorised action');
    }
	
	/**
	 * Shows a form for editing a order.
	 *
	 * @params	Request 	$request
	 * @param	int			$id
	 * @return 	Response
	 */
   	public function edit(Request $request, int $id)
	{
		$currentUser = $this->getAuthenticatedUser();
		
		if ($currentUser->hasPermission('edit_orders')) {
			$title = 'Edit Order';
		
			$subTitle = $currentUser->company->title;
			
			$order = $this->getOrder($id);
			
			// Used to set user_id
			$users = $this->getUsers();
			
			// Used to set status_id
			$statuses = $this->getStatuses();
			
			return view('cp.orders.edit', compact('currentUser', 'title', 'subTitle', 'order', 'users', 'statuses'));
		}

		abort(403, 'Unauthorised action');
	}
	
	/**
	 * Updates a specific order.
	 *
	 * @params	Request 	$request
	 * @param	int			$id
	 * @return 	Response
	 */
   	public function update(Request $request, int $id)
	{
		$currentUser = $this->getAuthenticatedUser();

		if ($currentUser->hasPermission('edit_orders')) {
			// Remove any Cross-site scripting (XSS)
			$cleanedOrder = $this->sanitizerInput($request->all());

			$rules = $this->getRules('order');
			
			// Make sure all the input data is what we actually save
			$validator = $this->validatorInput($cleanedOrder, $rules);

			if ($validator->fails()) {
				return back()->withErrors($validator)->withInput();
			}
			
			DB::beginTransaction();

			try {
				// Create new model
				$order = $this->getOrder($id);
				
				// Set our field data
				$order->title = $cleanedOrder['title'];
				$order->user_id = $cleanedOrder['user_id'];
				$order->status_id = $cleanedOrder['status_id'];
				$order->updated_at = $this->datetime;
				
				$order->save();
			} catch (QueryException $queryException) {
				DB::rollback();
			
				Log::info('SQL: '.$queryException->getSql());

				Log::info('Bindings: '.implode(', ', $queryException->getBindings()));

				abort(500, $queryException);
			} catch (Exception $exception) {
				DB::rollback();

				abort(500, $exception);
			}

			DB::commit();

			flash('Order updated successfully.', $level = 'success');

			return redirect('/cp/orders');
		}

		abort(403, 'Unauthorised action');
	}
	
	/**
	 * Shows a form for deleting a order.
	 *
	 * @params	Request 	$request
	 * @param	int			$id
	 * @return 	Response
	 */
   	public function confirm(Request $request, int $id)
	{
		$currentUser = $this->getAuthenticatedUser();
		
		if ($currentUser->hasPermission('delete_orders')) {
			$order = $this->getOrder($id);
		
			$title = 'Delete Order';
			
			$subTitle = $currentUser->company->title;
			
			return view('cp.orders.delete', compact('currentUser', 'title', 'subTitle', 'order'));
		}

		abort(403, 'Unauthorised action');
	}
	
	/**
	 * Deletes a specific order.
	 *
	 * @params	Request 	$request
	 * @param	int			$id
	 * @return 	Response
	 */
   	public function delete(Request $request, int $id)
	{
		$currentUser = $this->getAuthenticatedUser();
		
		if ($currentUser->hasPermission('delete_orders')) {
			$order = $this->getOrder($id);
			
			DB::beginTransaction();

			try {
				$order->delete();
			} catch (QueryException $queryException) {
				DB::rollback();
			
				Log::info('SQL: '.$queryException->getSql());

				Log::info('Bindings: '.implode(', ', $queryException->getBindings()));

				abort(500, $queryException);
			} catch (Exception $exception) {
				DB::rollback();

				abort(500, $exception);
			}

			DB::commit();

			flash('Order deleted successfully.', $level = 'info');

			return redirect('/cp/orders');
		}

		abort(403, 'Unauthorised action');
	}
	
	/**
	 * Does what it says on the tin!
	 */
	public function flushOrdersCache() 
	{
		$this->flushCache('orders');	
	}
	
	/**
	 * Does what it says on the tin!
	 */
	public function flushOrderCache($order) 
	{
		$this->flushCache('orders:id:'.$order->id);
	}
}

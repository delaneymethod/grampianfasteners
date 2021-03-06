<?php
/**
 * @link      https://www.delaneymethod.com/cms
 * @copyright Copyright (c) DelaneyMethod
 * @license   https://www.delaneymethod.com/cms/license
 */
	
namespace App\Templates;

use Illuminate\View\View;
use App\Http\Traits\{ContentTrait, ProductTrait, CarouselTrait, ProductCategoryTrait, ProductCommodityTrait};

class ProductCategoryTemplate extends Template
{
	use ContentTrait, ProductTrait, CarouselTrait, ProductCategoryTrait, ProductCommodityTrait;
	
	protected $view = 'productCategory';
	
	public function prepare(View $view, array $parameters)
	{
		$currentUser = $parameters['currentUser'];
		
		$page = $this->getPageContent($parameters['page']);
		
		$cart = $parameters['cart'];
		
		$wishlistCart = $parameters['wishlistCart'];
		
		$productCategory = $parameters['productCategory'];
		
		// Grab all child product categories - ones published to the web and sorted
		$productCategories = $this->getProductCategoriesByParent($productCategory->id);
		
		$productCategories = $productCategories->whereStrict('publish_to_web', 1)->sortBy('sort_order');
		
		// Grab all products - if any - based on business rules, only product categories at the bottom of the chain have products
		$products = $this->getProductsByProductCategory($productCategory->id);
		
		$productAttributes = [];
		
		if ($products->count() > 0) {
			foreach ($products as $product) {
				foreach ($product->product_attributes as $productAttribute) {
					array_push($productAttributes, [
						'id' => $productAttribute->id,
						'title' => $productAttribute->title,
					]);
				}
			}
		}
		
		$productAttributes = collect($productAttributes)->unique()->toArray();
		
		$totalProducts = $this->getProductCount();
		
		$totalProductCommodities = $this->getProductCommodityCount();
		
		$totalProducts = number_format($totalProducts + $totalProductCommodities, 0, '.', ',');
		
		// Check if page has slider
		if (!empty($page->carousel)) {
			$carousel = $this->getCarousel($page->carousel);
			
			if (!empty($carousel->data)) {
				$carousel = json_decode($carousel->data, true);
			
				$images = [];
			
				$contents = [];
			
				foreach ($carousel as $key => $value) {
					if (preg_match('/image/i', $key)) {
						$images[] = $value;
					}
					
					if (preg_match('/content/i', $key)) {
						$contents[] = $value;
					}
				}
				
				$carousel = [];
				
				foreach ($images as $key => $value) {
					array_push($carousel, [
						'image' => $images[$key],
						'content' => $contents[$key],
					]);
				}
	
				$page->carousel = collect($carousel);
			} else {
				$page->carousel = null;
			}
		} else {
			$page->carousel = null;
		}
		
		$page->breadcrumbs = collect([]);
		
		$page->breadcrumbs->push([
			'title' => $page->title,
			'slug' => $page->slug,
			'url' => $page->url,
		]);
		
		// Try to get all product categories based on current product category url.
		$slugs = explode(DIRECTORY_SEPARATOR, $productCategory->url);
		
		// Remove "" and "browse"
		unset($slugs[0], $slugs[1]);
		
		$slugs = collect($slugs);
		
		collect($slugs)->each(function ($slug) use ($page) {
			$parentProductCategory = $this->getProductCategoryBySlug($slug);
			
			// Add each slug
			$page->breadcrumbs->push([
				'title' => $parentProductCategory->title,
				'slug' => $parentProductCategory->slug,
				'url' => $parentProductCategory->url,
			]);
		});
		
		// Convert inners to objects
		$page->breadcrumbs = $page->breadcrumbs->map(function ($row) {
			return (object) $row;
		});
		
		$page->title = $productCategory->title;
		
		$view->with(compact('currentUser', 'page', 'cart', 'wishlistCart', 'productCategory', 'productCategories', 'products', 'productAttributes', 'totalProducts'));
	}
}

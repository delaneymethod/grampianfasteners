<?php
/**
 * @link      https://www.delaneymethod.com/cms
 * @copyright Copyright (c) DelaneyMethod
 * @license   https://www.delaneymethod.com/cms/license
 */

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'App\Events\OrderCreatedEvent' => [
			'App\Listeners\OrderCreatedListener',
		],
		'App\Events\OrderUpdatedEvent' => [
			'App\Listeners\OrderUpdatedListener',
		],
		'App\Events\KeywordEvent' => [
			'App\Listeners\KeywordListener',
		],
		'Illuminate\Auth\Events\Login' => [
			'App\Listeners\UserLoginListener',
		],
	];
	
	/**
	 * Register any events for your application.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();
	}
}

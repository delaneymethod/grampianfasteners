<?php
/**
 * @link      https://www.delaneymethod.com/cms
 * @copyright Copyright (c) DelaneyMethod
 * @license   https://www.delaneymethod.com/cms/license
 */

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	    /**
		 * Added by Sean
		 *	- fixes creating indexes on MySQL versions less than 5.7.* when running Laravel 5.4.
		 * 	- Added 26/01/17 as our MySQL version is 5.6.34, shipped with MAMP Pro 4.1.
		 */
		Schema::defaultStringLength(191);
	}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
	    // Added by Sean - Sets the public path to this directory
		$publicPath = config('cms.public_path');
		
		$this->app['path.public'] = base_path().DIRECTORY_SEPARATOR.$publicPath;
	}
}

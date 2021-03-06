<?php
/**
 * @link      https://www.delaneymethod.com/cms
 * @copyright Copyright (c) DelaneyMethod
 * @license   https://www.delaneymethod.com/cms/license
 */

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		$now = Carbon::now()->format('Y-m-d H:i:s');
		
		$locations = [
			[
				'solution_id' => null,
				'title' => 'Dyce, Aberdeen',
				'unit' => '',
				'building' => 'Grampian House',
				'street_address_1' => 'Pitmedden Road',
				'street_address_2' => 'Dyce',
				'street_address_3' => '',
				'street_address_4' => '',
				'town_city' => 'Aberdeen',
				'postal_code' => 'AB21 0DP',
				'telephone' => '+44 1224 772 777',
				'county_id' => 33,
				'country_id' => 3,
				'company_id' => 2,
				'status_id' => 1,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'solution_id' => null,
				'title' => 'Westhill',
				'unit' => '',
				'building' => '',
				'street_address_1' => '3 Oak Crescent',
				'street_address_2' => '',
				'street_address_3' => '',
				'street_address_4' => '',
				'town_city' => 'Westhill',
				'postal_code' => 'AB32 6WQ',
				'telephone' => '+44 1224 123 456',
				'county_id' => 34,
				'country_id' => 3,
				'company_id' => 1,
				'status_id' => 1,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'solution_id' => null,
				'title' => 'Test Office 1',
				'unit' => '1',
				'building' => '1',
				'street_address_1' => 'Street Address 1',
				'street_address_2' => '',
				'street_address_3' => '',
				'street_address_4' => '',
				'town_city' => 'Test City 1',
				'postal_code' => 'AB01 1AB',
				'telephone' => '+44 1224 123 456',
				'county_id' => 1,
				'country_id' => 1,
				'company_id' => 2,
				'status_id' => 1,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'solution_id' => null,
				'title' => 'Test Office 2',
				'unit' => '2',
				'building' => '2',
				'street_address_1' => 'Street Address 2',
				'street_address_2' => '',
				'street_address_3' => '',
				'street_address_4' => '',
				'town_city' => 'Test City 2',
				'postal_code' => 'AB02 2AB',
				'telephone' => '+44 1224 123 456',
				'county_id' => 1,
				'country_id' => 1,
				'company_id' => 2,
				'status_id' => 1,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'solution_id' => null,
				'title' => 'Test Office 3',
				'unit' => '3',
				'building' => '3',
				'street_address_1' => 'Street Address 3',
				'street_address_2' => '',
				'street_address_3' => '',
				'street_address_4' => '',
				'town_city' => 'Test City 3',
				'postal_code' => 'AB03 3AB',
				'telephone' => '+44 1224 123 456',
				'county_id' => 1,
				'country_id' => 1,
				'company_id' => 2,
				'status_id' => 1,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'solution_id' => null,
				'title' => 'Test Office 4',
				'unit' => '4',
				'building' => '4',
				'street_address_1' => 'Street Address 4',
				'street_address_2' => '',
				'street_address_3' => '',
				'street_address_4' => '',
				'town_city' => 'Test City 4',
				'postal_code' => 'AB04 4AB',
				'telephone' => '+44 1224 123 456',
				'county_id' => 1,
				'country_id' => 1,
				'company_id' => 2,
				'status_id' => 1,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'solution_id' => null,
				'title' => 'Test Office 5',
				'unit' => '5',
				'building' => '5',
				'street_address_1' => 'Street Address 5',
				'street_address_2' => '',
				'street_address_3' => '',
				'street_address_4' => '',
				'town_city' => 'Test City 5',
				'postal_code' => 'AB05 5AB',
				'telephone' => '+44 1224 123 456',
				'county_id' => 1,
				'country_id' => 1,
				'company_id' => 2,
				'status_id' => 1,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'solution_id' => null,
				'title' => 'Test Office 6',
				'unit' => '6',
				'building' => '6',
				'street_address_1' => 'Street Address 6',
				'street_address_2' => '',
				'street_address_3' => '',
				'street_address_4' => '',
				'town_city' => 'Test City 61',
				'postal_code' => 'AB06 6AB',
				'telephone' => '+44 1224 123 456',
				'county_id' => 1,
				'country_id' => 1,
				'company_id' => 2,
				'status_id' => 1,
				'created_at' => $now,
				'updated_at' => $now,
			],
		];
		
		DB::table('locations')->delete();
		
		DB::table('locations')->insert($locations);
	}
}

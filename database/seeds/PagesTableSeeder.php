<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PagesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$now = Carbon::now()->format('Y-m-d H:i:s');
		
		$pages = [
			[
				'title' => 'Home',
				'slug' => '',
				'status_id' => 1,
				'content' => '<p>This is the homepage.</p>',
				'parent_id' => null,
				'lft' => 1,
				'rgt' => 2,
				'depth' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
		];

		DB::table('pages')->delete();

		DB::table('pages')->insert($pages);
	}
}
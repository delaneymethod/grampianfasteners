<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ArticleContentTableSeeder extends Seeder
{
	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		$now = Carbon::now()->format('Y-m-d H:i:s');

		$articleContents = [];
		
		DB::table('article_content')->delete();
		
		// DB::table('article_content')->insert($articleContents);
	}
}

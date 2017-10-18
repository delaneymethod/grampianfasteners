<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{
	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		$now = Carbon::now()->format('Y-m-d H:i:s');
		
		$fields = [
			
			// Homepage template fields
			[	
				'title' => 'Carousel',
				'handle' => 'carousel',
				'instructions' => 'Selecting a Carousel will override the Banner below, unless the Carousel is empty.',
				'options' => NULL,
				'field_type_id' => 6,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Banner Background Image',
				'handle' => 'bannerImage',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Banner Content',
				'handle' => 'bannerContent',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 1 Content',
				'handle' => 'section1Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			
			// Page template fields
			[	
				'title' => 'Banner Background Image',
				'handle' => 'bannerImage',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Banner Content',
				'handle' => 'bannerContent',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 1 Background Image',
				'handle' => 'section1Image',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Section 1 Content',
				'handle' => 'section1Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 2 Background Image',
				'handle' => 'section2Image',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Section 2 Content',
				'handle' => 'section2Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 3 Background Image',
				'handle' => 'section3Image',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Section 3 Content',
				'handle' => 'section3Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 4 Background Image',
				'handle' => 'section4Image',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Section 4 Content',
				'handle' => 'section4Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 5 Background Image',
				'handle' => 'section5Image',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Section 5 Content',
				'handle' => 'section5Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 6 Background Image',
				'handle' => 'section6Image',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Section 6 Content',
				'handle' => 'section6Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 7 Background Image',
				'handle' => 'section7Image',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Section 7 Content',
				'handle' => 'section7Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 8 Background Image',
				'handle' => 'section8Image',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Section 8 Content',
				'handle' => 'section8Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 9 Background Image',
				'handle' => 'section9Image',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Section 9 Content',
				'handle' => 'section9Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 10 Background Image',
				'handle' => 'section10Image',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Section 10 Content',
				'handle' => 'section10Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			
			// Contact template fields
			[	
				'title' => 'Banner Background Image',
				'handle' => 'bannerImage',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Banner Content',
				'handle' => 'bannerContent',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 1 Content',
				'handle' => 'section1Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			
			// Products template fields
			[	
				'title' => 'Banner Background Image',
				'handle' => 'bannerImage',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Banner Content',
				'handle' => 'bannerContent',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 1 Content',
				'handle' => 'section1Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			
			// Cart template fields
			[	
				'title' => 'Banner Background Image',
				'handle' => 'bannerImage',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Banner Content',
				'handle' => 'bannerContent',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 1 Content',
				'handle' => 'section1Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			
			// Checkout template fields
			[	
				'title' => 'Banner Background Image',
				'handle' => 'bannerImage',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Banner Content',
				'handle' => 'bannerContent',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 1 Content',
				'handle' => 'section1Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			
			// Articles template fields
			[	
				'title' => 'Banner Background Image',
				'handle' => 'bannerImage',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Banner Content',
				'handle' => 'bannerContent',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 1 Content',
				'handle' => 'section1Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			
			// Article template fields
			[	
				'title' => 'Banner Background Image',
				'handle' => 'bannerImage',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Banner Content',
				'handle' => 'bannerContent',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Article Image',
				'handle' => 'section1Image',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Article Excerpt',
				'handle' => 'section1Excerpt',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 2,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Article Content',
				'handle' => 'section1Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			
			// Manufacturers template fields
			[	
				'title' => 'Banner Background Image',
				'handle' => 'bannerImage',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 1,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[	
				'title' => 'Banner Content',
				'handle' => 'bannerContent',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'title' => 'Section 1 Content',
				'handle' => 'section1Content',
				'instructions' => NULL,
				'options' => NULL,
				'field_type_id' => 3,
				'required' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			
		];
		
		DB::table('fields')->delete();
		
		DB::table('fields')->insert($fields);
	}
}

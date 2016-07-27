<?php

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Inserts new Data to DataBase
        DB::table('pages')->truncate();
 		DB::table('pages')->insert([
			[
				'title'=>'About',
				'uri'=>'about',
				'content'=>'This is About Page',
				'parent_id'=> null,
				'lft' 	=> 3,
				'rgt' 	=> 8,
				'depth' => 0,
	 		],
			[
				'title'=>'Contact',
				'uri'=>'contact',
				'content'=>'This is Contact Page',
				'parent_id'=> 1,
				'lft' 	=> 4,
				'rgt' 	=> 5,
				'depth' => 1,
	 		],
			[
				'title'=>'FAQ',
				'uri'=>'faq',
				'content'=>'This is FAQ Page',
				'parent_id'=> 1,
				'lft' 	=> 6,
				'rgt' 	=> 7,
				'depth' => 1,
	 		],
			[
				'title'=>'Media',
				'uri'=>'media',
				'content'=>'This is Media Page',
				'parent_id'=> null,
				'lft' 	=> 1,
				'rgt' 	=> 2,
				'depth' => 0,
	 		],
	 					[
				'title'=>'Characters',
				'uri'=>'characters',
				'content'=>'This is Characters Page',
				'parent_id'=> null,
				'lft' 	=> 9,
				'rgt' 	=> 10,
				'depth' => 0
	 		],
	 	]);
    }
}

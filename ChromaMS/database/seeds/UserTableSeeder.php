<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
    DB::table('users')->truncate();
 	DB::table('users')->insert([
	[
		'name'=>'Heyder',
		'email'=>'heyder@chromanoid.com',
		'password'=>bcrypt('dude12345')
 	],
	[
		'name'=>'Ordis',
		'email'=>'Ordis@sephalon.com',
		'password'=>bcrypt('sephalonsuda')
	],
	]);
    }
}

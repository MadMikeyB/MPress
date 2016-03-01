<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder {

	public function run()
	{
 		factory(App\Post::class, 50)->create();
 	}

}
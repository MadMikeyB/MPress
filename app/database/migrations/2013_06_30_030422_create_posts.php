<?php

use Illuminate\Database\Migrations\Migration;

class CreatePosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table) {
				$table->increments('id');
				$table->string('title', 128);
				$table->string('title_seo', 128);
				$table->text('body');
				$table->integer('author_id');
				$table->timestamps();
			}
		);
		
		DB::table('posts')->insert(array(
 				'title'		=>	'Hello World!',
 				'title_seo'	=>	'hello_world',
 				'body'		=>	'This is a sample post. You can edit or delete it! :)',
				'author_id'	=>	'1',
			)
		);

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
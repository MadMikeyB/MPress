<?php

use Illuminate\Database\Migrations\Migration;

class CreatePages extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function($table) {
				$table->increments('id');
				$table->string('title', 128);
				$table->string('slug', 128);
				$table->text('body');
				$table->integer('author_id');
				$table->timestamps();
			}
		);
		
		DB::table('pages')->insert(array(
 				'title'		=>	'Sample Page',
 				'slug'		=>	'sample_page',
 				'body'		=>	'This is a sample page. You can edit or delete it! :)',
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
		Schema::drop('pages');
	}

}
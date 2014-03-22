<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('username', 128);
			$table->string('nickname', 128);
			$table->string('password', 64);
			$table->timestamps();
			}
		);

			DB::table('users')->insert(array(
			 	'username' => 'admin',
			 	'nickname' => 'Admin',
			 	'password' => Hash::make('password')
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
		Schema::drop('users');
	}

}
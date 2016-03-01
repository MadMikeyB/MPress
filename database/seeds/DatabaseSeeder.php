<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	protected $toTruncate = ['users', 'posts'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
    	if ( env('APP_ENV') === 'local' )
    	{
	    	foreach ( $this->toTruncate as $table )
	    	{
	    		DB::table($table)->truncate();
	    	}
    	}

        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}

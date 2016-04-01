<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenuSeeder extends Seeder
{

	protected $defaultItems = ['Home'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$i = 1;
	    foreach ( $this->defaultItems as $item )
	    {
	    	Menu::create(
            	[
            		'title'   	=> $item,
            		'url'		=> $this->app->make('url')->to('/'),
            		'position'	=> $i,
            		'group'		=> '3' // public
            	]
        	);

        	$i++;
	    }
    }
}

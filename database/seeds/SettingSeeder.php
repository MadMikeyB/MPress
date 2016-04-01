<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{

	protected $defaultItems = [
								'home_page' 	=> 'default', 
								'theme_name' 	=> 'baseline',
							];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$i = 1;
	    foreach ( $this->defaultItems as $key => $value )
	    {
	    	Setting::create(
            	[
            		'key'   	=> $key,
            		'value'		=> $value,
            	]
        	);

        	$i++;
	    }
    }
}

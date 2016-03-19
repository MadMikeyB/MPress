<?php

use Illuminate\Database\Seeder;
use App\UserGroup;

class GroupSeeder extends Seeder {

	protected $defaultGroups = ['Admin', 'Editor', 'Member'];


	public function run()
	{	

	    foreach ( $this->defaultGroups as $group )
	    {
	    	UserGroup::create(
            	['group_name'   => $group]
        	);
	    }


 	}

}
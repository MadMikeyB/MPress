<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
	public function login()
	{
		$user = App\User::find('3');
		$this->be($user);
	}

    public function testPostCreation()
    {
    	$this->visit('/');

    	$this->click('Posts');
    	$this->seePageIs('/posts');
    	// $this->see('create_post');
    	// $this->login();
    	// $this->click('create_post');
    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
	protected $email;
	protected $username;
	protected $password;

	public function __construct()
	{
		$this->email = 'john'.rand('1','100').'@doe.com';
		$this->username = 'JohnDoe'.rand('1','10');
		$this->password = 'password';
	}


    public function testUserCreation()
    {
    	// Visit Home Page
    	$this->visit('/');
    	// Click Register
    	$this->click('Register');
    	// See URL is /register
    	$this->seePageIs('/register');
    	// Fill out Form
    	$this->type($this->username, 'name');
    	$this->type($this->email, 'email');
    	$this->type($this->password, 'password');
    	$this->type($this->password, 'password_confirmation');
    	// Click Log In 
    	$this->press('Log In');
    	// See URL is dashboard
    	$this->seePageIs('/dashboard');
    	// See Welcome Back, Username
    	$this->see('Welcome Back, '. $this->username);
    	// Check User is created in DB
		$this->seeInDatabase('users', ['email' => $this->email]);

    }

    public function testUserLogin()
    {
    	// Visit Home Page
    	$this->visit('/');
    	// Click Log In
    	$this->click('Log In');
    	// See URL is /login
    	$this->seePageIs('/login');
    	// Fill out form
    	$this->type('demo@demo.com', 'email');
    	$this->type('password', 'password');    	
    	// Click Log In
    	$this->press('Log In');
    	// See URL is Dashboard
    	$this->seePageIs('/dashboard');
    	// See Welcome Back, Username
       	$this->see('Welcome Back, Demo');
    }


}

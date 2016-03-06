<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateUserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserCreation()
    {
    	// Visit Home Page
    	$this->visit('/');
    	// Click Register
    	$this->click('Register');
    	// See URL is /register
    	$this->seePageIs('/register');
    	// Fill out Form
    	$email = 'john'.rand('1','10').'@doe.com';
    	$username = 'JohnDoe_'.rand('1','10');
    	$this->type($username, 'name');
    	$this->type($email, 'email');
    	$this->type('password', 'password');
    	$this->type('password', 'password_confirmation');
    	// Click Log In 
    	$this->press('Log In');
    	// See URL is dashboard
    	$this->seePageIs('/dashboard');
    	// See Welcome Back, Username
    	$this->see('Welcome Back, '. $username);
    }
}

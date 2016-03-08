<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAuthentication()
    {
    	$response = $this->call('POST', '/api/auth/login', ['email' => 'administrateur@madera.local', 'password' => 'admin']);

    	$this->assertEquals(200, $response->status());
    }
}

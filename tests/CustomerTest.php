<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerTest extends TestCase
{

	use WithoutMiddleware;

    /**
     * Test for get all customers.
     *
     * @return void
     */
    public function testGetCustomers()
    {
    	$response = $this->call('GET', '/api/customer');

    	$this->assertEquals(200, $response->status());
    }

    /**
     * Test for create customer.
     *
     * @return void
     */
    public function testPostCustomer()
    {
    	$response = $this->call('POST', '/api/customer', [
    		'lastname' 	  => 'Richard',
    		'firstname'   => 'Romain',
    		'email' 	  => 'romain.19@gmail.com',
    		'adr_street'  => '16 rue dulong',
    		'adr_zipcode' => '76000',
    		'adr_city'    => 'Rouen',
    	]);

    	$this->assertEquals(200, $response->status());
    }
}

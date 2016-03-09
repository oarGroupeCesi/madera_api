<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerTest extends TestCase
{

	use WithoutMiddleware;

    /**
     * Test to get all customers.
     *
     * @return void
     */
    public function testGetCustomers()
    {
    	$response = $this->call('GET', '/api/customer');

    	$this->assertEquals(200, $response->status());
    }

    /**
     * Test to create customer.
     *
     * @return void
     */
    public function testPostCustomer()
    {

        // Create a user with test@test.com for his email to test success status
    	$response = $this->call('POST', '/api/customer', [
    		'lastname' 	  => 'Richard',
    		'firstname'   => 'Romain',
    		'email' 	  => 'test@test.com',
    		'adr_street'  => '16 rue dulong',
    		'adr_zipcode' => '76000',
    		'adr_city'    => 'Rouen',
    	]);

    	$this->assertEquals(200, $response->status());

        // Create a user with like email to test wrong status
        $response = $this->call('POST', '/api/customer', [
            'lastname'    => 'Richard',
            'firstname'   => 'Romain',
            'email'       => 'test@test.com',
            'adr_street'  => '16 rue dulong',
            'adr_zipcode' => '76000',
            'adr_city'    => 'Rouen',
        ]);

        $this->assertEquals(400, $response->status());

        // Create a user with an wrong format for email
        $response = $this->call('POST', '/api/customer', [
            'lastname'    => 'Richard',
            'firstname'   => 'Romain',
            'email'       => 'testst.com',
            'adr_street'  => '16 rue dulong',
            'adr_zipcode' => '76000',
            'adr_city'    => 'Rouen',
        ]);

        $this->assertEquals(400, $response->status());
    }

    /**
     * Test to get customer by id.
     *
     * @return void
     */
    public function testGetCustomerById()
    {
        // Test with customer exist
        $response = $this->call('GET', '/api/customer/1');
        $this->assertEquals(200, $response->status());

        // Test with customer does not exist
        $response = $this->call('GET', '/api/customer/13');
        $this->assertEquals(404, $response->status());
    }

    /**
     * Test to update customer.
     *
     * @return void
     */
    public function testPutCustomer()
    {

        // Test to update user exist
        $response = $this->call('PUT', '/api/customer/1', [
            'lastname'    => 'Richard',
            'firstname'   => 'Pierro',
        ]);
        $this->assertEquals(200, $response->status());

        // Test to update user exist
        $response = $this->call('PUT', '/api/customer/4', [
            'lastname'    => 'Richard',
            'firstname'   => 'Pierro',
        ]);
        $this->assertEquals(404, $response->status());
    }

    /**
     * Test to delete customer.
     *
     * @return void
     */
    public function testDeleteCustomer()
    {

        // Test to delete user exist
        $response = $this->call('DELETE', '/api/customer/1');
        $this->assertEquals(200, $response->status());

        // Test to delete user exist
        $response = $this->call('DELETE', '/api/customer/4');
        $this->assertEquals(404, $response->status());
    }
}

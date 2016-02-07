<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerTest extends TestCase
{

	use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCustomerIndex()
    {
        $this->get('/api/customer')
             ->seeJsonStructure([
                 '*' => [
                 	'id',
                 	'lastname',
                 	'firstname',
                 	'email',
                 	'adr_street',
                 	'adr_zipcode',
                 	'adr_city',
                 	'created_at',
                 	'updated_at',
                 ]
             ]);
    }
}

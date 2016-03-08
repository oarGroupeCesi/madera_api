<?php

use Illuminate\Database\Seeder;

class ComponentModulenatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Mûr extérieur
    	for ($i=1; $i < 13; $i++) { 
	        DB::table('component_modulenature')->insert([
	        	'quantity' => 10,
	        	'component_id' => $i,
	        	'modulenature_id' => 1,
	        ]);
    	}


    }
}

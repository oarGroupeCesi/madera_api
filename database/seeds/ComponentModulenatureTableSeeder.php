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

        // Cloison intérieure
        for ($i=1; $i < 6; $i++) { 
            DB::table('component_modulenature')->insert([
                'quantity' => 13,
                'component_id' => $i,
                'modulenature_id' => 2,
            ]);
        }

        // Plancher sur dalle
        for ($i=1; $i < 8; $i++) { 
            DB::table('component_modulenature')->insert([
                'quantity' => 24,
                'component_id' => $i,
                'modulenature_id' => 3,
            ]);
        }

        // Plancher porteur
        for ($i=1; $i < 4; $i++) { 
            DB::table('component_modulenature')->insert([
                'quantity' => 35,
                'component_id' => $i,
                'modulenature_id' => 4,
            ]);
        }

        // Ferme de charpente
        for ($i=1; $i < 10; $i++) { 
            DB::table('component_modulenature')->insert([
                'quantity' => 50,
                'component_id' => $i,
                'modulenature_id' => 5,
            ]);
        }

        // Couverture
        for ($i=1; $i < 13; $i++) { 
            DB::table('component_modulenature')->insert([
                'quantity' => 100,
                'component_id' => $i,
                'modulenature_id' => 6,
            ]);
        }
    }
}

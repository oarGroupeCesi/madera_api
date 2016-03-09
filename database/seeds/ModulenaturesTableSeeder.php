<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ModulenaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modulenatures')->insert([
            'name'       => 'Mûr extérieur',
            'unity'      => 'M linéaire',
            'price'      => 2000,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('modulenatures')->insert([
            'name'       => 'Cloison intérieure',
            'unity'      => 'M linéaire',
            'price'      => 2300,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('modulenatures')->insert([
            'name'       => 'Plancher sur dalle',
            'unity'      => 'M2',
            'price'      => 3000,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('modulenatures')->insert([
            'name'       => 'Plancher porteur',
            'unity'      => 'M2',
            'price'      => 1900,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('modulenatures')->insert([
            'name'       => 'Ferme de charpente',
            'unity'      => 'Unité',
            'price'      => 2500,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('modulenatures')->insert([
            'name'       => 'Couverture',
            'unity'      => 'M2',
            'price'      => 5000,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);
    }
}

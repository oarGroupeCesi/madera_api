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
            'name' => 'Mûr extérieur',
            'unity' => 'M linéaire',
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('modulenatures')->insert([
            'name' => 'Cloison intérieure',
            'unity' => 'M linéaire',
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('modulenatures')->insert([
            'name' => 'Plancher sur dalle',
            'unity' => 'M2',
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('modulenatures')->insert([
            'name' => 'Plancher porteur',
            'unity' => 'M2',
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('modulenatures')->insert([
            'name' => 'Ferme de charpente',
            'unity' => 'Unité',
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('modulenatures')->insert([
            'name' => 'Couverture',
            'unity' => 'M2',
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);
    }
}

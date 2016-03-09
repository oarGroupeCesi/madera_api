<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('components')->insert([
            'name' => 'Lisse',
            'price' => 10,
            'section_cm' => 25,
            'componentnature_id' => 1,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('components')->insert([
            'name' => 'Montant vertical',
            'price' => 20,
            'section_cm' => 100,
            'componentnature_id' => 2,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('components')->insert([
            'name' => 'Contrefort',
            'price' => 50,
            'section_cm' => 25,
            'componentnature_id' => 1,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('components')->insert([
            'name' => 'Sabot métallique',
            'price' => 35,
            'section_cm' => 32,
            'componentnature_id' => 1,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('components')->insert([
            'name' => 'Contrefort',
            'price' => 50,
            'section_cm' => 25,
            'componentnature_id' => 1,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('components')->insert([
            'name' => 'Bardage',
            'price' => 75,
            'thickness_mm' => 120,
            'componentnature_id' => 4,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('components')->insert([
            'name' => 'Pare-pluie',
            'price' => 120,
            'thickness_cm' => 10,
            'componentnature_id' => 3,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('components')->insert([
            'name' => 'Tasseau',
            'price' => 34,
            'section_cm' => 120,
            'componentnature_id' => 1,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('components')->insert([
            'name' => 'Panneau coupe vent',
            'price' => 150,
            'thickness_mm' => 110,
            'componentnature_id' => 4,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('components')->insert([
            'name' => 'Isolant',
            'price' => 40,
            'thickness_cm' => 5,
            'componentnature_id' => 3,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('components')->insert([
            'name' => 'Pare-vapeur',
            'price' => 75,
            'thickness_mm' => 130,
            'componentnature_id' => 4,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('components')->insert([
            'name' => 'Panneau de platre',
            'price' => 75,
            'thickness_mm' => 120,
            'componentnature_id' => 4,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);
    }
}

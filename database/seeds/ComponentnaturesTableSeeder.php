<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ComponentnaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('componentnatures')->insert([
            'name' => 'Montant en bois pour la structure',
            'unity' => 'Longueur en cm',
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('componentnatures')->insert([
            'name' => 'Eléments de montage, sabots métalliques, boulons, gougeons',
            'unity' => 'Pièce',
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('componentnatures')->insert([
            'name' => 'Panneaux d\'isolation et pare-pluie',
            'unity' => 'Surface en M2',
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('componentnatures')->insert([
            'name' => 'Panneaux intermédiaires et de couverture',
            'unity' => 'Surface en M2',
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('componentnatures')->insert([
            'name' => 'Planchers',
            'unity' => 'Surface en M2',
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('componentnatures')->insert([
            'name' => 'Couverture',
            'unity' => 'Surface en M2',
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);
    }
}

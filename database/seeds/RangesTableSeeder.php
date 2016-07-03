<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ranges')->insert([
            'name' => 'Gamme - bois - biologique - chaume - Sans angle',
            'exterior_finish' => 'wood',
            'insulating' => 'biological',
            'top' => 'thatch',
            'configuration' => 'without_angle',
            'template' => 1,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone'))
        ]);

        DB::table('ranges')->insert([
            'name' => 'Gamme - crépis - biologique - ardoise - Avec angle fermant',
            'exterior_finish' => 'roughcast',
            'insulating' => 'biological',
            'top' => 'slate',
            'configuration' => 'with_closing_angle',
            'template' => 1,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);

        DB::table('ranges')->insert([
            'name' => 'Gamme - bois - naturel - chaume - Avec angle ouvrant',
            'exterior_finish' => 'wood',
            'insulating' => 'natural',
            'top' => 'thatch',
            'configuration' => 'with_opening_angle',
            'template' => 1,
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Range - wood - biological - thatch - Without angle',
            'exterior_finish' => 'wood',
            'insulating' => 'biological',
            'top' => 'thatch',
            'configuration' => 'Without angle',
            'template' => 1
        ]);

        DB::table('ranges')->insert([
            'name' => 'Range - roughcast - biological - slate - With closing angle',
            'exterior_finish' => 'roughcast',
            'insulating' => 'biological',
            'top' => 'slate',
            'configuration' => 'With closing angle',
            'template' => 1
        ]);

        DB::table('ranges')->insert([
            'name' => 'Range - wood - natural - thatch - With opening angle',
            'exterior_finish' => 'wood',
            'insulating' => 'natural',
            'top' => 'thatch',
            'configuration' => 'With opening angle',
            'template' => 1
        ]);
    }
}

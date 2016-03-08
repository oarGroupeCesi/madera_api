<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrateur',
            'email' => 'administrateur@madera.local',
            'password' => bcrypt('admin'),
            'created_at' => Carbon::now(Config::get('app.timezone')),
            'updated_at' => Carbon::now(Config::get('app.timezone')),
        ]);
    }
}

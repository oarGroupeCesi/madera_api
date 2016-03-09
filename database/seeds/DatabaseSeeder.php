<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(RangesTableSeeder::class);
        $this->call(ComponentnaturesTableSeeder::class);
        $this->call(ComponentsTableSeeder::class);
        $this->call(ModulenaturesTableSeeder::class);
        $this->call(ComponentModulenatureTableSeeder::class);

        Model::reguard();
    }
}
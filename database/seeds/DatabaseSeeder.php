<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(FormsTableSeeder::class);
        $this->call(TestsTableSeeder::class);
        $this->call(PointsTableSeeder::class);
        $this->call(ExperimentsTableSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class ExperimentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Experiment::class, 5)->create();
    }
}

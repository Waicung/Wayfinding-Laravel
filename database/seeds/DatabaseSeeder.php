<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
use App\Models\Experiment;
use App\Models\Guest;


class DatabaseSeeder extends Seeder
{
    /**
     *  User (Admin&Guest) Model
     *    - Experiment Model
     * @return void
     */
    public function run()
    {

        $this->call(SuperuserSeeder::class);

        $admin = factory(Admin::class, 5)
            ->create()
            ->each(function ($a) {
                $a->user()->save(factory(User::class)->make());
                $a->experiments()->save(factory(Experiment::class)->make());
            });
        $guest = factory(Guest::class, 50)
            ->create()
            ->each(function ($g) {
                $g->user()->save(factory(User::class)->make());
            });

        $this->call(RouteSeeder::class);
        $this->call(ExperimentSeeder::class);
    }
}

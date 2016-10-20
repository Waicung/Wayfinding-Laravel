<?php

use Illuminate\Database\Seeder;
use App\Models\Experiment;
use App\Models\Form;
use App\Models\Test;
use App\Models\Route;

class ExperimentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Associate to one form and random tests
     *
     * @return void
     */
    public function run()
    {
        $experiments = Experiment::all();
        $forms = Form::all();
        $tests = Test::all();
        $routes = Route::all();
        foreach ($experiments as $experiment) {
            $experiment->forms()->attach($forms->shuffle()->first());
            $experiment->tests()->attach($tests->shuffle()->first());
            $experiment->routes()->attach($routes->shuffle()->slice(0, rand(5,10)));
        }
    }
}

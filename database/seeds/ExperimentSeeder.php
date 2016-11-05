<?php

use Illuminate\Database\Seeder;
use App\Models\Experiment;
use App\Models\Form;
use App\Models\Test;
use App\Models\Route;
use App\Models\Guest;
use App\Models\Participant;
use App\Models\Assignment;
use App\Models\Modification;


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
        $guests = Guest::all();
        foreach ($experiments as $experiment)
        {
            /*
             * Randomly assign test, form and route to each experiment
             */
            $experiment->forms()->attach($forms->shuffle()->first());
            $experiment->tests()->attach($tests->shuffle()->first());
            $experiment->routes()->attach($routes->shuffle()->slice(0, rand(5,10)));

            /*
             * Randomly assign guest to experiments
             */
            $volunteers = $guests->shuffle()->slice(0,rand(10,20));
            foreach($volunteers as $volunteer)
            {
                $experiment->participants()->attach($volunteer);
            }
        }

        /*
         * Randomly assign route(s) to each guest
         */
        $participants = Participant::all();
        foreach($participants as $participant)
        {
            $selected_routes = Experiment::find($participant->experiment_id)->routes->shuffle()->slice(0,rand(1,3));
            $first_route = $selected_routes->get(0);
            while($route = $selected_routes->shift())
            {
                $participant->routes()->attach($route);
                $current_id = $route->id;
                if($current_id<>$first_route->id)
                {
                    $assignment = Assignment::where('participant_id',$participant->id)
                                            ->where('route_id',$current_id)
                                            ->first()
                                            ->id;
                    $participant->routes()->updateExistingPivot($privious_id, [
                    'next_id' => $assignment]);
                    /*$participant->routes()->updateExistingPivot($privious_id, [
                    'next_id' => $participant->routes()->where('id','=',$current_id)->pivot->id]);*/
                }
                $privious_id = $current_id;
            }
        }

        /*
         * Randomly assign modification to assignments
         */
        $assignments = Assignment::all();
        foreach ($assignments as $assignment)
        {
            if (rand(0,1))
            {
                $segment_num = rand(1,Route::find($assignment->route_id)->segments->count());
                $assignment->modifications()->save(factory(Modification::class)->make([
                    'segment_num' => $segment_num,
                ]));
            }
        }


    }
}

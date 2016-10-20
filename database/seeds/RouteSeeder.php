<?php

use Illuminate\Database\Seeder;
use App\Models\Point;
use App\Models\Route;
use App\Models\Segment;
use App\Models\Instruction;


class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
         * Generate Routes
         */
        $points = factory(Point::class, 10)->create();
        $number_of_route = 0;
        while ($number_of_route++ < 10) {
            $shuffle = $points->shuffle();
            $route = factory(Route::class)->create([
                'origin_id' => $shuffle->last()->id,
                'destination_id' => $shuffle->first()->id,
            ]);
            $this->createSegments($route);
        }

    }

    /*
     * Generate Segments
     */
    private function createSegments(Route $route)
    {
        $originId = $route->origin->id;
        $destinationId = $route->destination->id;
        $points = Point::all()->reject(function ($point, $key) use ($originId,$destinationId){
            return $point->id === $originId || $point->id === $destinationId;
        })->shuffle();
        $number_of_segment = rand(3, 8);
        while($number_of_segment-- > 0){
            $nodeId = $number_of_segment === 0 ? $destinationId : $points->pop()->id;
            $segment = $route->segments()->save(factory(Segment::class)->make([
                'start_id' => $originId,
                'end_id' => $nodeId,
            ]));
            $segment->instruction()->save(factory(Instruction::class)->make());
            $originId = $nodeId;
        }
    }
}

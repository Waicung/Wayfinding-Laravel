<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Experiment;
use App\Models\Admin;
use App\Models\Point;
use App\Models\Route;

class ModelTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function an_admin_can_create_experiment ()
    {
        $experiment = factory(Experiment::class)->make();
        $admin = factory(Admin::class)->create();

        $this->assertEquals($experiment->subject, $admin->add($experiment)->subject);
    }

    /** @test */
    public function a_point_can_be_created ()
    {
        $data = [
            'latitude' => 23.324565,
            'longitude' => 33.454355
        ];

        Point::newPoint($data);
        $this->seeInDatabase('points', [
            'latitude' => 23.324565,
            'longitude' => 33.454355,
            'title' => '23.324565,33.454355'
        ]);
    }

    /** @test */
    public function return_existing_id_when_dulplicate_point_is_created ()
    {
        $data = [
            'latitude' => 23.324565,
            'longitude' => 33.454355
        ];

        $pointOne = Point::newPoint($data);
        $this->seeInDatabase('points', [
            'latitude' => 23.324565,
            'longitude' => 33.454355,
            'title' => '23.324565,33.454355'
        ]);

        $pointTwo = Point::newPoint($data);
        $this->assertEquals($pointOne->id,$pointTwo->id);
    }

    /** @test */
    public function a_route_can_be_create_with_two_coordinates ()
    {
        $data = [
            ['latitude' => 23.324565,
            'longitude' => 33.454355],
            ['latitude' => 23.357885,
            'longitude' => 33.245675],
        ];
        $origin = Point::newPoint($data[0]);
        $destination = Point::newPoint($data[1]);
        $route = Route::newRoute($origin, $destination);
        $this->seeInDatabase('routes', [
            'origin_id' => Point::where('latitude', 23.324565)->where('longitude', 33.454355)->first()->id,
            'destination_id' => Point::where('latitude', 23.357885)->where('longitude', 33.245675)->first()->id
        ]);
    }

}

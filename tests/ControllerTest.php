<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Admin;
use App\Models\User;
use App\Models\Form;
use App\Models\Test;
use App\Models\Experiment;
use App\Models\Route;
use App\Models\Point;


class ControllerTest extends TestCase
{

    use DatabaseTransactions;

    protected $user;

    protected function setUp()
    {
        parent::setUp();
        $admin = factory(Admin::class)
        ->create()
        ->each(function($a){
            $user = factory(User::class)->make([
                'email'=> 'test@email.com',
                'password' => 'password'
            ]);
            $a->user()->save($user);
            $form = factory(Form::class)->make(['title'=>'form title']);
            $a->forms()->save($form);
            $test = factory(Test::class)->make(['title'=>'test title']);
            $testTwo = factory(Test::class)->make(['title'=>'test title2']);
            $a->tests()->save($test);
            $a->tests()->save($testTwo);
        });
        $this->user = User::all()->first();
    }

    /** @test */
    public function experiment_controller_can_store_experiment_with_one_form_one_test()
    {

        $this->actingAs($this->user);

        $data = [
            'subject' => 'a title',
            'description' => 'description',
            'form' => 'form title',
            'tests' => 'test title'
        ];

        $this->post('/experiment/new', $data)
            ->seeInDatabase('experiment_form',[
                'experiment_id' => Experiment::all()->first()->id,
                'form_id' => Form::where('title', 'form title')->get()->first()->id
            ])
            ->seeInDatabase('experiment_test',[
                'experiment_id' => Experiment::all()->first()->id,
                'test_id' => Test::where('title', 'test title')->get()->first()->id
            ]);
    }

    /** @test */
    public function experiment_controller_can_store_experiment_with_one_form_multiple_tests()
    {
        $this->actingAs($this->user);

        $data = [
            'subject' => 'a title',
            'description' => 'description',
            'form' => 'form title',
            'tests' => 'test title,test title2'
        ];

        $this->post('/experiment/new', $data)
            ->seeInDatabase('experiment_form',[
                'experiment_id' => Experiment::all()->first()->id,
                'form_id' => Form::where('title', 'form title')->get()->first()->id
            ])
            ->seeInDatabase('experiment_test',[
                'experiment_id' => Experiment::all()->first()->id,
                'test_id' => Test::where('title', 'test title')->get()->first()->id
            ])
            ->seeInDatabase('experiment_test',[
                'experiment_id' => Experiment::all()->first()->id,
                'test_id' => Test::where('title', 'test title2')->get()->first()->id
            ]);
    }

    /** test */
    public function experiment_controller_can_store_experiment_with_one_route()
    {
        $this->actingAs($this->user);

        $route = [
            ['latitude' => 23.324565,
            'longitude' => 33.454355],
            ['latitude' => 23.357885,
            'longitude' => 33.245675],
        ];

        $data = [
            'subject' => 'a title',
            'description' => 'description',
            'routes' => $route,
            'form' => 'form title',
            'tests' => 'test title,test title2'
        ];

        $this->post('/experiment/new', $data)
            ->seeInDatabase('experiment_form',[
                'experiment_id' => Experiment::all()->first()->id,
                'form_id' => Form::where('title', 'form title')->get()->first()->id
            ])
            ->seeInDatabase('experiment_test',[
                'experiment_id' => Experiment::all()->first()->id,
                'test_id' => Test::where('title', 'test title')->get()->first()->id
            ])
            ->seeInDatabase('experiment_test',[
                'experiment_id' => Experiment::all()->first()->id,
                'test_id' => Test::where('title', 'test title2')->get()->first()->id
            ])
            ->seeInDatabase('points', [
                'latitude' => 23.324565,
                'longitude' => 33.454355
            ])
            ->seeInDatabase('routes', [
                'origin_id' => Point::where('latitude', 23.324565)->where('longitude', 33.454355)->first()->id,
                'destination_id' => Point::where('latitude', 23.357885)->where('longitude', 33.245675)->first()->id
            ])
            ->seeInDatabase('experiment_route',[
                'experiment_id' => Experiment::all()->first()->id,
                'route_id' => Route::all()->first()->id
            ]);
    }

    /** test */
    public function experiment_controller_can_store_experiment_with_multiple_routes()
    {
        $this->actingAs($this->user);

        $route_string = ' [{"origin":{"lat":-37.78554899966461,"lng":145.0127792340936},"destination":{"lat":-37.78554899966461,"lng":145.0127792340936}}]
        ';
        $route = [
            ['latitude' => 23.324565,
            'longitude' => 33.454355],
            ['latitude' => 23.357885,
            'longitude' => 33.245675],
            ['latitude' => 24.324565,
            'longitude' => 33.454355],
            ['latitude' => 24.357885,
            'longitude' => 33.245675],
        ];

        $data = [
            'subject' => 'a title',
            'description' => 'description',
            'routes' => $route,
            'form' => 'form title',
            'tests' => 'test title,test title2'
        ];

        $this->post('/experiment/new', $data)
            ->seeInDatabase('experiment_form',[
                'experiment_id' => Experiment::all()->first()->id,
                'form_id' => Form::where('title', 'form title')->get()->first()->id
            ])
            ->seeInDatabase('experiment_test',[
                'experiment_id' => Experiment::all()->first()->id,
                'test_id' => Test::where('title', 'test title')->get()->first()->id
            ])
            ->seeInDatabase('experiment_test',[
                'experiment_id' => Experiment::all()->first()->id,
                'test_id' => Test::where('title', 'test title2')->get()->first()->id
            ])
            ->seeInDatabase('points', [
                'latitude' => 23.324565,
                'longitude' => 33.454355
            ])
            ->seeInDatabase('routes', [
                'origin_id' => Point::where('latitude', 24.324565)->where('longitude', 33.454355)->first()->id,
                'destination_id' => Point::where('latitude', 24.357885)->where('longitude', 33.245675)->first()->id
            ])
            ->seeInDatabase('experiment_route',[
                'experiment_id' => Experiment::all()->first()->id,
                'route_id' => Route::all()->last()->id
            ]);
    }

    /** @test */
    public function experiment_controller_can_store_experiment_with_multiple_routes_string()
    {
        $this->actingAs($this->user);

        $route = ' [{"origin":{"lat":-37.78554899966461,"lng":145.0127792340936},"destination":{"lat":-37.78554899966461,"lng":145.0127792340936}}]
        ';

        $data = [
            'subject' => 'a title',
            'description' => 'description',
            'routes' => $route,
            'form' => 'form title',
            'tests' => 'test title,test title2'
        ];

        $this->post('/experiment/new', $data)
            ->seeInDatabase('experiment_form',[
                'experiment_id' => Experiment::all()->first()->id,
                'form_id' => Form::where('title', 'form title')->get()->first()->id
            ])
            ->seeInDatabase('experiment_test',[
                'experiment_id' => Experiment::all()->first()->id,
                'test_id' => Test::where('title', 'test title')->get()->first()->id
            ])
            ->seeInDatabase('experiment_test',[
                'experiment_id' => Experiment::all()->first()->id,
                'test_id' => Test::where('title', 'test title2')->get()->first()->id
            ])
            ->seeInDatabase('points', [
                'latitude' => -37.78554899966461,
                'longitude' => 145.0127792340936
            ])
            ->seeInDatabase('routes', [
                'origin_id' => Point::where('latitude', -37.78554899966461)->where('longitude', 145.0127792340936)->first()->id,
                'destination_id' => Point::where('latitude', -37.78554899966461)->where('longitude', 145.0127792340936)->first()->id
            ])
            ->seeInDatabase('experiment_route',[
                'experiment_id' => Experiment::all()->first()->id,
                'route_id' => Route::all()->last()->id
            ]);
    }



}

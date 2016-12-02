<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Experiment;
use App\Models\Form;
use App\Models\Test;
use App\Models\Point;
use App\Models\Route;
use Validator;
use Auth;


class ExperimentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showExperimentForm()
    {
        $forms = Form::all()->pluck('title');
        $tests = Test::all()->pluck('title');
        return view('pages.creater', compact('forms', 'tests'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'subject' => 'required|unique:experiments',
            'description' => 'required',
            'form' => 'required',
        ]);
    }

    public function newExperiment(Request $request)
    {
        $validator = $this->validator($request->all())->validate();
        $recruitmentLink = "http://localhost/experiment";
        $experiment = $this->store($request->all());
        return view('pages.success', compact('recruitmentLink','experiment'));
    }

    public function showExperiment($id)
    {
        $experiment = Experiment::find($id);
        return view('pages.experiment', compact('experiment'));
    }

    protected function store(array $data)
    {
        $experiment = new Experiment;
        $experiment->subject = $data['subject'];
        $experiment->description = $data['description'];
        $experiment = Auth::user()->userable->add($experiment);

        $experiment->addForm($this->formResolver($data['form']));
        $experiment->addTests($this->testResolver($data['tests']));
        $experiment->addRoutes($this->routeStringResolver($data['routes']));
        return $experiment;
    }

    protected function formResolver ($data)
    {
        return Form::where('title',$data)->get()->first();
    }

    protected function testResolver ($data)
    {
        return Test::whereIn('title',explode(',', $data))->get();
    }

    protected function routeResolver ($data)
    {
        $routes = [];
        foreach (array_chunk($data,2) as $point) {
            $origin = Point::newPoint($point[0]);
            $destination = Point::newPoint($point[1]);
            $route = Route::newRoute($origin, $destination);
            array_push($routes, $route);
        }
        return $routes;
    }

    protected function routeStringResolver ($data)
    {
        $routes = [];
        foreach (json_decode($data) as $route) {
            $origin = Point::newPoint([
                'latitude' => $route->origin->lat,
                'longitude' => $route->origin->lng,
            ]);
            $destination = Point::newPoint([
                'latitude' => $route->destination->lat,
                'longitude' => $route->destination->lng,
            ]);
            $route = Route::newRoute($origin, $destination);
            array_push($routes, $route);
        }
        return $routes;
    }

}

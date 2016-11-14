<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Form;
use App\Models\Test;


class ExperimentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showExperimentForm()
    {
        $forms = Form::all();
        $tests = Test::all();
        return view('pages.creater', compact('forms', 'tests'));
    }

    public function newExperiment(Request $request)
    {
        return view('pages.show', compact('request'));
    }
}

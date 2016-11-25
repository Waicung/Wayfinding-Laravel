<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Form;
use App\Models\Test;
use Validator;


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
            'description' => 'required'
        ]);
    }

    public function newExperiment(Request $request)
    {
        $validator = $this->validator($request->all())->validate();
        // return view('pages.show', compact('request'));
        $recruitmentLink = "http://localhost/experiment";
        $subject = $request->subject;
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors();
        }
        return view('pages.success', compact('recruitmentLink','subject'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;
use App\Experiment;
use App\User;
use Auth;
use App\Form_select;
use App\Form;
use App\Test_select;
use App\Test;

class ExpController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createExp(Request $request)
    {
        // valudate input data
        $this->validate($request, [
            'subject' => 'required|max:255',
            'description' => 'max:65000',
            'form' => 'required',
            'test' => 'required',
        ]);

        // save to the experiment
        $data=$request->input();
        $experiment=Experiment::create([
            'subject' => $data['subject'],
            'description' => $data['description'],
            'admin_id' => Auth::user()->user_id,
        ]);

        // save the form_select
        $form=new Form_select;
        $form->form_id=Form::where('title',$data['form'])->first()->form_id;
        $experiment->form_select()->save($form);

        // save the test_select
        $test=new Test_select;
        $test->test_id=Test::where('title',$data['test'])->first()->test_id;
        $experiment->test_selects()->save($test);

        return redirect()->route('home');
    }
}

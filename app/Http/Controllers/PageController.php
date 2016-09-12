<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Admin;
use App\Form;
use App\Test;
use App\Experiment;

class PageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        return view('pages.dashboard');
    }

    public function createForm()
    {
        $forms = Form::all();
        $tests = Test::all();

        return view('pages.creater', compact('forms', 'tests'));
    }

    public function monitor($section)
    {
        switch ($section) {
            case 'statistics':
                $exps = Admin::find(Auth::user()->user_id)
                        ->experiments()
                        ->get();
                return view('pages.monitor', compact('exps'));
                break;
            case 'modifier':
                $subjects = Admin::find(Auth::user()->user_id)
                        ->experiments()
                        ->get(['subject']);
                return view('pages.modifier', compact('subjects'));
                break;
            case 'participants':
                return view('pages.participants');
                break;
            default:
                return back();
                break;
        }

    }

    public function recruitment()
    {
        return view('pages.creater');
    }

    public function analyzer()
    {
        return view('pages.creater');
    }


}

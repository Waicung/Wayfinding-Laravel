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
        Auth::loginUsingId('2');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {

        $experiments = Auth::user()->userable->experiments;
        return view('pages.dashboard', compact('experiments'));

    }

    public function creater($section){
        switch ($section) {
            case 'experiment':
                return $this->createForm($section);
                break;
            case 'routes':
                return view('pages.dashboard', compact('section'));
                break;
            default:
                return view('pages.dashboard', compact('section'));
                break;
        }
    }

    public function createForm($section)
    {
        $forms = Form::all();
        $tests = Test::all();

        return view('pages.creater', compact('forms', 'tests', 'section'));
    }

    public function monitor($section)
    {
        switch ($section) {
            case 'statistics':
                $exps = Admin::find(Auth::user()->user_id)
                        ->experiments()
                        ->get();
                return view('pages.monitor', compact('section', 'exps'));
                break;
            case 'modifier':
                $subjects = Admin::find(Auth::user()->user_id)
                        ->experiments()
                        ->get(['subject']);
                return view('pages.modifier', compact('section', 'subjects'));
                break;
            case 'participants':
                return view('pages.participants', compact('section'));
                break;
            default:
                return back();
                break;
        }

    }

    public function recruitment()
    {
        $section = "recuitment";
        return view('pages.dashboard', compact('section'));
    }

    public function analyzer()
    {
        $section = "analyzer";
        return view('pages.dashboard', compact('section'));
    }


}

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
        return $this->home();
    }

    public function analyser()
    {
        return $this->home();
    }


}

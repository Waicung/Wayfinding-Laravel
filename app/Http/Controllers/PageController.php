<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Form;
use App\Test;

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

        return view('pages.creater', ['forms' => $forms, 'tests' => $tests]);
    }

    public function monitor()
    {
        return view('pages.creater');
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

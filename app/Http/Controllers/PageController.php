<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
        return view('pages.creater');
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

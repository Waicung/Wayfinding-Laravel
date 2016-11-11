<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        Auth::loginUsingId('2');
        $this->middleware('auth');
    }

    public function view()
    {
        $info = Auth::user();
        return view('pages.profile', compact('info'));
    }
}

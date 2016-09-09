<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;
use App\Experiment;
use App\User;
use Auth;

class ExpController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createExp(Request $request)
    {
        $data=$request->all();
        $this->validate($request, [
            'subject' => 'required|max:255',
            'description' => 'max:65000',
        ]);
        Experiment::create([
            'subject' => $data['subject'],
            'description' => $data['description'],
            'admin_id' => Auth::user()->user_id,
        ]);
        return redirect()->route('home');
    }
}

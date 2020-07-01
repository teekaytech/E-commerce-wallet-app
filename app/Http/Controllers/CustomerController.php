<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        //validates customer session with appropriate guard
//        $this->middleware('auth:customer');
    }

    public function dashboard(Request $request) {
//        dd($request->all());
        return view ('pages.dashboard');
    }

}

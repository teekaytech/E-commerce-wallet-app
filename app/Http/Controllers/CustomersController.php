<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{

    public function dashboard(Request $request) {
//        dd($request->all());
        return view ('pages.dashboard');
    }

}

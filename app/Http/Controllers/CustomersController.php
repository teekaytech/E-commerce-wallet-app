<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{

    public function dashboard(Request $request) {
        $this->validate($request, [
            'email' => ['required', 'email', 'unique:customers'],
            'password'  => ['required']
        ]);

        return view ('pages.dashboard');
    }

}

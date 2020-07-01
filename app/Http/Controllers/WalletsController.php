<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletsController extends Controller
{
    public function __construct()
    {
        // validates customer session with appropriate guard
        // $this->middleware('auth:customer');
    }

}

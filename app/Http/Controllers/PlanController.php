<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plan');
    }
}

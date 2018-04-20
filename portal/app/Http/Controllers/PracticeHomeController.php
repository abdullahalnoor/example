<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:practice');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('practice.home.index');
    }
}

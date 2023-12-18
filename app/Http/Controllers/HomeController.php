<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        //return view('layouts.master_home');
        return view('home.home');
    }
}

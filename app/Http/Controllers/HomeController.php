<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function LandingPage(){
        return view('home.landing-page');
    }
}

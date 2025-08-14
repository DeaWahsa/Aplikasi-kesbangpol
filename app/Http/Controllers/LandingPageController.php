<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class LandingPageController extends Controller
{
    public function index(){
        return View('landing-page');
    }
}

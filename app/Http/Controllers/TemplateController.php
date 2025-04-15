<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index(){
        return view('frontend/home');
    }
    public function profile(){
        return view('frontend/profile');
    }

    public function property(){
        return view('frontend/property');
    }
    public function event(){
        return view('frontend/events');
    }

    public function loginview(){
        return view('frontend/loginview');
    }
    public function registerview(){
        return view('frontend/registerview');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;

class TemplateController extends Controller
{
    public function index(){
        return view('frontend/home');
    }
    public function profile(){
        $properties = Property::all(); // Fetch all properties
        return view('frontend.master-profile', compact('properties'));
    }

    public function property(){
        return view('frontend/property');
    }
    public function event(){
        return view('frontend/event');
    }

    public function propertyList(){
        $properties = Property::all(); 
        return view('frontend/propertyList', compact('properties'));
    }

    public function userList(){
        $users = User::all();
        return view('frontend/userList', compact('users'));
    }

    public function loginview(){
        return view('frontend/loginview');
    }
    public function registerview(){
        return view('frontend/registerview');
    }

    public function map(){
        return view('frontend/map');
    }
    
}

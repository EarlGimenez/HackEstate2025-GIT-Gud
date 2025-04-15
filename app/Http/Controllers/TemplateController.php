<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Event;

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
        $properties = Property::select('id', 'propName', 'latitude', 'longitude', 'propPrice', 'propAddress')->get();
        return view('frontend/map', compact('properties'));
    }
    
    public function eventList(){
        $events = Event::all(); 
        return view('frontend/eventList', compact('events'));
    }

    public function eventDetails($id){
        $event = Event::findOrFail($id);
        return view('frontend.eventDetails', compact('event'));
    }
}

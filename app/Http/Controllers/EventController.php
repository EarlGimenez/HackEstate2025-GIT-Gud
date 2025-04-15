<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller{

    //show all events
    public function index(){
        $events = Event::all();
        return response()->json($events);
    }

    //show a single event
    public function show($id){
        $event = Event::findOrFail($id);
        return response()->json($event);
    }

    //create a new event
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'host' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'location' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'image_path' => 'nullable|string',
            'user_id' => 'required|exists:users,id'
        ]);

        $event = Event::create($validated);
        return response()->json($event, 201);
    }

    //edit an event
    public function update(Request $request, $id){
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'host' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'date' => 'sometimes|date',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'location' => 'sometimes|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'image_path' => 'nullable|string',
        ]);

        $event->update($validated);
        return response()->json($event);
    }

    //delete a event
    public function destroy($id){
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }

    
}
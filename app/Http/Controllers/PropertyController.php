<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    //get all properties
    public function index(){
        return response()->json(Property::all(), 200);
    }

    //get a single property by id
    public function show($id){
        $property = Property::find($id);

        if(!$property){
            return response()->json(['message' => 'Property not found'], 404);
        }

        return response()->json($property, 200);
    }

    //creates a new property
    public function store(Request $request){
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'propName' => 'required|string',
            'propDesc' => 'required|string',
            'propPrice' => 'required|integer',
            'propAddress' => 'required|string',
            'propArea' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image_1' => 'nullable|string',
            'image_2' => 'nullable|string',
            'image_3' => 'nullable|string',
        ]);

        $property = Property::create($validated);

        return response()->json($property, 201);
    }

    //update an existing property
    public function update(Request $request, $id){
        $property = Property::find($id);

        if(!$property){
            return response()->json(['message' => 'Property not found'], 404);
        }

        $property->update($request->all());

        return response()->json($property, 200);
    }

    //delete an existing property
    public function destroy($id){
        $property = Property::find($id);

        if(!$property){
            return response()->json(['message' => 'Property not found'], 404);
        }

        $property->delete();

        return response()->json(['message' => 'Property successfully deleted'], 200);
    }

    //filter property by area
    public function filterByArea($area){
        $properties = Property::where('propArea', $area)->get();

        return response()->json($properties, 200);
    }

    //gets the properties average price and count by area
    // public function getAreaStats(){
    //     $stats = \App\Models\Property::select('propArea')
    //         ->selectRaw('AVG(propPrice) as avg_price')
    //         ->selectRaw('COUNT(*) as total_properties')
    //         ->get();

    //     return response()->json($stats);
    // }

    public function getAreaStats(){
        $stats = \App\Models\Property::select('propArea')
            ->selectRaw('AVG(propPrice) as avg_price')
            ->selectRaw('COUNT(*) as total_properties')
            ->selectRaw('AVG(latitude) as avg_lat')
            ->selectRaw('AVG(longitude) as avg_lng')
            ->groupBy('propArea') 
            ->get();
    
        return response()->json($stats);
    }

    public function propertyDetails($id)
    {
        $property = Property::findOrFail($id); // for now, basic retrieval

        return view('frontend/propertyDetails', compact('property'));
    }
}

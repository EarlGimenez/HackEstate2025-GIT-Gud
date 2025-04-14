<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    // Show all properties
    public function index()
    {
        $properties = Property::with('user')->get();
        return view('properties.index', compact('properties'));
    }

    // Show form to create a property
    public function create()
    {
        return view('properties.create');
    }

    // Store new property
    public function store(Request $request)
    {
        $request->validate([
            'propName' => 'required|string|max:255',
            'propDesc' => 'required|string',
            'propPrice' => 'required|numeric',
            'propAddress' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('property_images', 'public');
        }

        Property::create([
            'user_id' => Auth::id(),
            'propName' => $request->propName,
            'propDesc' => $request->propDesc,
            'propPrice' => $request->propPrice,
            'propAddress' => $request->propAddress,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => $imagePath,
        ]);

        return redirect()->route('properties.index')->with('success', 'Property created successfully!');
    }

    // Show one property
    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.show', compact('property'));
    }

    // Show form to edit property
    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.edit', compact('property'));
    }

    // Update existing property
    public function update(Request $request, $id)
    {
        $request->validate([
            'propName' => 'required|string|max:255',
            'propDesc' => 'required|string',
            'propPrice' => 'required|numeric',
            'propAddress' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $property = Property::findOrFail($id);
        $imagePath = $property->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('property_images', 'public');
        }

        $property->update([
            'propName' => $request->propName,
            'propDesc' => $request->propDesc,
            'propPrice' => $request->propPrice,
            'propAddress' => $request->propAddress,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => $imagePath,
        ]);

        return redirect()->route('properties.index')->with('success', 'Property updated successfully!');
    }

    // Delete property
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully!');
    }
}

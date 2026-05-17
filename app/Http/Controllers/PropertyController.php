<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // GET /properties
    public function index()
    {
        $properties = Property::withCount('rooms')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pages.properties', compact('properties'));
    }

    // GET /properties/create
    public function create()
    {
        return view('pages.add_property');
    }

    // POST /properties
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'type'         => 'required|string',
            'star_rating'  => 'required|integer|min:1|max:5',
            'city'         => 'required|string',
            'country'      => 'required|string',
            'address'      => 'required|string',
            'email'        => 'required|email',
            'phone'        => 'required|string',
            'total_rooms'  => 'required|integer|min:1',
            'check_in_time'  => 'required',
            'check_out_time' => 'required',
        ]);

        Property::create([
            'name'           => $request->name,
            'type'           => $request->type,
            'star_rating'    => $request->star_rating,
            'city'           => $request->city,
            'country'        => $request->country,
            'address'        => $request->address,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'website'        => $request->website,
            'description'    => $request->description,
            'check_in_time'  => $request->check_in_time,
            'check_out_time' => $request->check_out_time,
            'total_rooms'    => $request->total_rooms,
            'currency'       => $request->currency ?? 'USD',
            'status'         => $request->status ?? 'active',
            'amenities'      => $request->amenities ?? [],
            'latitude'       => $request->latitude,
            'longitude'      => $request->longitude,
        ]);

        return redirect()->route('properties.index')
            ->with('success', 'Property created successfully!');
    }

    // GET /properties/{id}
    public function show($id)
    {
        $property = Property::with(['rooms', 'channels', 'reservations'])
            ->findOrFail($id);

        return view('pages.property_detail', compact('property'));
    }

    // GET /properties/{id}/edit
    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('pages.edit_property', compact('property'));
    }

    // PUT /properties/{id}
    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        $property->update($request->all());

        return redirect()->route('properties.index')
            ->with('success', 'Property updated successfully!');
    }

    // DELETE /properties/{id}
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('properties.index')
            ->with('success', 'Property deleted successfully!');
    }
}
<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => City::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => ['required', 'string', 'min:3'],
            'name' => ['required', 'striing', 'min:3']
        ]);

        $city = new City($validatedData);

        $city->save();

        return response()->json([
            'success' => true,
            'message' => 'Data created successfull'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        return response()->json([
            'success' => true,
            'data' => $city
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $validatedData = $request->validate([
            'code' => ['required', 'string', 'min:3'],
            'name' => ['required', 'striing', 'min:3']
        ]);

        $city->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Data updated successfull',
            'data' => $city
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfull',
        ]);
    }
}

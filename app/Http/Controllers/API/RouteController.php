<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Route::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => ['required'],
            'departure' => ['required'],
            'arrival' => ['required'],
            'departure_time' => ['required'],
            'arrival_time' => ['required'],
            'price' => ['required'],
            'status' => ['required']
        ]);

        $route = new Route($validatedData);
        $route->save();

        return response()->json([
            'success' => true,
            'message' => 'Data created successfull',
            'data' => $route
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route)
    {
        return response()->json([
            'success' => true,
            'data' => $route
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Route $route)
    {
        $validatedData = $request->validate([
            'code' => ['required'],
            'departure' => ['required'],
            'arrival' => ['required'],
            'departure_time' => ['required'],
            'arrival_time' => ['required'],
            'price' => ['required'],
            'status' => ['required']
        ]);

        $route->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Data updated successfull',
            'data' => $route
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        $route->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfull',
        ]);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Armada;
use Illuminate\Http\Request;

class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Armada::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => ['required', 'string', 'min:4', 'unique:armadas,code'],
            'name' => ['required', 'string', 'min:4'],
            'brand' => ['required', 'string'],
            'police_number' => ['required', 'string', 'unique:armadas,police_number'],
            'capacity' => ['required', 'integer'],
            'status' => ['required'],
        ]);

        $armada = new Armada($validatedData);
        $armada->save();

        return response()->json([
            'success' => true,
            'message' => 'Data created succesfull',
            'data' => $armada
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Armada $armada)
    {
        return response()->json([
            'success' => true,
            'data' => $armada
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Armada $armada)
    {
        $validatedData = $request->validate([
            'code' => ['required', 'string', 'min:4', 'unique:armadas,code'],
            'name' => ['required', 'string', 'min:4'],
            'brand' => ['required', 'string'],
            'police_number' => ['required', 'string', 'unique:armadas,police_number'],
            'capacity' => ['required', 'integer'],
            'status' => ['required'],
        ]);

        $armada->save($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Data updated succesfull',
            'data' => $armada
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Armada $armada)
    {
        $armada->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfull'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TProvinsi;
use Illuminate\Http\Request;

class TProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => TProvinsi::all(),
            'message' => 'Data Get Successfuly'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'string',
            'nama' => 'string',
            'active' => 'boolean',
        ]);

        $created = TProvinsi::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $created,
            'message' => 'Data Created Successfuly'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TProvinsi $tProvinsi)
    {
        return response()->json([
            'success' => true,
            'data' => $tProvinsi,
            'message' => 'Data 1 Data Successfuly'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TProvinsi $tProvinsi)
    {
        $request->validate([
            'kode' => 'string',
            'nama' => 'string',
            'active' => 'boolean',
        ]);

        $tProvinsi->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $tProvinsi,
            'message' => 'Data Updated Successfuly'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TProvinsi $tProvinsi)
    {
        $tProvinsi->delete();
        return response()->json([
            'success' => true,
            'data' => [],
            'message' => 'Data Deleted Successfuly'
        ]);
    }
}

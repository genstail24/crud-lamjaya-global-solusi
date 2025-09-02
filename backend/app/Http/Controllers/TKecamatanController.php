<?php

namespace App\Http\Controllers;

use App\Models\TKecamatan;
use Illuminate\Http\Request;

class TKecamatanController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => TKecamatan::get(),
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

        $created = TKecamatan::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $created,
            'message' => 'Data Created Successfuly'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TKecamatan $tKecamatan)
    {
        return response()->json([
            'success' => true,
            'data' => $tKecamatan,
            'message' => 'Data 1 Data Successfuly'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TKecamatan $tKecamatan)
    {
        $request->validate([
            'kode' => 'string',
            'nama' => 'string',
            'active' => 'boolean',
        ]);

        $tKecamatan->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $tKecamatan,
            'message' => 'Data Updated Successfuly'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TKecamatan $tKecamatan)
    {
        $tKecamatan->delete();
        return response()->json([
            'success' => true,
            'data' => [],
            'message' => 'Data Deleted Successfuly'
        ]);
    }
}

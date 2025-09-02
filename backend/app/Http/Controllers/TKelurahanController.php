<?php

namespace App\Http\Controllers;

use App\Models\TKelurahan;
use Illuminate\Http\Request;

class TKelurahanController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => TKelurahan::with('tKecamatan')->get(),
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
            'id_t_kecamatan' => 'exists:App\Models\TKecamatan,id'
        ]);

        $created = TKelurahan::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $created,
            'message' => 'Data Created Successfuly'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TKelurahan $tKelurahan)
    {
        return response()->json([
            'success' => true,
            'data' => $tKelurahan->load('tKecamatan'),
            'message' => 'Data 1 Data Successfuly'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TKelurahan $tKelurahan)
    {
        $request->validate([
            'kode' => 'string',
            'nama' => 'string',
            'active' => 'boolean',
            'id_t_kecamatan' => 'exists:App\Models\TKecamatan,id'
        ]);

        $tKelurahan->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $tKelurahan,
            'message' => 'Data Updated Successfuly'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TKelurahan $tKelurahan)
    {   
        $tKelurahan->delete();
        return response()->json([
            'success' => true,
            'data' => [],
            'message' => 'Data Deleted Successfuly'
        ]);
    }
}

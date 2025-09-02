<?php

namespace App\Http\Controllers;

use App\Models\TPegawai;
use Illuminate\Http\Request;

class TPegawaiController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => TPegawai::all(),
            'message' => 'Data Get Successfuly'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'string',
            'tempat_lahir' => 'string',
            'tanggal_lahir' => 'date',
            'jenis_kelamin' => 'string',
            'agama' => 'string',
            'id_t_kecamatan' => 'exists:App\Models\TKecamatan,id',
            'id_t_kelurahan' => 'exists:App\Models\TKelurahan,id',
            'id_t_provinsi' => 'exists:App\Models\TPorinvsi,id',
        ]);

        $created = TPegawai::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $created,
            'message' => 'Data Created Successfuly'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TPegawai $tPegawai)
    {
        return response()->json([
            'success' => true,
            'data' => $tPegawai,
            'message' => 'Data 1 Data Successfuly'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TPegawai $tPegawai)
    {
        $request->validate([
            'nama' => 'string',
            'tempat_lahir' => 'string',
            'tanggal_lahir' => 'date',
            'jenis_kelamin' => 'string',
            'agama' => 'string',
            'id_t_kecamatan' => 'exists:App\Models\TKecamatan,id',
            'id_t_kelurahan' => 'exists:App\Models\TKelurahan,id',
            'id_t_provinsi' => 'exists:App\Models\TPorinvsi,id',
        ]);

        $tPegawai->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $tPegawai,
            'message' => 'Data Updated Successfuly'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TPegawai $tPegawai)
    {
        $tPegawai->delete();
        return response()->json([
            'success' => true,
            'data' => [],
            'message' => 'Data Deleted Successfuly'
        ]);
    }
}

<?php

use App\Http\Controllers\TKecamatanController;
use App\Http\Controllers\TKelurahanController;
use App\Http\Controllers\TPegawaiController;
use App\Http\Controllers\TProvinsiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// /t-provinsi
Route::apiResource('/t-provinsi', TProvinsiController::class);

// /t-kecamatan
Route::apiResource('/t-kecamatan', TKecamatanController::class);

// /t-kelurahan
Route::apiResource('/t-kelurahan', TKelurahanController::class);

// /t-pegawai
Route::apiResource('/t-pegawai', TPegawaiController::class);

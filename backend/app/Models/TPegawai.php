<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPegawai extends Model
{
    /** @use HasFactory<\Database\Factories\TPegawaiFactory> */
    use HasFactory;

    protected $table = 'T_PEGAWAI';

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'id_t_provinsi',
        'id_t_kecamatan',
        'id_t_kelurahan',
    ];

    public function tProvinsi()
    {
        return $this->belongsTo(TProvinsi::class, 'id_t_provinsi', 'id');
    }

    public function tKecamatan()
    {
        return $this->belongsTo(TKecamatan::class, 'id_t_kecamatan', 'id');
    }

    public function tKelurahan()
    {
        return $this->belongsTo(TKelurahan::class, 'id_t_kelurahan', 'id');
    }
}

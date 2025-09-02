<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TKelurahan extends Model
{
    /** @use HasFactory<\Database\Factories\TKelurahanFactory> */
    use HasFactory;

    protected $table = 'T_KELURAHAN';

    protected $fillable = [
        'kode',
        'nama',
        'active',
        'id_t_kecamatan',
    ];

    public function tKecamatan()
    {
        return $this->belongsTo(TKecamatan::class, 'id_t_kecamatan', 'id');
    }
}

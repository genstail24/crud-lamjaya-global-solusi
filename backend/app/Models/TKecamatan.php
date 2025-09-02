<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TKecamatan extends Model
{
    /** @use HasFactory<\Database\Factories\TKecamatanFactory> */
    use HasFactory;
    
    protected $table = 'T_KECAMATAN';

    protected $fillable = [
        'kode',
        'nama',
        'active',
    ];
}

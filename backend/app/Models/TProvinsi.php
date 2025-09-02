<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TProvinsi extends Model
{
    /** @use HasFactory<\Database\Factories\TProvinsiFactory> */
    use HasFactory;

    protected $table = 'T_PROVINSI';

    protected $fillable = [
        'kode',
        'nama',
        'active',
    ];
}

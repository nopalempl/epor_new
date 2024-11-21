<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPermohonan extends Model
{
    use HasFactory;

    protected $table = 'laporan_permohonan';

    protected $fillable = [
        'npwrd',
        'nama_lengkap',
        'alamat_usaha',
        'no_awal',
        'no_akhir',
        'jml_lembar',
        'tanggal_permohonan',
    ];
}

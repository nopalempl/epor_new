<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifikasiPermohonan extends Model
{
    use HasFactory;

    protected $table = 'verifikasi_permohonan';

    protected $fillable = [
        'no_permohonan',
        'nm_wr',
        'nama',
        'npwrd',
        'alamat_usaha',
        'no_handphone',
        'pemilik',
        'no_seri',
        'no_awal',
        'no_akhir',
        'jml_lembar',
        'tarif',
        'total',
        'tanggal_permohonan',
        'status',
    ];

    public function daftarUsaha()
    {
        return $this->belongsTo(DaftarUsaha::class, 'npwrd', 'npwrd');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;

    protected $table = 'registrasi';

    protected $fillable = [
        'jenis',
        'pemilik',
        'jenis_wajib_pajak',
        'no_registrasi',
        'nm_wr',
        'npwrd',
        'nama',
        'email',
        'foto',
        'kota',
        'id_kelurahan',
        'id_kecamatan',
        // 'tempat_lahir',
        // 'tanggal_lahir',
        // 'alamat',
        'no_handphone',
        // 'no_rekening',
        'alamat_usaha',
       
    ];

    // protected $casts = [
    //     'tanggal_lahir' => 'date',
    // ];
}

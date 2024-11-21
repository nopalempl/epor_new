<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $table = 'billing';
    protected $fillable = [
        // 'no_permohonan',
        'npwrd',
        // 'nm_wr',
        // 'nama',
        'id_billing',
        'ssrd_no_seri',
        'ssrd_no_awal',
        'ssrd_no_akhir',
        'ssrd_jml_lembar',
        'ssrd_tarif',
        'ssrd_sisa',
        'ssrd_nilai_setor',
        'metode_bayar',
        'tanggal_rekam',
        'status'
    ];

    public function daftarUsaha()
    {
        return $this->belongsTo(DaftarUsaha::class, 'npwrd', 'npwrd');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputSsrd extends Model
{
    use HasFactory;

    protected $table = 'input_ssrd';

    public function daftarUsaha()
    {
        return $this->belongsTo(DaftarUsaha::class, 'npwrd', 'npwrd');
    }

    protected $fillable = [
        'ssrd_no_seri',
        'ssrd_no_awal',
        'ssrd_no_akhir',
        'ssrd_jml_lembar',
        'ssrd_sisa',
        'ssrd_tarif',
        'ssrd_nilai_setor',
        'metode_bayar',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan'; 
    protected $fillable = ['kd_kecamatan', 'nm_kecamatan'];

    public function kelurahans()
    {
        return $this->hasMany(Kelurahan::class, 'kd_kecamatan', 'kd_kecamatan');
    }
}

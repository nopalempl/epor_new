<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelurahanSeeder extends Seeder{
    public function run(){
        $kelurahan = [
            ['id' => 1, 'kd_kecamatan' => '28', 'kd_kelurahan' => '32', 'nm_kelurahan' => 'JATIMURNI', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'kd_kecamatan' => '28', 'kd_kelurahan' => '33', 'nm_kelurahan' => 'JATIWARNA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'kd_kecamatan' => '28', 'kd_kelurahan' => '34', 'nm_kelurahan' => 'JATIRAHAYU', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'kd_kecamatan' => '28', 'kd_kelurahan' => '35', 'nm_kelurahan' => 'JATIMELATI', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'kd_kecamatan' => '29', 'kd_kelurahan' => '36', 'nm_kelurahan' => 'CIMUNING', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'kd_kecamatan' => '29', 'kd_kelurahan' => '37', 'nm_kelurahan' => 'PEDURENAN', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'kd_kecamatan' => '29', 'kd_kelurahan' => '38', 'nm_kelurahan' => 'MUSTIKA SARI', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'kd_kecamatan' => '30', 'kd_kelurahan' => '40', 'nm_kelurahan' => 'KALI BARU', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'kd_kecamatan' => '30', 'kd_kelurahan' => '41', 'nm_kelurahan' => 'PEJUANG', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'kd_kecamatan' => '30', 'kd_kelurahan' => '42', 'nm_kelurahan' => 'HARAPAN MULYA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'kd_kecamatan' => '30', 'kd_kelurahan' => '43', 'nm_kelurahan' => 'MEDAN SATRIA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'kd_kecamatan' => '31', 'kd_kelurahan' => '44', 'nm_kelurahan' => 'BOJONG MENTENG', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'kd_kecamatan' => '31', 'kd_kelurahan' => '45', 'nm_kelurahan' => 'SEPANJANG JAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'kd_kecamatan' => '31', 'kd_kelurahan' => '46', 'nm_kelurahan' => 'PENGASINAN', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'kd_kecamatan' => '31', 'kd_kelurahan' => '47', 'nm_kelurahan' => 'BOJONG RAWA LUMBU', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'kd_kecamatan' => '32', 'kd_kelurahan' => '48', 'nm_kelurahan' => 'JATIRADEN', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'kd_kecamatan' => '32', 'kd_kelurahan' => '49', 'nm_kelurahan' => 'JATIRANGGA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'kd_kecamatan' => '32', 'kd_kelurahan' => '50', 'nm_kelurahan' => 'JATIRANGGON', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'kd_kecamatan' => '32', 'kd_kelurahan' => '51', 'nm_kelurahan' => 'JATIKARYA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'kd_kecamatan' => '32', 'kd_kelurahan' => '52', 'nm_kelurahan' => 'JATI SAMPURNA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21, 'kd_kecamatan' => '33', 'kd_kelurahan' => '53', 'nm_kelurahan' => 'SUMUR BATU', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 22, 'kd_kecamatan' => '33', 'kd_kelurahan' => '54', 'nm_kelurahan' => 'CIKETING UDIK', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 23, 'kd_kecamatan' => '33', 'kd_kelurahan' => '55', 'nm_kelurahan' => 'CIKIWUL', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 24, 'kd_kecamatan' => '33', 'kd_kelurahan' => '56', 'nm_kelurahan' => 'BANTAR GEBANG', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 25, 'kd_kecamatan' => '34', 'kd_kelurahan' => '57', 'nm_kelurahan' => 'JATIBARU', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 26, 'kd_kecamatan' => '34', 'kd_kelurahan' => '58', 'nm_kelurahan' => 'JATICEMPAKA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 27, 'kd_kecamatan' => '34', 'kd_kelurahan' => '59', 'nm_kelurahan' => 'JATIMAKMUR', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 28, 'kd_kecamatan' => '34', 'kd_kelurahan' => '60', 'nm_kelurahan' => 'JATIBENING', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 29, 'kd_kecamatan' => '34', 'kd_kelurahan' => '61', 'nm_kelurahan' => 'JATIWARINGIN', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 30, 'kd_kecamatan' => '35', 'kd_kelurahan' => '62', 'nm_kelurahan' => 'JATISARI', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 31, 'kd_kecamatan' => '35', 'kd_kelurahan' => '63', 'nm_kelurahan' => 'JATILUHUR', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 32, 'kd_kecamatan' => '35', 'kd_kelurahan' => '64', 'nm_kelurahan' => 'JATIRASA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 33, 'kd_kecamatan' => '35', 'kd_kelurahan' => '65', 'nm_kelurahan' => 'JATIKRAMAT', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 34, 'kd_kecamatan' => '35', 'kd_kelurahan' => '66', 'nm_kelurahan' => 'JATIMEKAR', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 35, 'kd_kecamatan' => '35', 'kd_kelurahan' => '67', 'nm_kelurahan' => 'JATIASIH', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 36, 'kd_kecamatan' => '36', 'kd_kelurahan' => '68', 'nm_kelurahan' => 'KAYURINGIN JAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 37, 'kd_kecamatan' => '36', 'kd_kelurahan' => '69', 'nm_kelurahan' => 'JAKASETIA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 38, 'kd_kecamatan' => '36', 'kd_kelurahan' => '70', 'nm_kelurahan' => 'JAKAMULYA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 39, 'kd_kecamatan' => '36', 'kd_kelurahan' => '71', 'nm_kelurahan' => 'MARGAJAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 40, 'kd_kecamatan' => '36', 'kd_kelurahan' => '72', 'nm_kelurahan' => 'PEKAYON JAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 41, 'kd_kecamatan' => '37', 'kd_kelurahan' => '73', 'nm_kelurahan' => 'HARAPAN JAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 42, 'kd_kecamatan' => '37', 'kd_kelurahan' => '74', 'nm_kelurahan' => 'MARGAMULYA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 43, 'kd_kecamatan' => '37', 'kd_kelurahan' => '75', 'nm_kelurahan' => 'TELUK PUCUNG', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 44, 'kd_kecamatan' => '37', 'kd_kelurahan' => '76', 'nm_kelurahan' => 'HARAPAN BARU', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 45, 'kd_kecamatan' => '37', 'kd_kelurahan' => '77', 'nm_kelurahan' => 'PERWIRA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 46, 'kd_kecamatan' => '38', 'kd_kelurahan' => '78', 'nm_kelurahan' => 'JAKA SAMPURNA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 47, 'kd_kecamatan' => '38', 'kd_kelurahan' => '79', 'nm_kelurahan' => 'BINTARA JAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 48, 'kd_kecamatan' => '38', 'kd_kelurahan' => '80', 'nm_kelurahan' => 'KOTA BARU', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 49, 'kd_kecamatan' => '38', 'kd_kelurahan' => '81', 'nm_kelurahan' => 'KRANJI', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 50, 'kd_kecamatan' => '38', 'kd_kelurahan' => '82', 'nm_kelurahan' => 'BINTARA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 51, 'kd_kecamatan' => '37', 'kd_kelurahan' => '83', 'nm_kelurahan' => 'KALIABANG TENGAH', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 52, 'kd_kecamatan' => '39', 'kd_kelurahan' => '84', 'nm_kelurahan' => 'AREN JAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 53, 'kd_kecamatan' => '39', 'kd_kelurahan' => '85', 'nm_kelurahan' => 'DUREN JAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 54, 'kd_kecamatan' => '39', 'kd_kelurahan' => '86', 'nm_kelurahan' => 'MARGAHAYU', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 55, 'kd_kecamatan' => '39', 'kd_kelurahan' => '87', 'nm_kelurahan' => 'BEKASI JAYA', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 56, 'kd_kecamatan' => '29', 'kd_kelurahan' => '39', 'nm_kelurahan' => 'MUSTIKA JAYA', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach($kelurahan as $kelurahan){
            DB::table('kelurahan')->insert($kelurahan);
        }
    }
}
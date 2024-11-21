<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrasi;
use App\Models\DaftarUsaha;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class RegistrasiController extends Controller
{
    public function index()
    {

        $daftarUsaha = DaftarUsaha::latest()->get();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();


        $lastEntry = DaftarUsaha::latest('no_registrasi')->first();
        $currentDate = now()->format('ymd');
        $lastNumber = $lastEntry ? intval(substr($lastEntry->no_registrasi, -3)) : 0;
        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        $noRegistrasi = $currentDate . $newNumber;
        return view('pages.registrasi.index', compact('noRegistrasi', 'kecamatans', 'kelurahans'));
    }

    public function getKelurahan($kd_kecamatan)
    {
        $kelurahans = Kelurahan::where('kd_kecamatan', $kd_kecamatan)->get();
        return response()->json($kelurahans);
    }

    public function allKecamatan() {
        $kecamatan = Kecamatan::all();

        return response()->json($kecamatan);
    }
}

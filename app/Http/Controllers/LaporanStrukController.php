<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\models\Billing;

class LaporanStrukController extends Controller
{
    public function index()
    {
        $billings = Billing::all();
        $billings = Billing::join('daftar_usaha', 'billing.npwrd', '=', 'daftar_usaha.npwrd')
            ->select(
                'billing.*',
                'daftar_usaha.nama as daftarUsaha_nama',
                'daftar_usaha.alamat_usaha as daftarUsaha_alamat'
            )
            ->get();

        return view('pages.laporan.struk.index', compact('billings'));
    }
    public function cetakPdf(Request $request)
    {
        $pdf = Pdf::loadView('pages.laporan.struk.cetak');


        return $pdf->stream('cetak-laporan.struk.pdf');
    }
}

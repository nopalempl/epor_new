<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\models\Billing;

class LaporanStrukController extends Controller
{
    public function index(Request $request)
    {
        // Inisialisasi query dasar
        $billings = Billing::all();
        $query = Billing::join('daftar_usaha', 'billing.npwrd', '=', 'daftar_usaha.npwrd')
            ->select(
                'billing.*',
                'daftar_usaha.nama as daftarUsaha_nama',
                'daftar_usaha.alamat_usaha as daftarUsaha_alamat'
            );

        if ($request->filled('nama')) {
            $query->where('daftar_usaha.nama', $request->nama);
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('billing.tanggal_rekam', [$request->start_date, $request->end_date]);
        }

        $billings = $query->get();

        if ($request->ajax()) {
            return response()->json($billings);
        }

        return view('pages.laporan.struk.index', compact('billings'));
    }
    public function cetakPdf(Request $request)
    {
        $pdf = Pdf::loadView('pages.laporan.struk.cetak');


        return $pdf->stream('cetak-laporan.struk.pdf');
    }
}

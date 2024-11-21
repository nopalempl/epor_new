<?php

namespace App\Http\Controllers;

use App\Models\PermohonanFaktur;
use App\Models\DaftarUsaha;
use Illuminate\Http\Request;
use App\Models\PermohonanFakturDetil;

class PermohonanFakturController extends Controller
{

    public function index()
    {
        $daftarUsaha = DaftarUsaha::all();
        $currentYear = date('y');
        $currentMonth = date('m');
        $lastPermohonan = PermohonanFaktur::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->latest()->first();

        $nomorUrut = $lastPermohonan ? intval(substr($lastPermohonan->no_permohonan, -6)) + 1 : 1; // 

        $nomorPermohonan = sprintf('%s%s%06d', $currentYear, $currentMonth, $nomorUrut);

        return view('pages.permohonan.faktur.index', compact('daftarUsaha', 'nomorPermohonan'));
    }
    public function getData($npwrd)
    {
        $daftarUsaha = DaftarUsaha::where('npwrd', $npwrd)->first();

        if ($daftarUsaha) {
            return response()->json($daftarUsaha);
        }

        return response()->json(['message' => 'Data tidak ditemukan.'], 404);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'no_permohonan' => 'required|string|max:255',
            'nm_wr' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'npwrd' => 'required|string|max:21',
            'alamat_usaha' => 'required|string|max:255',
            'no_handphone' => 'required|digits_between:10,15',
            'pemilik' => 'required|string|max:255',

            // Validate as array inputs
            'no_seri' => 'required|array',
            'no_seri.*' => 'required|string',
            'no_awal' => 'required|array',
            'no_awal.*' => 'required|integer',
            'no_akhir' => 'required|array',
            'no_akhir.*' => 'required|integer',
            'jml_lembar' => 'required|array',
            'jml_lembar.*' => 'required|integer',
            'tarif' => 'required|array',
            'tarif.*' => 'required|integer',
            'total' => 'required|array',
            'total.*' => 'required|integer',
        ]);


        try {
            $permohonanFaktur = PermohonanFaktur::create([
                'no_permohonan' => $request->no_permohonan,
                'nm_wr' => $request->nm_wr,
                'nama' => $request->nama,
                'npwrd' => $request->npwrd,
                'alamat_usaha' => $request->alamat_usaha,
                'no_handphone' => $request->no_handphone,
                'pemilik' => $request->pemilik,
            ]);

            foreach ($request->no_seri as $index => $noSeri) {
                PermohonanFakturDetil::create([
                    'no_seri' => $noSeri,
                    'no_awal' => $request->no_awal[$index],
                    'no_akhir' => $request->no_akhir[$index],
                    'jml_lembar' => $request->jml_lembar[$index],
                    'tarif' => $request->tarif[$index],
                    'total' => $request->total[$index],
                    'no_permohonan' => $permohonanFaktur->id,
                ]);
            }
        } catch (\Exception $e) {
            return back()->withErrors([
                'error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()
            ])->withInput();
        }

        return redirect()->route('pages.permohonan.faktur.index')->with('success', 'Data berhasil disimpan!');
    }
}
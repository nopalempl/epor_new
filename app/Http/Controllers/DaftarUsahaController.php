<?php

namespace App\Http\Controllers;

use App\Models\DaftarUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\VerifikasiPermohonan;

class DaftarUsahaController extends Controller
{
    public function index()
    {
        $daftarUsaha = DaftarUsaha::latest()->get();
        return view('pages.daftar.usaha.index', compact('daftarUsaha'));
    }

    public function lihat($id)
    {
        $usaha = DaftarUsaha::findOrFail($id);
        return view('pages.daftar.usaha.lihat', compact('usaha'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'no_registrasi' => 'required|string',
            'nm_wr' => 'required|string',
            'npwrd1' => 'required|string|max:4',
            'npwrd2' => 'required|string|max:4',
            'npwrd3' => 'required|string|max:4',
            // 'npwrd4' => 'required|string|max:4',
            // 'npwrd5' => 'required|string|max:5',
            'nama' => 'required|string|max:100',
            'email' => 'required|string',
            'kota' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg',
            'id_kelurahan' => 'required|integer',
            'id_kecamatan' => 'required|integer',
            'no_handphone' => 'required|string|max:15',
            'alamat_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:50',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $originalFileName = $request->file('foto')->getClientOriginalName();
            $filePath = $request->file('foto')->storeAs('foto', $originalFileName, 'public');
            $fotoPath = '' . $originalFileName;
        }

        $npwrd = implode('', [
            $request->npwrd1,
            $request->npwrd2,
            $request->npwrd3,
            // $request->npwrd4,
            // $request->npwrd5,
        ]);

        if (DaftarUsaha::where('npwrd', $npwrd)->exists()) {
            return back()->withErrors(['npwrd' => 'NPWRD sudah terdaftar.'])->withInput();
        }

        try {
            DaftarUsaha::create([
                'no_registrasi' => $request->no_registrasi,
                'nm_wr' => $request->nm_wr,
                'npwrd' => $npwrd,
                'nama' => $request->nama,
                'email' => $request->email,
                'kota' => $request->kota,
                'foto' => $fotoPath,
                'kd_kelurahan' => $request->id_kelurahan,
                'kd_kecamatan' => $request->id_kecamatan,
                'no_handphone' => $request->no_handphone,
                'alamat_usaha' => $request->alamat_usaha,
                'pemilik' => $request->pemilik ?? null,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors([
                'error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()
            ])->withInput();
        }

        return redirect()->route('pages.registrasi.index')
            ->with('success', 'Pendaftaran berhasil!');
    }

    public function edit($id)
    {
        $usaha = DaftarUsaha::findOrFail($id);
        return view('pages.registrasi.edit', compact('usaha'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'no_registrasi' => 'required|string',
            'nm_wr' => 'required|string|max:20',
            'npwrd' => 'required|string|max:20',
            'nama' => 'required|string|max:100',
            'email' => 'required|string',
            'kota' => 'required|string',
            'id_kelurahan' => 'required|integer',
            'id_kecamatan' => 'required|integer',
            'no_handphone' => 'required|string|max:15',
            'alamat_usaha' => 'required|string|max:255',
            'pemilik' => 'nullable|string|max:50',
            'foto' => 'image|mimes:jpeg,png,jpg',
        ]);

        $usaha = DaftarUsaha::findOrFail($id);

        $fotoPath = $usaha->foto;

        if ($request->hasFile('foto')) {
            $originalFileName = $request->file('foto')->getClientOriginalName();
            $fotoPath = $request->file('foto')->storeAs('foto', $originalFileName, 'public');
            $fotoPath = '' . $originalFileName;
        }

        $usaha->update([
            'no_registrasi' => $request->no_registrasi,
            'nm_wr' => $request->nm_wr,
            'npwrd' => $request->npwrd,
            'nama' => $request->nama,
            'email' => $request->email,
            'kota' => $request->kota,
            'kd_kelurahan' => $request->id_kelurahan,
            'kd_kecamatan' => $request->id_kecamatan,
            'no_handphone' => $request->no_handphone,
            'alamat_usaha' => $request->alamat_usaha,
            'pemilik' => $request->pemilik,
            'foto' => $fotoPath,
        ]);

        VerifikasiPermohonan::where('npwrd', $usaha->npwrd)->update([
            'nm_wr' => $request->nm_wr,
            'alamat_usaha' => $request->alamat_usaha,
            'no_handphone' => $request->no_handphone,
            'pemilik' => $request->pemilik,
        ]);

        $usaha->save();

        return redirect()->back()->with('success', 'Data usaha berhasil diperbarui.');
    }

    public function destroy($id)
    {
        try {
            $usaha = DaftarUsaha::findOrFail($id);
            $usaha->delete();

            return redirect()->route('pages.daftar.usaha.index')
                ->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->withErrors([
                'error' => 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage()
            ]);
        }
    }

    public function cetakPdf($id)
    {
        $usaha = DaftarUsaha::findOrFail($id);

        $pdf = PDF::loadView('pages.daftar.usaha.cetak', compact('usaha'));

        return $pdf->stream('daftar_usaha_' . $usaha->id . '.pdf');
    }

    public function getNpwrdSequence($kd_kecamatan)
    {

        $latestNpwrd = DaftarUsaha::where('kd_kecamatan', $kd_kecamatan)
            ->orderBy('npwrd', 'desc')
            ->first();


        $sequence = $latestNpwrd ? (int) substr($latestNpwrd->npwrd, -4) + 1 : 1;

        return response()->json(['sequence' => str_pad($sequence, 4, '0', STR_PAD_LEFT)]);
    }
}

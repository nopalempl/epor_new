@extends('layouts.default')

@section('title', 'Validasi Permohonan')

@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Pelayanan</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pages.verifikasi.permohonan.index') }}">Verifikasi Permohonan</a></li>
        <li class="breadcrumb-item active">Validasi</li>
    </ol>

    <h1>Validasi Permohonan</h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fas fa-check-circle icon"></i>
            <div class="title">Validasi Permohonan</div>
        </div>

        <div class="panel-body">
            <form action="{{ route('verifikasi.permohonan.validateRequest', $permohonan->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="npwrd">NPWRD</label>
                    <input type="text" id="npwrd" name="npwrd" value="{{ $permohonan->npwrd }}" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="nama_wr">Nama WR</label>
                    <input type="text" id="nama_wr" name="nama_wr" value="{{ $permohonan->nm_wr }}" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="alamat_usaha">Alamat Usaha</label>
                    <input type="text" id="alamat_usaha" name="alamat_usaha" value="{{ $permohonan->alamat_usaha }}" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="tanggal_permohonan">Tanggal Permohonan</label>
                    <input type="text" id="tanggal_permohonan" name="tanggal_permohonan" value="{{ \Carbon\Carbon::parse($permohonan->tanggal_permohonan)->format('d-m-Y') }}" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="no_awal">No Awal</label>
                    <input type="number" id="no_awal" name="no_awal" value="{{ $permohonan->no_awal }}" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="no_akhir">No Akhir</label>
                    <input type="number" id="no_akhir" name="no_akhir" value="{{ $permohonan->no_akhir }}" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="jml_lembar">Jumlah Lembar</label>
                    <input type="number" id="jml_lembar" name="jml_lembar" value="{{ $permohonan->jml_lembar }}" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control">
                        <option value="Diterima" {{ $permohonan->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="Ditolak" {{ $permohonan->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
@endsection

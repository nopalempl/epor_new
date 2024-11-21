@extends('layouts.default')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="invoice p-3 mb-3">
          <div class="row">
            <div class="col-12">
              <h4>
                <i class="fas fa-globe"></i> Pemerintah Kota Batu.
                <small class="float-right">Date: {{ now()->format('Y/m/d H:i:s') }}</small>
              </h4>
            </div>
          </div>
          
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              Pihak Pertama :
              <address>
                <strong>Dinas Perhubungan.</strong><br>
                Gedung Balai Kota among Tani<br>
                Jl. Panglima Sudirman No.507<br>
                Phone: (0341) xxxxxxx<br>
                Email: info@dishub.batukota.go.id
              </address>
            </div>
            <div class="col-sm-4 invoice-col">
              Pihak Kedua :
              <address>
              <strong>{{ strtoupper($permohonan->nm_wr) }}</strong><br>
              {{ strtoupper($permohonan->alamat_usaha) }}<br>
              Kelurahan  {{ $permohonan->daftarUsaha->kelurahan->nm_kelurahan }} Kecamatan {{ $permohonan->daftarUsaha->kecamatan->nm_kecamatan }}<br> 
              Phone: {{ $permohonan->no_handphone }}<br>
              Nomor: {{ $permohonan->npwrd }}/{{ now()->format('y') }}  
              </address>
            </div>
            <div class="col-sm-4 invoice-col">
              <b>No Permohonan:</b> {{ $permohonan->id }}<br>
              <b>Tanggal Permohonan:</b> {{ \Carbon\Carbon::parse($permohonan->tanggal_permohonan)->format('d-m-Y') }}<br>
              <b>Status:</b> {{ $permohonan->status }}
            </div>
          </div>

          <div class="row">
            <div class="col-6">
              <p class="lead">Pernyataan:</p>
              <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                Pada hari {{ hariIndo(now()->format('l')) }}, Tanggal {{ tglIndo(now()->format('Y-m-d')) }} telah diserah terimakan Benda Berharga dengan rincian di atas.
              </p>
            </div>
            <div class="col-6 text-right">
              <p class="lead">Tanda Tangan:</p>
              <br><br>
              <p>(_________________)</p>
            </div>
          </div>

          <div class="row no-print">
            <div class="col-12">
              <a href="{{ url('prn-ba-karcis?sid=' . $permohonan->id) }}" target="_blank" class="btn btn-default">
                <i class="fas fa-print"></i> Print
              </a>
              <a href="{{ url()->previous() }}" class="btn btn-success float-right">
                <i class="far fa-arrow-alt-circle-left"></i> Back
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection

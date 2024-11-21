@extends('layouts.default')

@section('title', 'Form Validation')

@push('scripts')
	<script src="/assets/plugins/parsleyjs/dist/parsley.min.js"></script>
	<script src="/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
	<script src="/assets/js/demo/render.highlight.js"></script>
@endpush

@section('content')
	<!-- BEGIN breadcrumb -->
	<ol class="breadcrumb float-xl-end">
		<li class="breadcrumb-item"><a href="javascript:;">Pelayanan</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Permohonan Retur Struk</a></li>
	</ol>
	<!-- END breadcrumb -->
	<!-- BEGIN page-header -->
	<h1 class="page-header">Permohonan Retur Struk</h1>
	<!-- END page-header -->
	<!-- BEGIN row -->
	<div class="row">
		<!-- BEGIN col-6 -->
		<div class="col-xl-20">
			<!-- BEGIN panel -->
			<div class="panel panel-inverse" data-sortable-id="form-validation-1">
				<!-- BEGIN panel-heading -->
                <div class="container-fluid mt-3">
        <!-- Row for header (No Permohonan and Date) -->
        <!-- Row for select dropdown and information panel -->
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <label for="wajibRetribusi" class="form-label me-2 mb-0">Pilih Wajib Retribusi</label>
                    <select id="wajibRetribusi" class="form-select w-auto">
                        <option selected>-- Pilih Daftar Wajib Retribusi --</option>
                        <!-- Options for retribusi -->
                    </select>
                </div>
            </div>
        </div>
        <!-- Panel for displaying selected information -->
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Informasi Wajib Retribusi</h5>
                    <hr>
                    <p><strong>NPWRD :</strong></p>
                    <p><strong>Lokasi Usaha :</strong></p>
                    <p><i class="fa fa-building"></i> Alamat :</p>
                    <p><i class="fa fa-phone"></i> Phone :</p>
                </div>
            </div>
        </div>
    </div>
				<div class="panel-body">
					<form class="form-horizontal" data-parsley-validate="true" name="demo-form">
						<div class="form-group row mb-3">
							<label class="col-sm-2 col-form-label form-label" for="fullname">Nomor Seri</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" id="fullname" name="fullname" placeholder="Nomor Seri" data-parsley-required="true" />
							</div>
						</div>
						<div class="form-group row mb-3">
							<label class="col-sm-2 col-form-label form-label" for="fullname">Nomor Awal</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" id="fullname" name="fullname" placeholder="Nomor Awal" data-parsley-required="true" />
							</div>
						</div>
						<div class="form-group row mb-3">
							<label class="col-sm-2 col-form-label form-label" for="fullname">Nomor Akhir</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" id="fullname" name="fullname" placeholder="Nomor Akhir" data-parsley-required="true" />
							</div>
						</div>
						<div class="form-group row mb-3">
							<label class="col-sm-2 col-form-label form-label" for="email">Jumlah Lembar</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" id="email" name="email" data-parsley-type="email" placeholder="Jumlah Lembar" data-parsley-required="true" />
							</div>
						</div>
						<div class="form-group row mb-3">
							<label class="col-sm-2 col-form-label form-label" for="website">Tahun</label>
							<div class="col-lg-8">
								<input class="form-control " type="url" id="website" name="website" data-parsley-type="url" placeholder="Tahun" />
							</div>
						</div>
						<div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-danger me-2">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
					</form>
				</div>
				<!-- END panel-body -->
				<!-- BEGIN hljs-wrapper -->
				<div class="hljs-wrapper">
					
				</div>
				<!-- END hljs-wrapper -->
			</div>
            <script>
  $('#data-table-default').DataTable({
    responsive: true
  });
</script>
			<!-- END panel -->
		</div>
		<!-- END col-6 -->
		
@endsection

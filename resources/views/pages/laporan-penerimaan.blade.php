@extends('layouts.default')

@section('title', 'Managed Tables - Buttons')

@push('css')
	<link href="/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" />
@endpush

@push('scripts')
	<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="/assets/plugins/pdfmake/build/pdfmake.min.js"></script>
	<script src="/assets/plugins/pdfmake/build/vfs_fonts.js"></script>
	<script src="/assets/plugins/jszip/dist/jszip.min.js"></script>
	<script src="/assets/js/demo/table-manage-buttons.demo.js"></script>
	<script src="/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
	<script src="/assets/js/demo/render.highlight.js"></script>
@endpush

@section('content')
	<!-- BEGIN breadcrumb -->
	<ol class="breadcrumb float-xl-end">
		<li class="breadcrumb-item"><a href="javascript:;">Laporan</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Laporan Penerimaan</a></li>
	</ol>
	<!-- END breadcrumb -->
	<!-- BEGIN page-header -->
	<h1>Laporan Penerimaan</h1>
	<!-- END page-header -->
	<!-- BEGIN row -->
	<div class="row">
		<!-- BEGIN col-2 -->
		<!-- END col-2 -->
		<!-- BEGIN col-10 -->
		<div class="col-xl-12">
			<!-- BEGIN panel -->
			<div class="panel panel-default">
                    <!-- BEGIN panel-heading -->
                    <div class="panel-heading">
        <i class="fas fa-sign-in-alt icon"></i>
        <div class="title">Daftar Setoran Pajak</div>
    </div>
            <div class="container-fluid mt-3">
			<div class="row mb-3">
            <div class="col-xs-6 col-sm-2">
			<div class="d-flex flex-column align-items-start">
                    <label for="wajibRetribusi" class="form-label me-2 mb-3">Tanggal Awal :</label>
                    <div>
                        <div class="input-group-date" id="searchStartDate" data-target-input="nearest">
                            <input type="date" class="form-control datetimepicker-input StartDate" id="StartDate" maxlength="10" placeholder="yyyy-mm-dd" data-target="#searchStartDate">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
			<div class="d-flex flex-column align-items-start">
                    <label for="wajibRetribusi" class="form-label me-1 mb-3">Tanggal Akhir :</label>
                    <div>
                        <div class="input-group-date" id="searchEndDate" data-target-input="nearest">
                            <input type="date" class="form-control datetimepicker-input Endate" id="EtartDate" maxlength="10" placeholder="yyyy-mm-dd" data-target="#searchEndDate">
                        </div>
                    </div>
                </div>
            </div>
        </div>
		</div>
				<!-- BEGIN panel-heading -->
				<!-- BEGIN panel-body -->
				<div class="panel-body">
					<table id="data-table-buttons" class="table table-striped table-bordered align-middle">
						<thead>
							<tr>
								<th width="1%">NO.</th>
								<th class="text-nowrap">NPWRD</th>
								<th class="text-nowrap">NAMA</th>
								<th class="text-nowrap">ID BILLING</th>
								<th class="text-nowrap">JUMLAH SETORAN</th>
                                <th class="text-nowrap">NTPD</th>
                                <th class="text-nowrap">TGL SETOR</th>
                                <th class="text-nowrap">AKSI</th>
							</tr>
						</thead>
						<tbody>
							<tr class="odd gradeX">
								<td width="1%" class="fw-bold text-dark">1</td>
								<td>Trident</td>
								<td>Internet Explorer 4.0</td>
								<td>Win 95+</td>
								<td>4</td>
								<td>X</td>
                                <td></td>
								<td>
						<button class="btn btn-success btn-sm me-2">
						<i class="fas fa-edit"></i>
					</button> 
					</td>
							</tr>
							<tr class="even gradeC">
								<td width="1%" class="fw-bold text-dark">2</td>
								<td>Trident</td>
								<td>Internet Explorer 5.0</td>
								<td>Win 95+</td>
								<td>5</td>
								<td>C</td>
                                <td></td>
								<td>
						<button class="btn btn-success btn-sm me-2">
						<i class="fas fa-edit"></i>
					</button> 
					</td>
							</tr>
							<tr class="odd gradeA">
								<td width="1%" class="fw-bold text-dark">3</td>
								<td>Trident</td>
								<td>Internet Explorer 5.5</td>
								<td>Win 95+</td>
								<td>5.5</td>
								<td>A</td>
                                <td></td>
								<td>
						<button class="btn btn-success btn-sm me-2">
						<i class="fas fa-edit"></i>
					</button> 
					</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- END panel-body -->
				<!-- BEGIN hljs-wrapper -->
<script>
  $('#data-table-default').DataTable({
    responsive: true,
    dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
    buttons: [
      { extend: 'copy', className: 'btn-sm' },
      { extend: 'csv', className: 'btn-sm' },
      { extend: 'excel', className: 'btn-sm' },
      { extend: 'pdf', className: 'btn-sm' },
      { extend: 'print', className: 'btn-sm' }
    ],
  });
</script>
				</div>
				<!-- END hljs-wrapper -->
			</div>
			<!-- END panel -->
		</div>
		<!-- END col-10 -->
	</div>
	<!-- END row -->
@endsection
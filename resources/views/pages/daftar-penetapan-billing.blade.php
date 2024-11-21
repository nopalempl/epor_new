@extends('layouts.default')

@section('title', 'Managed Tables')

@push('css')
	<link href="/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
@endpush

@push('scripts')
	<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
	<script src="/assets/js/demo/table-manage-default.demo.js"></script>
	<script src="/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
	<script src="/assets/js/demo/render.highlight.js"></script>
	<script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')
	<!-- BEGIN breadcrumb -->
	<ol class="breadcrumb float-xl-end">
		<li class="breadcrumb-item"><a href="javascript:;">Penetapan</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Daftar Penetapan Biling</a></li>
	</ol>
	<!-- END breadcrumb -->
	<!-- BEGIN page-header -->
	<h1>DAFTAR PENETAPAN</h1>
	<!-- END page-header -->
	<!-- BEGIN panel -->
	<div class="panel panel-default">
                    <!-- BEGIN panel-heading -->
                    <div class="panel-heading">
        <i class="fas fa-sign-in-alt icon"></i>
        <div class="title">Daftar Billing</div>
    </div>
		<!-- END panel-heading -->
		<!-- BEGIN panel-body -->
		<div class="panel-body">
			<table id="data-table-default" class="table table-striped table-bordered align-middle">
				<thead>
					<tr>
						<th width="1%">No.</th>
						<th class="text-nowrap">NPWRD</th>
						<th class="text-nowrap">NAMA</th>
						<th class="text-nowrap">ID BILLING</th>
						<th class="text-nowrap">TAHUN PAJAK</th>
						<th class="text-nowrap">TANGGAL REKAM</th>
						<th class="text-nowrap">STATUS</th>
						<th class="text-nowrap" width="1%">AKSI</th>
					</tr>
				</thead>
				<tbody>
    @foreach ($billings as $key => $billing)
    <tr class="{{ $key % 2 == 0 ? 'even' : 'odd' }} gradeX">
        <td width="1%" class="fw-bold text-dark">{{ $key + 1 }}</td>
        <td>{{ $billing->npwrd }}</td>
        <td>{{ $billing->nama }}</td>
        <td>{{ $billing->id_billing }}</td>
        <td>{{ $billing->tahun_pajak }}</td>
        <td>{{ $billing->tanggal_rekam }}</td>
        <td>{{ $billing->status }}</td>
        <td>
            <button class="btn btn-success btn-sm me-2">
                <i class="fas fa-edit"></i>
            </button> 
        </td>
    </tr>
    @endforeach
</tbody>

			</table>
		</div>
		<script>
  $('#data-table-default').DataTable({
    responsive: true
  });
</script>
		<!-- END panel-body -->
	</div>
	<!-- END panel -->
@endsection
@extends('_layouts.app')

@section('title', 'Data Buku')

@section('content')
	
	@if (session()->has('success'))
		<div class="alert alert-success alert-dismissible">
		  <span>{{ session('success' )}}</span>
		  <button class="close" data-dismiss="alert">&times;</button>
		</div>
	@endif

	<div id="alert"></div>

	<div class="card shadow">
		<div class="card-header py-2 d-flex justify-content-between align-items-center">
			<h2 class="h6 m-0 font-weight-bold text-primary">Data Buku</h2>
			<a href="{{ route('book.create') }}" class="btn btn-sm btn-primary shadow">Tambah Buku</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode</th>
							<th>Nama</th>
							<th>Rak</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

@endsection

@push('css')
	<link rel="stylesheet" href="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@push('js')
	<script src="{{ asset('sbadmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

	<script>
		const ajaxUrl = '{{ route('book.datatables') }}'
		const deleteUrl = '{{ route('book.destroy', ':id') }}'
		const csrf = '{{ csrf_token() }}'
	</script>

	<script src="{{ asset('js/book.js') }}"></script>
@endpush
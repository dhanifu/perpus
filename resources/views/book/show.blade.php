@extends('_layouts.app')

@section('title', 'Detail Buku')

@section('content')

	<div class="row">
		<div class="col-lg-6 mb-4">
			<img src="{{ $book->photoSrc }}" class="img-fluid rounded">
		</div>
		<div class="col-lg-6">
			<div class="card shadow">
				<div class="card-header py-3">
					<h2 class="h6 m-0 font-weight-bold text-primary">Data Buku</h2>
				</div>
				<div class="card-body">
					<dl class="row">
						<dt class="col-4">Judul</dt>
						<dd class="col-1">:</dd>
						<dd class="col-7">{{ $book->title }}</dd>
						<dt class="col-4">Kode</dt>
						<dd class="col-1">:</dd>
						<dd class="col-7">{{ $book->code }}</dd>
						<dt class="col-4">Penulis</dt>
						<dd class="col-1">:</dd>
						<dd class="col-7">{{ $book->writer }}</dd>
						<dt class="col-4">Penerbit</dt>
						<dd class="col-1">:</dd>
						<dd class="col-7">{{ $book->publisher }}</dd>
						<dt class="col-4">Tahun Terbit</dt>
						<dd class="col-1">:</dd>
						<dd class="col-7">{{ $book->year }}</dd>
						<dt class="col-4">Rak</dt>
						<dd class="col-1">:</dd>
						<dd class="col-7">{{ $book->rack->name }}</dd>
						<dt class="col-4">Status</dt>
						<dd class="col-1">:</dd>
						<dd class="col-7">{!! $book->statusBadge !!}</dd>
					</dl>
				</div>
				<div class="card-footer">
					<a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">Edit</a>
					<a href="{{ route('book.index') }}" class="btn btn-secondary">Kembali</a>
				</div>
			</div>
		</div>
	</div>


@endsection
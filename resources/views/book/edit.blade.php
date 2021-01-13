@extends('_layouts.app')

@section('title', 'Edit Buku')

@section('content')
	
	<div class="col-lg-6 mx-auto">
		<div class="card shadow">
		<form action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="card-header py-3">
				<h2 class="h6 m-0 font-weight-bold text-primary">Edit Buku</h2>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>Judul</label>
					<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $book->title }}" placeholder="Judul" autofocus>

					@error('title')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Kode Buku</label>
							<input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ $book->code }}" placeholder="Kode Buku">

							@error('code')
								<span class="invalid-feedback">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Penulis</label>
							<input type="text" class="form-control @error('writer') is-invalid @enderror" name="writer" value="{{ $book->writer }}" placeholder="Penulis">

							@error('writer')
								<span class="invalid-feedback">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Penerbit</label>
							<input type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher" value="{{ $book->publisher }}" placeholder="Penerbit">

							@error('publisher')
								<span class="invalid-feedback">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Tahun Terbit</label>
							<input type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ $book->year }}" placeholder="Tahun Terbit">

							@error('year')
								<span class="invalid-feedback">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Rak</label>
					<select class="form-control custom-select @error('rack_id') is-invalid @enderror" name="rack_id">
						<option value="{{ $book->rack->id }}">{{ $book->rack->name }}</option>
					</select>

					@error('rack_id')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label>Gambar</label>
					<div class="custom-file">
						<label class="custom-file-label">{{ $book->photo }}</label>
						<input type="file" class="form-control custom-file-input @error('photo') is-invalid @enderror" name="photo" value="{{ $book->photo }}">

						@error('photo')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-primary shadow" type="submit">Edit</button>
				<a href="{{ route('book.index') }}" class="btn btn-secondary shadow">Batal</a>
			</div>
		</form>
		</div>
	</div>

@endsection

@push('css')
	<link rel="stylesheet" href="{{ asset('sbadmin/vendor/select2/css/select2.min.css') }}">
@endpush

@push('js')
	<script src="{{ asset('sbadmin/vendor/select2/js/select2.min.js') }}"></script>
	<script src="{{ asset('sbadmin/vendor/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
	<script>	
		$(function () {
			bsCustomFileInput.init()

			$('select').select2({
				placeholder: 'Rak',
				ajax: {
					url: '{{ route('rack.search') }}',
					type: 'post',
					data: params => ({
						name: params.term,
						_token: '{{ csrf_token() }}'
					}),
					processResults: res => ({
						results: res
					}),
					cache: true
				}
			})
		})
	</script>
@endpush
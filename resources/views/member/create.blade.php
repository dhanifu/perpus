@extends('_layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
	
	<div class="col-lg-6 mx-auto">
		<div class="card shadow">
		<form action="{{ route('member.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="card-header py-3">
				<h2 class="h6 m-0 font-weight-bold text-primary">Tambah Anggota</h2>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama" autofocus>

					@error('name')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select class="form-control custom-select @error('gender') is-invalid @enderror" name="gender">
						<option value="Pria">Pria</option>
						<option value="Wanita">Wanita</option>
					</select>

					@error('gender')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label>Telepon</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Telepon" autofocus
                            maxlength="13" onkeypress="return onlyNumber(event)">

					@error('phone')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Alamat">{{ old('address') }}</textarea>

					@error('address')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-primary shadow" type="submit">Tambah</button>
				<a href="{{ route('member.index') }}" class="btn btn-secondary shadow">Batal</a>
			</div>
		</form>
		</div>
	</div>

@endsection
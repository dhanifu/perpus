@extends('_layouts.app')

@section('title', 'Tambah Petugas')

@section('content')
	
	<div class="col-lg-6 mx-auto">
		<div class="card shadow">
		<form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="card-header py-3">
				<h2 class="h6 m-0 font-weight-bold text-primary">Tambah Petugas</h2>
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
					<label>Email</label>
					<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">

					@error('email')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password">

							@error('password')
								<span class="invalid-feedback">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Ulangi Password</label>
							<input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Telepon</label>
					<input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Telepon"
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
				<a href="{{ route('user.index') }}" class="btn btn-secondary shadow">Batal</a>
			</div>
		</form>
		</div>
	</div>

@endsection
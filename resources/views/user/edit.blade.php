@extends('_layouts.app')

@section('title', 'Edit Petugas')

@section('content')
	
	<div class="col-lg-6 mx-auto">
		<div class="card shadow">
		<form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="card-header py-3">
				<h2 class="h6 m-0 font-weight-bold text-primary">Edit Petugas</h2>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" placeholder="Nama" autofocus>

					@error('name')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="Email">

					@error('email')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label>Telepon</label>
					<input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" placeholder="Telepon"
							maxlength="13" onkeypress="return onlyNumber(event)">

					@error('phone')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Alamat">{{ $user->address }}</textarea>

					@error('address')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-primary shadow" type="submit">Edit</button>
				<a href="{{ route('user.index') }}" class="btn btn-secondary shadow">Batal</a>
			</div>
		</form>
		</div>
	</div>

@endsection
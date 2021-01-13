<div class="card shadow">
	<div class="card-header py-3">
		<h2 class="card-title h6 font-weight-bold text-primary m-0">Tambah Rak</h2>
	</div>
	<div class="card-body">
		<form wire:submit.prevent="store">
			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" placeholder="Nama" autofocus>

				@error('name')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
			<button class="btn btn-primary shadow" type="submit">Tambah</button>
		</form>
	</div>
</div>
<div class="row">

	<div class="col-sm-4 mb-4">
		<livewire:rack.create />
	</div>
	<div class="col-sm-8">
		@if (session()->has('success'))
			<div class="alert alert-success alert-dismissible">
				<span>{{ session('success') }}</span>
				<button class="close" data-dismiss="alert">&times;</button>
			</div>
		@endif
		<div class="card shadow">
			<div class="card-header py-3">
				<h2 class="card-title h6 font-weight-bold text-primary m-0">Data Rak</h2>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Rak</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($racks as $rack)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $rack->name }}</td>
									<td>
										<button class="btn btn-success btn-sm" wire:click="$emit('edit', {{ $rack->id }})"><i class="fa fa-edit"></i></button>
										<button class="btn btn-danger btn-sm" onclick="remove()" wire:click="$emit('delete', {{ $rack->id }})"><i class="fa fa-trash"></i></button>
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="3" align="center">Kosong</td>
								</tr>
							@endforelse
						</tbody>
					</table>
				</div>
				{{ $racks->links() }}
			</div>
		</div>
	</div>

	<livewire:rack.edit />

</div>

@push('js')
	<script>
		const remove = function () {
			return confirm('Yakin hapus data ini?') || event.stopImmediatePropagation()
		}
	</script>
@endpush
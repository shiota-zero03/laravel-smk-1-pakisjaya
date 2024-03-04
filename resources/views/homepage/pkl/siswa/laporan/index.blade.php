@extends('homepage.pkl.siswa.layout')
@section('title', 'Absensi')
@section('pageheader', 'Absensi Siswa PKL')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[2].classList.add('active')
  document.getElementsByClassName('menu-dropdown')[3].classList.add('bg-secondary')
</script>
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal PKL</th>
				<th>Status Absen</th>
				<th>Laporan Absen</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			@foreach($absen as $abs)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $abs->tangal_absen }}</td>
					<td>{{ $abs->status_absen }}</td>
					<td>
						<form method="post" action="{{ route('siswa.storeabsensi') }}">
							@csrf
							<input type="hidden" name="id_absen" value="{{ $abs->id_absen }}">
							<textarea name="laporan" required="" readonly="" class="form-control mb-2" id="area-{{ $abs->id_absen }}">{{ $abs->laporan_absen }}</textarea>
							<button onclick="edit({{ $abs->id_absen }})" class="btn btn-warning" type="button">Edit</button>
							<button name="simpanlaporan" class="btn btn-primary d-none" id="simpan-{{ $abs->id_absen }}">Simpan</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$('#datatable').dataTable()
	function edit(id){
		$('#area-'+id).removeAttr('readonly')
		$('#simpan-'+id).removeClass('d-none')
	}
</script>
@endsection
@extends('admin.layout')
@section('title', 'Penilaian PKL')
@section('pageheader', 'Penilaian PKL')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[3].classList.add('active')
</script>
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>NIS</th>
				<th>Lokasi PKL</th>
				<th>Rata - Rata Nilai</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			@foreach($member as $mem)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $mem->nama }}</td>
					<td>{{ $mem->no_identitas }}</td>
					<td>{{ $mem->lokasi_pkl }}</td>
					<?php
						$avgketerampilan = DB::table('penilaians')->where('id_member', '=', $mem->id_member)->average('nilai');
					?>
					<td>{{ number_format($avgketerampilan, 2, ',', '') }}</td>
					<td>
						<a href="{{ route('admin.penilaian') }}/lihat-penilaian/{{ $mem->id_member }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$('#datatable').dataTable()
</script>
@endsection
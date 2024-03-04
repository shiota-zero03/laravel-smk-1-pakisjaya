@extends('pembimbing-industri.layout')
@section('title', 'Absensi PKL')
@section('pageheader', 'Absensi PKL')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[1].classList.add('active')
  document.getElementsByClassName('menu-dropdown')[0].classList.add('bg-secondary')
</script>
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>NIS</th>
				<th>Lokasi PKL</th>
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
					<td>
						<a href="{{ route('industri.pembimbing.absensipkl') }}/lihat-absensi/{{ $mem->id_member }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
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
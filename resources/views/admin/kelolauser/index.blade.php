@extends('admin.layout')
@section('title', 'Kelola User')
@section('pageheader', 'Kelola User')
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
				<th>Email</th>
				<th>Status Akun</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			@foreach($member as $mem)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $mem->nama }}</td>
					<td>{{ $mem->email }}</td>
					<td>@if($mem->status_akun == 'Nonactive') <span class="text-danger"><em>{{ $mem->status_akun }}</em></span><br><a href="{{ route('admin.user') }}/aktifkan/{{ $mem->id_member }}" class="btn btn-warning">Aktifkan Akun</a> @else <span class="text-success"><em>{{ $mem->status_akun }}</em></span> @endif</td>
					<td>
						<a href="{{ route('admin.user') }}/view/{{ $mem->id_member }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
						<a href="{{ route('admin.user') }}/delete/{{ $mem->id_member }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
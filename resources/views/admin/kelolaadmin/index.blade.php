@extends('admin.layout')
@section('title', 'Kelola Admin')
@section('pageheader', 'Kelola Admin')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[1].classList.add('active')
  document.getElementsByClassName('menu-dropdown')[1].classList.add('bg-secondary')
</script>
<form class="p-2 border border-dark rounded" method="post" action="{{ route('admin.add') }}">
	@csrf
	<h3>Tambah Admin</h3>
	<hr>
	<div class="row">
		<div class="col-md-4">
			<label>Username</label>
			<input type="text" name="username" class="form-control" required="">
		</div>
		<div class="col-md-4">
			<label>Password</label>
			<input type="password" name="password" class="form-control" required="">
		</div>
		<div class="col-md-4 position-relative">
			<button class="btn btn-primary position-absolute" style="bottom: 0">Tambah</button>
		</div>
	</div>
</form>
<br>
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Username</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			@foreach($member as $mem)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $mem->username }}</td>
					<td>
						<a href="{{ route('admin.admin') }}/delete/{{ $mem->id_admin }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
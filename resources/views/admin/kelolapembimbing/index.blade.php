@extends('admin.layout')
@section('title', 'Kelola Pembimbing PKL')
@section('pageheader', 'Kelola Pembimbing PKL')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[2].classList.add('active')
  document.getElementsByClassName('menu-dropdown')[4].classList.add('bg-secondary')
</script>
<form class="p-2 border border-dark rounded" method="post" action="{{ route('admin.add.pembimbingindustripkl') }}">
	@csrf
	<h3>Tambah Pembimbing PKL</h3>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<label>Nama Lokasi PKL</label>
			<input type="text" name="nama" class="form-control" required="">
		</div>
		<div class="col-md-3">
			<label>Username</label>
			<input type="text" name="username" class="form-control" required="">
		</div>
		<div class="col-md-3">
			<label>Password</label>
			<input type="password" name="password" class="form-control" required="">
		</div>
		<div class="col-md-3 position-relative">
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
				<th>Nama Lokasi PKL</th>
				<th>Username</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			@foreach($pembimbing as $mem)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $mem->nama }}</td>
					@if($mem->username == null)
					<td><em class="text-danger">Belum Memiliki Username</em></td>
					@else
					<td>{{ $mem->username }}</td>
					@endif
					<td>
						<button id="{{ $mem->id_pembimbing }}" class="edit btn btn-warning"><i class="fas fa-edit"></i></button>
						<a href="{{ route('admin.industripkl') }}/delete/{{ $mem->id_pembimbing }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="modal fade" id="updatedata" tabindex="-1" aria-labelledby="updatedatalabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content bg-light text-dark">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="updatedatalabel">Update Userdata Pembimbing</h1>
        <i class="fas fa-window-close close-button" id="tutup" data-bs-dismiss="modal" aria-label="close"></i>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.update.pembimbingindustripkl') }}" method="post" id="updateform">
          @csrf
          <div class="container">
              <input type="hidden" class="form-control" name="id_pembimbing" required>
            <div class="form-group mb-2">
              <label>Nama Industri PKL</label>
              <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group mb-2">
              <label>Username</label>
              <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group mb-2">
              <label>Password</label>
              <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group mb-2">
              <button class="btn btn-dark btn-outline-info w-100 py-2"><b>SUBMIT</b></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$('#datatable').dataTable()
	$(document).on('click', '.edit', function(){
		let id = $(this).attr('id')
		var url = '{{route("admin.json.pembimbing")}}';
		$.get(url, {id:id}, function(data){
			var up = $('#updateform');
			$(up).find('input[name="id_pembimbing"]').val(data.data.id_pembimbing)
			$(up).find('input[name="nama"]').val(data.data.nama)
			$(up).find('input[name="username"]').val(data.data.username)
			$(up).find('input[name="password"]').val(data.data.password)

			$('#updatedata').modal('show')
			console.log(data)
		}, 'json');
	})
</script>
@endsection
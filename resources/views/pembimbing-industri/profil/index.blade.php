@extends('pembimbing.layout')
@section('title', 'Profil')
@section('pageheader', 'Profil Pembimbing')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[1].classList.add('active')
  document.getElementsByClassName('menu-dropdown')[0].classList.add('bg-secondary')
</script>
<form method="post" action="{{ route('update.pembimbing') }}" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-3">
			<img id="foto_show" @if($pembimbing->foto_guru == null) src="{{ asset('assets/images/logo.png') }}" @else src="{{ asset('assets/images/guru/'.$pembimbing->foto_guru) }}" @endif width="100%" class="rounded border border-dark border-3">
			<label>Ganti Foto</label>
			<input id="foto_profil" type="file" name="foto_guru" class="form-control" accept="image/svg, image/png, image/jpg, image/jpeg">
		</div>
		<div class="col-md-9">
			<div class="form-group">
				<label>Nama Guru</label>
				<input type="text" name="nama_guru" value="{{ $pembimbing->nama_guru }}" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>NIP Guru</label>
				<input type="number" name="nip_guru" value="{{ $pembimbing->nip_guru }}" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Password Guru</label>
				<input type="password" name="password" value="{{ $pembimbing->password }}" class="form-control" required="">
			</div>
			<div class="form-group">
				<button class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</form>
<br><br>
<script type="text/javascript">
	let logo = document.getElementById('foto_profil');
    let logofet = document.getElementById('foto_show');
    logo.addEventListener('change', function () {
        gambar(this);
    })
    function gambar(a) {
        if (a.files && a.files[0]) {     
            var reader = new FileReader();    
            reader.onload = function (e) {
                logofet.src=e.target.result;
            }    
            reader.readAsDataURL(a.files[0]);
        }
    }
</script>
@endsection
@extends('homepage.pkl.siswa.layout')
@section('title', 'Edit Profil')
@section('pageheader', 'Edit Profil Siswa PKL')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[1].classList.add('active')
  document.getElementsByClassName('menu-dropdown')[0].classList.add('bg-secondary')
</script>
<form method="post" enctype="multipart/form-data" action="{{ route('siswa.updateprofil') }}">
	@csrf
	<div class="row">
		<div class="col-md-6 col-12">
			<div class="row">
				<div class="col-md-4 col-12">
					<img id="foto_show" @if($member->foto_profil == null) src="{{ asset('assets/images/logo.png') }}" @else src="{{ asset('assets/images/profil/'.$member->foto_profil) }}" @endif width="100%" class="rounded border border-dark border-3">
				</div>
				<div class="col-md-8 col-12">
					<h4 class="my-0">{{ $member->nama }}</h4>
					<span class="my-0">{{ $member->no_identitas }}</span>
					<hr>
					<label>Ganti Foto</label>
					<input id="foto_profil" type="file" name="foto_profil" class="form-control" accept="image/svg, image/png, image/jpg, image/jpeg">
				</div>
			</div>
		</div>
		<div class="col-md-6 col-12">
			<h5><strong>Status : @if($member->status_pkl == 'Sedang PKL') <span class="text-success">{{ $member->status_pkl }}</span>@else<span class="text-danger">{{ $member->status_pkl }}</span>@endif</strong></h5>
			@if($member->status_pkl != 'Belum PKL')
			<h6><strong>Mulai : </strong>{{ date('F, d Y', strtotime($member->mulai_pkl)) }}</h6>
			<h6><strong>Selesai : </strong>{{ date('F, d Y', strtotime($member->selesai_pkl)) }}</h6>
			@endif
		</div>
		<div class="col-md-6 col-12">
			<br>
			<h4 class="my-0">Informasi Umum</h4>
			<hr class="my-0">
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="text" name="nama" value="{{ $member->nama }}" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Nomor Induk Siswa (NIS)</label>
				<input type="number" name="no_identitas" value="{{ $member->no_identitas }}" class="form-control" required="">
			</div>
			<div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" name="tempat_lahir" value="{{ $member->tempat_lahir }}" class="form-control" required="">
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input type="date" name="tanggal_lahir" value="{{ $member->tanggal_lahir }}" class="form-control" required="">
		</div>
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<input type="text" name="jenis_kelamin" value="{{ $member->jenis_kelamin }}" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>No Telepon</label>
				<input type="number" name="no_telepon" value="{{ $member->no_telepon }}" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" class="form-control" required="">{{ $member->alamat }}</textarea>
			</div>
		</div>
		<div class="col-md-6 col-12">
			<br>
			<h4 class="my-0">Informasi Orangtua</h4>
			<hr class="my-0">
			<div class="form-group">
				<label>Nama Orangtua / Wali</label>
				<input type="text" name="nama_orangtua" required="" value="{{ $member->nama_orangtua }}" class="form-control">
			</div>
			<div class="form-group">
				<label>No. Telp Orangtua / Wali</label>
				<input type="number" name="no_telepon_orangtua" value="{{ $member->no_telepon_orangtua }}" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Alamat Orangtua / Wali</label>
				<textarea name="alamat_orangtua" class="form-control">{{ $member->alamat_orangtua }}</textarea>
			</div>
			<br>
			<h4 class="my-0">Informasi Kelas</h4>
			<hr class="my-0">
			<div class="form-group">
				<label>Keahlian</label>
				<input type="text" name="keahlian" value="{{ $member->keahlian }}" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Pembimbing Industri</label>
				<input type="text" name="pembimbing_industri" value="{{ $member->pembimbing_industri }}" class="form-control">
			</div>
		</div>
	</div>
	<button name="profilupdate" class="btn btn-warning w-100">Simpan</button>
</form>
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
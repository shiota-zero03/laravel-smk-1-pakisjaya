@extends('admin.layout')
@section('title', 'Profil')
@section('pageheader', 'Profil Siswa PKL')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[1].classList.add('active')
  document.getElementsByClassName('menu-dropdown')[0].classList.add('bg-secondary')
</script>
<div class="row">
	<div class="col-md-6 col-12">
		<div class="row">
			<div class="col-md-4 col-12">
				<img @if($member->foto_profil == null) src="{{ asset('assets/images/logo.png') }}" @else src="{{ asset('assets/images/profil/'.$member->foto_profil) }}" @endif width="100%" class="rounded border border-dark border-3">
			</div>
			<div class="col-md-8 col-12">
				<h4 class="my-0">{{ $member->nama }}</h4>
				<span>{{ $member->no_identitas }}</span><br><br>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-12">
		<h5><strong>Status : @if($member->status_pkl == 'Sedang PKL') <span class="text-success">{{ $member->status_pkl }}</span>@else<span class="text-danger">{{ $member->status_pkl }}</span>@endif</strong></h5>
		@if($member->status_pkl == 'Sedang PKL' || $member->status_pkl == 'Selsai PKL')
		<h6><strong>Lokasi PKL : </strong>{{ $member->lokasi_pkl }}</h6>
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
			<input type="text" name="name" readonly="" value="{{ $member->nama }}" class="form-control">
		</div>
		<div class="form-group">
			<label>Nomor Induk Siswa (NIS)</label>
			<input type="number" name="nis" readonly="" value="{{ $member->no_identitas }}" class="form-control">
		</div>
		<div class="form-group">
			<label>Tempat, Tanggal Lahir</label>
			<input type="text" name="name" readonly="" value="{{ $member->tempat_lahir }}@if($member->tanggal_lahir != null) - {{ date('F, d Y', strtotime($member->tanggal_lahir)) }} @endif" class="form-control">
		</div>
		<div class="form-group">
			<label>Jenis Kelamin</label>
			<input type="text" name="gender" readonly="" value="{{ $member->jenis_kelamin }}" class="form-control">
		</div>
		<div class="form-group">
			<label>No Telepon</label>
			<input type="number" name="phone" readonly="" value="{{ $member->no_telepon }}" class="form-control">
		</div>
		<div class="form-group">
			<label>Alamat</label>
			<textarea name="address" readonly="" class="form-control">{{ $member->alamat }}</textarea>
		</div>
	</div>
	<div class="col-md-6 col-12">
		<br>
		<h4 class="my-0">Informasi Orangtua</h4>
		<hr class="my-0">
		<div class="form-group">
			<label>Nama Orangtua</label>
			<input type="text" name="parents_name" readonly="" value="{{ $member->nama_orangtua }}" class="form-control">
		</div>
		<div class="form-group">
			<label>No. Telp Orangtua</label>
			<input type="number" name="parents_phone_number" readonly="" value="{{ $member->no_telepon_orangtua }}" class="form-control">
		</div>
		<div class="form-group">
			<label>Alamat Orangtua</label>
			<textarea name="parents_address" readonly="" class="form-control">{{ $member->alamat_orangtua }}</textarea>
		</div>
		<br>
		<h4 class="my-0">Informasi Kelas</h4>
		<hr class="my-0">
		<div class="form-group">
			<label>Keahlian</label>
			<input type="text" name="keahlian" readonly="" value="{{ $member->keahlian }}" class="form-control">
		</div>
		<div class="form-group">
			<label>Pembimbing Sekolah</label>
			<input type="text" name="pembimbing_sekolah" readonly="" value="{{ $member->pembimbing_sekolah }}" class="form-control">
		</div>
		<div class="form-group">
			<label>Pembimbing Industri</label>
			<input type="text" name="pembimbing_industri" readonly="" value="{{ $member->pembimbing_industri }}" class="form-control">
		</div>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-6">
		<h4 class="my-0">Informasi Penilaian</h4>
		<hr>
		<h6 class="my-0">Rata - Rata nilai pelaksanaan</h6>
		<span>0</span>
		<br>
		<h6 class="my-0">Rata - Rata nilai Keterampilan</h6>
		<span>0</span>
		<br>
	</div>
	<div class="col-md-6">
		<h4 class="my-0">Informasi Kehadiran</h4>
		<hr>
		<div class="row">
			<div class="col-4 text-center">
				<strong>Hadir<br>0</strong>
			</div>
			<div class="col-4 text-center">
				<strong>Izin<br>0</strong>
			</div>
			<div class="col-4 text-center">
				<strong>Alfa<br>0</strong>
			</div>
		</div>
	</div>
</div>
<br><hr>
<script type="text/javascript">
	$('#jadwal_pkl').slideUp()
	$('#ajukan').on('click', function(){
		$('#jadwal_pkl').slideToggle()
	})
</script>
@endsection
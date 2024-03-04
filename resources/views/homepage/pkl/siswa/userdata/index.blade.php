@extends('homepage.pkl.siswa.layout')
@section('title', 'User Data')
@section('pageheader', 'User Data Siswa PKL')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[1].classList.add('active')
  document.getElementsByClassName('menu-dropdown')[1].classList.add('bg-secondary')
</script>
<form method="post" action="{{ route('siswa.updateprofil') }}">
	@csrf
	<div class="row">
		<div class="col-md-6 col-12">
			<div class="row">
				<div class="col-md-4 col-12">
					<img @if($member->foto_profil == null) src="{{ asset('assets/images/logo.png') }}" @else src="{{ asset('assets/images/profil/'.$member->foto_profil) }}" @endif width="100%" class="rounded border border-dark border-3">
				</div>
				<div class="col-md-8 col-12">
					<h4 class="my-0">{{ $member->nama }}</h4>
					<span>{{ $member->no_identitas }}</span>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-12">
			<label>Username</label>
			<input required="" type="text" name="username" class="form-control" value="{{ $member->username }}">
		</div>
		<div class="col-md-6 col-12">
			<label>Email</label>
			<input required="" type="email" name="email" class="form-control" value="{{ $member->email }}">
		</div>
		<div class="col-md-6 col-12">
			<label>Password Lama</label>
			<input type="password" name="password_lama" class="form-control">
		</div>
		<div class="col-md-6 col-12">
			<label>Password Baru</label>
			<input type="password" name="password_baru" class="form-control">
		</div>
	</div>
	<br>
	<button name="userdata" class="btn btn-success w-100">Simpan</button>
	<hr>
</form>
@endsection
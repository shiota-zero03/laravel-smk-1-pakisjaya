@extends('pembimbing.layout')
@section('title', 'Dashboard')
@section('pageheader', 'Dashboard Pembimbing')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[0].classList.add('active')
</script>
<div class="row">
	<div class="col-md-4">
		<div class="alert alert-primary">
			<h2>{{ $pembimbing->nama_guru }}</h2>
			<hr>
			<h4>{{ $pembimbing->nip_guru }}</h4>
		</div>
	</div>
	<div class="col-md-4">
		<div class="alert alert-success">
			<h2>Total Siswa Bimbingan</h2>
			<hr>
			<h4>{{ $member }}</h4>
		</div>
	</div>
	<div class="col-md-4">
		<div class="alert alert-info">
			<h2>Siswa Bimbingan Aktif</h2>
			<hr>
			<h4>{{$member2 }}</h4>
		</div>
	</div>
</div>
<br>
<hr>
<br>
@endsection
@extends('pembimbing-industri.layout')
@section('title', 'Dashboard')
@section('pageheader', 'Dashboard Pembimbing')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[0].classList.add('active')
</script>
<div class="row">
	<div class="col-lg-4 col-12">
		<div class="bg-primary p-2 rounded">
			<h4 class="text-white my-0"><i class="fas fa-user-secret me-2"></i>Nama Lokasi PKL</h4>
			<div class="border border-white border-1 my-2"></div>
			<h3 class="my-0 text-white">{{ $pembimbing->nama }}</h3>
		</div>
	</div>
	<div class="col-lg-4 col-12">
		<div class="bg-info p-2 rounded">
			<h4 class="text-white my-0"><i class="fas fa-user me-2"></i>Total Siswa Bimbingan</h4>
			<div class="border border-white border-1 my-2"></div>
			<h3 class="my-0 text-white">{{ $member }}</h3>
		</div>
	</div>
	<div class="col-lg-4 col-12">
		<div class="bg-success p-2 rounded">
			<h4 class="text-white my-0"><i class="fas fa-users me-2"></i>Siswa Bimbingan Aktif</h4>
			<div class="border border-white border-1 my-2"></div>
			<h3 class="my-0 text-white">{{$member2 }}</h3>
		</div>
	</div>
</div>
<br>
<hr>
<br>
@endsection
@extends('admin.layout')
@section('title', 'Dashboard')
@section('pageheader', 'Dashboard Admin')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[0].classList.add('active')
</script>
<div class="row">
	<div class="col-lg-3 col-md-6 col-12">
		<div class="bg-primary p-2 rounded">
			<h4 class="text-white my-0"><i class="fas fa-user-secret me-2"></i>Admin</h4>
			<div class="border border-white border-1 my-2"></div>
			<h3 class="my-0 text-white">{{ $admin }}</h3>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-12">
		<div class="bg-info p-2 rounded">
			<h4 class="text-white my-0"><i class="fas fa-user me-2"></i>Guru</h4>
			<div class="border border-white border-1 my-2"></div>
			<h3 class="my-0 text-white">{{ $guru }}</h3>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-12">
		<div class="bg-success p-2 rounded">
			<h4 class="text-white my-0"><i class="fas fa-users me-2"></i>Siswa PKL</h4>
			<div class="border border-white border-1 my-2"></div>
			<h3 class="my-0 text-white">{{ $member }}</h3>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-12">
		<div class="bg-warning p-2 rounded">
			<h4 class="text-white my-0"><i class="fas fa-users me-2"></i>Siswa PKL Aktif</h4>
			<div class="border border-white border-1 my-2"></div>
			<h3 class="my-0 text-white">{{ $pkl }}</h3>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-3 col-md-6 col-12">
		<div class="bg-primary p-2 rounded">
			<h4 class="text-white my-0"><i class="fas fa-newspaper me-2"></i>Berita</h4>
			<div class="border border-white border-1 my-2"></div>
			<h3 class="my-0 text-white">{{ $berita }}</h3>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-12">
		<div class="bg-info p-2 rounded">
			<h4 class="text-white my-0"><i class="fas fa-baseball me-2"></i>Ekskul</h4>
			<div class="border border-white border-1 my-2"></div>
			<h3 class="my-0 text-white">{{ $ekskul }}</h3>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-12">
		<div class="bg-success p-2 rounded">
			<h4 class="text-white my-0"><i class="fas fa-trophy me-2"></i>Prestasi</h4>
			<div class="border border-white border-1 my-2"></div>
			<h3 class="my-0 text-white">{{ $prestasi }}</h3>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-12">
		<div class="bg-warning p-2 rounded">
			<h4 class="text-white my-0"><i class="fas fa-building me-2"></i>Program Studi</h4>
			<div class="border border-white border-1 my-2"></div>
			<h3 class="my-0 text-white">4<h3>
		</div>
	</div>
</div>
<br>
<hr>
<br>
@endsection
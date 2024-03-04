@extends('homepage.pkl.siswa.layout')
@section('title', 'Dashboard')
@section('pageheader', 'Dashboard Siswa PKL')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[0].classList.add('active')
</script>
<div class="row">
	<div class="col-md-6 col-12">
		<div class="bg-primary p-2 rounded">
			<h4 class="text-white my-0"><i class="fas fa-user-secret me-2"></i>Status PKL</h4>
			<div class="border border-white border-1 my-2"></div>
			<h5 class="my-0 text-white">{{ $member->status_pkl }}</h5>
			@if($member->status_pkl == 'Sedang PKL')
				<h6 class="my-0 text-white"><em>{{ date('F, d Y', strtotime($member->mulai_pkl)) }} - {{ date('F, d Y', strtotime($member->selesai_pkl)) }}</em></h6>
			@endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="bg-success p-2 rounded">
			<h5 class="text-white my-0"><i class="fas fa-check me-2"></i>Hadir</h5>
			<div class="border border-white border-1 my-2"></div>
			<h6 class="my-0 text-white">{{ $hadir }} Hari</h6>
		</div>
	</div>
	<div class="col-md-2">
		<div class="bg-warning p-2 rounded">
			<h5 class="text-white my-0"><i class="fas fa-info me-2"></i>Izin</h5>
			<div class="border border-white border-1 my-2"></div>
			<h6 class="my-0 text-white">{{ $izin }} Hari</h6>
		</div>
	</div>
	<div class="col-md-2">
		<div class="bg-danger p-2 rounded">
			<h5 class="text-white my-0"><i class="fas fa-close me-2"></i>Belum Hadir</h5>
			<div class="border border-white border-1 my-2"></div>
			<h6 class="my-0 text-white">{{ $alfa }} Hari</h6>
		</div>
	</div>
</div>
<br>
<hr>
<br>
@endsection
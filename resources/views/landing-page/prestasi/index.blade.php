@extends('landing-page.layout')
@section('title', 'Galeri Prestasi')
@section('content')
<script type="text/javascript">
	document.getElementsByClassName('cover-menu-top')[5].classList.add('active')
</script>
<section class="py-5">
	<div class="container">
		<h3 class="text-center my-0">Prestasi SMKN 1 Pakisjaya</h3>
		<div class="border border-dark border-2 my-3"></div>
		<div class="row">
				@foreach($prestasi as $pers)
				<div class="col-lg-3 col-md-6 col-12 text-center">
					<div>
						<div class="overflow-hidden rounded border border-dark py-3 px-3 my-2">
							<img src="{{ asset('assets/images/prestasi/'.$pers->foto_prestasi) }}" width="175px" height="175px" class="rouded border border-secondary border-3">
							<br> <br>
							<h6 class="my-0">{{ $pers->nama_prestasi }}</h6>
							<small class="my-0"><em>({{ date('F, d Y', strtotime($pers->tanggal_prestasi)) }})</em></small>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		{{ $prestasi->links('vendor.pagination.default') }}
	</div>
</section>

@endsection
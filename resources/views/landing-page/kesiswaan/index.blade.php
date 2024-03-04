@extends('landing-page.layout')
@section('title', 'Kesiswaan')
@section('content')
<style type="text/css">
	@media screen and (min-width: 992px){
		.sejarah img{
			width: 210px;
			height: 210px;
		}
	}
	@media screen and (min-width: 768px) and (max-width: 991px){
		.sejarah img{
			width: 240px;
			height: 240px;
		}
	}
	@media screen and (max-width: 767px){
		.sejarah img{
			width: 80%;
		}
	}
</style>
<script type="text/javascript">
	document.getElementsByClassName('cover-menu-top')[3].classList.add('active')
</script>
<section class="py-5">
	<div class="container">
		<h3 class="text-center my-0">OSIS SMKN 1 Pakisjaya</h3>
		<div class="border border-dark border-2 my-3"></div>
		<img src="{{ asset('assets/images/galeri/'.$osis->foto) }}" class="w-100">
	</div>
</section>
<section class="py-5">
	<div class="container">
		<h3 class="text-center my-0">Ekstrakurikuler SMKN 1 Pakisjaya</h3>
		<div class="border border-dark border-2 my-3"></div>
		<div class="row">
			@foreach($ekskul as $eks)
			    <div class="col-lg-3 col-md-6">
			    	<div class="bg-yellow rounded text-center py-3">
				    	<div style="">
				    		<img src="{{ asset('assets/images/ekskul/'.$eks->icon_ekskul) }}" width="70px" height="70px">
				    	</div>
				    	<br>
				    	<h5>{{ $eks->nama_ekskul }}</h5>
				    </div>
			    </div>
		    @endforeach
		</div>
	</div>
</section>
@endsection
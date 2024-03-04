@extends('landing-page.layout')
@section('title', 'Program Studi')
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
	document.getElementsByClassName('cover-menu-top')[2].classList.add('active')
</script>
<section class="py-5">
	<div class="container">
		<h3 class="text-center my-0">Program Studi SMKN 1 Pakisjaya</h3>
		<div class="border border-dark border-2 my-3"></div>
		<div class="sejarah">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12 my-md-4 my-2">
					<div class="text-center">
			    		<img class="rounded" src="{{ asset('assets/images/prodi/Rectangle 265.png') }}" ><br>
			    	</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12 my-md-4 my-2">
					<div class="text-center">
			    		<img class="rounded" src="{{ asset('assets/images/prodi/Rectangle 265-2.png') }}" ><br>
			    	</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12 my-md-4 my-2">
					<div class="text-center">
			    		<img class="rounded" src="{{ asset('assets/images/prodi/Rectangle 265-1.png') }}" ><br>
			    	</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12 my-md-4 my-2">
					<div class="text-center">
			    		<img class="rounded" src="{{ asset('assets/images/prodi/Rectangle 265-3.png') }}" ><br>
			    	</div>
				</div>
			</div>
		</div>
</section>
@endsection
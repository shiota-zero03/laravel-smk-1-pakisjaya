@extends('landing-page.layout')
@section('title', 'Guru dan Staff')
@section('content')
<style type="text/css">
	@media screen and (min-width: 992px){
		.sejarah img{
			width: 210px;
			height: 280px;
		}
	}
	@media screen and (min-width: 768px) and (max-width: 991px){
		.sejarah img{
			width: 180px;
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
		<h3 class="text-center my-0">Guru dan Staff SMKN 1 Pakisjaya</h3>
		<div class="border border-dark border-2 my-3"></div>
		<div class="sejarah">
			<div class="row">
				@foreach($guru as $teacher)
				<div class="col-lg-3 col-md-4 col-12 my-md-4 my-2">
					<div class="text-center">
			    		<img class="rounded" src="{{ asset('assets/images/guru/'.$teacher->foto_guru) }}" ><br>
			    		<h6 class="mb-0 mt-2"><strong>{{ $teacher->nama_guru }}</strong></h6>
			    		<small><em>NIP. {{ $teacher->nip_guru }}</em></small>
			    	</div>
				</div>
				@endforeach
			</div>
			{{ $guru->links('vendor.pagination.default') }}
		</div>
</section>
@endsection
@extends('landing-page.layout')
@section('title', 'Berita')
@section('content')
<style type="text/css">
	@media screen and (max-width: 599px){
		.berita-cover{
			height: 200px;
			overflow: hidden;
			position: relative;
		}
		.berita-cover img{
			filter: brightness(50%);
		}
		.berita-content{
			background-color: rgba(255, 255, 255, 0.7);
			position: absolute;
			bottom: 0;
			width: 100%;
			padding: 5px;
			font-weight: 600;
			font-family: 'Barlow Condensed', sans-serif;
		}
	}
	@media screen and (min-width: 600px) and (max-width: 999px){
		.berita-cover{
			height: 200px;
			overflow: hidden;
			position: relative;
		}
		.berita-cover img{
			filter: brightness(50%);
		}
		.berita-content{
			background-color: rgba(255, 255, 255, 0.7);
			position: absolute;
			bottom: 0;
			width: 100%;
			padding: 5px;
			font-weight: 600;
			font-family: 'Barlow Condensed', sans-serif;
		}
	}
	@media screen and (min-width: 1000px){
		.berita-cover{
			height: 180px;
			overflow: hidden;
			position: relative;
		}
		.berita-cover img{
			filter: brightness(50%);
		}
		.berita-content{
			background-color: rgba(255, 255, 255, 0.7);
			position: absolute;
			bottom: 0;
			width: 100%;
			padding: 5px;
			font-weight: 600;
			font-family: 'Barlow Condensed', sans-serif;
		}
	}
</style>
<script type="text/javascript">
	document.getElementsByClassName('cover-menu-top')[4].classList.add('active')
</script>
<section class="py-5">
	<div class="container">
		<h3 class="text-center my-0">Berita SMKN 1 Pakisjaya</h3>
		<div class="border border-dark border-2 my-3"></div>
		<div class="row">
			@foreach($berita as $news)
			    <div class="col-lg-4 col-md-6 col-12 my-2">
			    	<div class="bg-dark py-2 px-2" style="border-radius: 10px">
				    	<a href="{{ route('berita') }}/view/{{ $news->id_berita }}" class="text-decoration-none text-dark">
					    	<div class="berita-cover">
					    		<img src="{{ asset('assets/images/berita/'.$news->feature_image) }}">
					    		<div class="berita-content">
					    			<div>
								    	<div class="float-start">
								    		<small><i class="fas fa-user"></i> {{ $news->author }} </small>
								    	</div>
								    	<div class="float-end text-end">
								    		<small><i class="fas fa-calendar-days"></i> {{ date('F, d Y', strtotime($news->tanggal_berita)) }} </small>
								    	</div>
								    	<div class="clearfix"></div>
								    </div>
							    	<hr class="my-1">
							    	<h5 class="my-0">{{ $news->judul_berita }}</h5>
							    </div>
					    	</div>
					    </a>
					</div>
			    </div>
		    @endforeach
		</div>
		{{ $berita->links('vendor.pagination.default') }}
	</div>
</section>

@endsection
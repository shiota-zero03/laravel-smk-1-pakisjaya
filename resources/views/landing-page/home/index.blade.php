@extends('landing-page.layout')
@section('title', 'Home')
@section('content')

<script type="text/javascript">
	document.getElementsByClassName('cover-menu-top')[0].classList.add('active')
</script>
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
	@media screen and (max-width: 767px){
		img.kepsek{
			width: 200px;
		}
		.text-sambutan{
			line-height: 20px;
			text-align: justify;
		}
		.text-sambutan-2{
			line-height: 20px;
			text-align: justify;
		}
	}
	@media screen and (min-width: 768px){
		img.kepsek{
			width: 100%;
		}
		.text-sambutan-2{
			line-height: 20px;
			text-align: right;
		}
	}

</style>
<section>
	<img src="{{ asset('assets/images/banner-home.png') }}" width="100%">
</section>
<br>
<section class="py-5">
	<div class="container">
		<div class="d-md-flex align-items-center">
			<div class="col-md-3 col-12 text-center">
				<h3 class="mt-0 mb-2 d-md-none"><strong>Sambutan Kepala Sekolah</strong></h3>
				<img class="kepsek" src="{{ asset('assets/images/sambutan.png') }}"  class="rounded">
			</div>
			<div class="col-md-1"><br></div>
			<div class="col-md-8 col-12 text-sambutan">
				<h3 class="my-0 d-md-block d-none"><strong>Sambutan Kepala Sekolah</strong></h3>
				<hr class="w-75 my-2 d-md-block d-none">
				<span>Sebagai lembaga pendidikan, SMK Negeri 1 Pakisjaya tanggap dengan perkembangan teknologi tersebut. Dengan dukungan Sumber Daya Manusia yang dimiliki sekolah ini siap untuk berkompetisi dengan sekolah lain dalam pelayanan informasi publik. Teknologi Informasi Web khususnya, menjadi sarana bagi SMK Negeri 1 Pakisjaya untuk memberi pelayanan informasi secara cepat, jelas, dan akuntable. Dari layanan ini pula, sekolah siap menerima saran dari semua pihak yang akhirnya dapat menjawab Kebutuhan masyarakat. (Solihin Al Amin, S.Pd., M.Pd)</span>
			</div>
		</div>
	</div>
</section>
<br>
<section class="bg-light-gray py-5">
	<div class="container">
		<div class="d-md-flex align-items-center">
			<div class="col-md-3 col-12 text-center d-md-none">
				<h3 class="mt-0 mb-2 d-md-none"><strong>Profil SMKN 1 Pakisjaya</strong></h3>
				<img class="kepsek" src="{{ asset('assets/images/profil.png') }}"  class="rounded">
			</div>
			<div class="col-md-8 col-12 text-sambutan-2">
				<h3 class="my-0 d-md-block d-none"><strong>Profil SMKN 1 Pakisjaya</strong></h3>
				<hr class="w-75 my-2 d-md-block d-none">
				<span>SMK Negeri 1 Pakisjaya adalah salah satu dari sekian banyak SMK yang ada di Kabupaten Karawang, berdiri sejak tahun 2011. Pada mulanya sekolah ini berdiri dipimpin oleh Drs, H. Endang Supritna, M.M dan berakhir pada bulan juli hingga desember tahun 2011.  Selanjutnya tonggak kepemimpinan di ambil oleh Drs. Agus Rukmawan, S. Ip. M.M dari januari tahun 2012 hingga desember tahun 2013. Pada bulan januari 2014 hingga April 2015 dipimpin oleh Drs. H. Supandi, M.M dan bulan maret 2015 hingga juni 2015 digantikan oleh Drs. H. Suardi, M. Pd. </span><br><br>
				<a href="{{ route('sejarah') }}" class="btn bg-yellow text-decoration-none text-dark">Baca Selengkapnya</a>
			</div>
			<div class="col-md-1"><br></div>
			<div class="col-md-3 col-12 text-center d-md-block d-none">
				<img class="kepsek" src="{{ asset('assets/images/profil.png') }}"  class="rounded">
			</div>
		</div>
	</div>
</section>
<section class="py-5">
	<div class="container">
		<div class="px-md-5 py-md-4 px-3 py-3">
			<div class="d-md-flex align-items-center">
				<div class="col-md-8">
					<h3>Prestasi Terbaru</h3>
				</div>
				<div class="col-md-4 text-end d-md-block d-none">
					<small><a href="{{ route('prestasi') }}" class="text-decoration-none text-primary">Lihat Selengkapnya <i class="fas fa-arrow-right ms-2"></i></a></small>
				</div>
			</div>
			<div style="border: 1px solid #FFE605" class="my-4"></div>
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
			<div class="text-center mt-4 d-md-none">
				<a href="{{ route('prestasi') }}" class="btn btn-outline-dark">Lihat Selengkapnya <i class="fas fa-arrow-right ms-2"></i></a>
			</div>
		</div>
	</div>
</section>
<section class="py-5 bg-light-gray">
	<div class="container">
		<div class="px-md-5 py-md-4 px-3 py-3 container">
			<h3 class="text-center">Ekstrakurikuler</h3>
			<div style="border: 1px solid #000" class="my-4"></div>
			<div class="owl-carousel owl-theme" id="ekskul">
				@foreach($ekskul as $eks)
				    <div class="item bg-yellow rounded text-center py-3">
				    	<div style="width: 72px; margin-left: calc(50% - 36px)">
				    		<img src="{{ asset('assets/images/ekskul/'.$eks->icon_ekskul) }}" width="72px" height="72px">
				    	</div>
				    	<br>
				    	<h5>{{ $eks->nama_ekskul }}</h5>
				    </div>
			    @endforeach
			</div>
			<div class="text-center mt-4">
				<a href="{{ route('kesiswaan') }}" class="btn btn-outline-dark">Lihat Selengkapnya <i class="fas fa-arrow-right ms-2"></i></a>
			</div>
		</div>
	</div>
</section>
<section class="py-5">
	<div class="container">
		<div class="px-md-5 py-md-4 px-3 py-3 container">
			<h3 class="text-center">Guru dan Staff</h3>
			<div style="border: 1px solid #000" class="my-4"></div>
			<div class="owl-carousel owl-theme" id="guru">
				@foreach($guru as $teacher)
				    <div class="item rounded text-center py-3">
				    	<div style="width: 124px; margin-left: calc(50% - 62px)">
				    		<img src="{{ asset('assets/images/guru/'.$teacher->foto_guru) }}" width="100" height="165.3px" >
				    	</div>
				    </div>
			    @endforeach
			</div>
			<div class="text-center mt-4">
				<a href="{{ route('gurustaff') }}" class="btn btn-outline-dark">Lihat Selengkapnya <i class="fas fa-arrow-right ms-2"></i></a>
			</div>
		</div>
	</div>
</section>
</section>
<section class="py-5 bg-light-gray">
	<div class="container">
		<div class="px-md-5 py-md-4 px-3 py-3">
			<div class="d-md-flex align-items-center">
				<div class="col-md-8">
					<h3>Berita Terbaru</h3>
				</div>
				<div class="col-md-4 text-end d-md-block d-none">
					<small><a href="{{ route('berita') }}" class="text-decoration-none text-primary">Lihat Selengkapnya <i class="fas fa-arrow-right ms-2"></i></a></small>
				</div>
			</div>
			<div style="border: 1px solid #000" class="my-4"></div>
			<div class="owl-carousel owl-theme" id="berita">
				@foreach($berita as $news)
				    <div class="item bg-dark px-3 py-3" style="border-radius: 10px">
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
			    @endforeach
			</div>
			<div class="text-center mt-4 d-md-none">
				<a href="" class="btn btn-outline-dark">Lihat Selengkapnya <i class="fas fa-arrow-right ms-2"></i></a>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">

    $('#ekskul').owlCarousel({
	    items:4,
	    loop:true,
	    margin:10,
	    autoplay:true,
	    autoplayTimeout:2000,
	    autoplayHoverPause:true,
	    nav: false,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:2
	        },
	        1000:{
	            items:4
	        }
	    }
	})
	$('#guru').owlCarousel({
	    items:4,
	    loop:true,
	    margin:10,
	    autoplay:true,
	    autoplayTimeout:2000,
	    autoplayHoverPause:true,
	    nav: false,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:3
	        },
	        1000:{
	            items:5
	        }
	    }
	})
	$('#berita').owlCarousel({
	    items:4,
	    loop:true,
	    margin:10,
	    autoplay:true,
	    autoplayTimeout:2500,
	    autoplayHoverPause:true,
	    nav: false,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:2
	        },
	        1000:{
	            items:3
	        }
	    }
	})
</script>
@endsection
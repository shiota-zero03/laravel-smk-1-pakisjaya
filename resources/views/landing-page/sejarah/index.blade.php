@extends('landing-page.layout')
@section('title', 'Sejarah')
@section('content')

<script type="text/javascript">
	document.getElementsByClassName('cover-menu-top')[2].classList.add('active')
</script>
<style type="text/css">
	@media screen and (min-width: 992px){
		.sejarah img{
			width: 50%;
			border-radius: 10px;
		}
	}
	@media screen and (min-width: 768px) and (max-width: 991px){
		.sejarah img{
			width: 75%;
			border-radius: 10px;
		}
	}
	@media screen and (max-width: 767px){
		.sejarah img{
			width: 80%;
			border-radius: 10px;
		}
	}
</style>
<section class="py-5">
	<div class="container">
		<h3 class="text-center my-0">Sejarah SMKN 1 Pakisjaya</h3>
		<br>
		<div class="sejarah">
			<div class="text-center">
				<img src="{{ asset('assets/images/profil.png') }}">
			</div>
			<div class="py-md-5 py-3" style="text-align: justify;">
				<span>SMK Negeri 1 Pakisjaya adalah salah satu dari sekian banyak SMK yang ada di Kabupaten Karawang, berdiri sejak tahun 2011. Pada mulanya sekolah ini berdiri dipimpin oleh Drs, H. Endang Supritna, M.M dan berakhir pada bulan juli hingga desember tahun 2011. Selanjutnya tonggak kepemimpinan di ambil oleh Drs. Agus Rukmawan, S. Ip. M.M dari januari tahun 2012 hingga desember tahun 2013. Pada bulan januari 2014 hingga April 2015 dipimpin oleh Drs. H. Supandi, M.M dan bulan maret 2015 hingga juni 2015 digantikan oleh Drs. H. Suardi, M. Pd. Pada bulan juli 2015 hungga bulan juni 2017 kepemimpinan sekolah diduduki oleh Drs. H. Yosmar Sumargana, M. Pd., dan digantikan oleh Edi Gunawan, S. Pd., M. Pd dari bulan juli 2017 hingga bulan juni 2018. Dari bulan juli 2018 hingga bulan juli 2020 sekarang SMKN 1 Pakisjaya masih dibawah kepemimpinan Bapak Iwan Sutiawan, S. Pd. Selanjutnya dari bulan Juli 2020 hingga sekarang berada di bawah pimpinan Bapak Solihin Al Amin, S. Pd., M. Pd. Sekolah yang berdiri di tanah seluas ± 2,2 hektar ini beralamat di Dsn Telukbuyung Desa Telukbuyung Kec. Pakisjaya atau berada di daerah perbatasan antara Desa Telukbuyung dengan Desa Telukjaya. SMKN 1 Pakisjaya merupakan unit sekolah SMK kelompok teknologi dan non teknologi industry, berstatus negeri dan satu-satunya SMK Negeri yang berada di Kecamatan Pakisjaya Kab. Karawang.</span>
			</div>
		</div>
</section>
@endsection
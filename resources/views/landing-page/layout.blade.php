<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>SMK 1 PAKISJAYA | @yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/iziToast/iziToast.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.theme.default.css') }}">

	<link rel="shortcut icon" type="text/css" href="{{ asset('assets/images/logo.png') }}">

	<script type="text/javascript" src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/iziToast/iziToast.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>

	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700;800&display=swap');
		.text-yellow{
			color: #FFE605;
		}
		.bg-yellow{
			background-color: #FFE605;
		}
		.bg-gray{
			background-color: #E5E5E5;
		}
		.bg-light-gray{
			background-color: #F8F3F3;
		}

		@media screen and (min-width: 768px){
			.logo-header{
				margin: 10px auto;
			}
			.page-text-header{
				text-align: justify;
			}
			.header-menu ul.cover-menu li.cover-menu-top{
				position: relative;
			}
			.header-menu .dropdown-menu-top{
				position: absolute;
			}
			.dropdown-menu-top .item-menu-top{
				width: 250px;
				text-align: center;
			}
		}
		@media screen and (max-width: 767px){
			.header-menu ul{
				width: 100%;
				text-align: center;
				margin-left: -5%
			}
			.header-menu li{
				padding: 5px;
			}
			.dropdown-menu-top .item-menu-top{
				padding: 5px;
			}
		}
		.logo-header, footer{
			font-family: 'Barlow Condensed', sans-serif;
		}
		.cover-menu-top.active, .cover-menu-top:hover{
			background-color: #FFE605;
			transition: .2s ease;
		}
		.menu-top{
			color: white;
			font-weight: 600;
			transition: .2s ease;
		}
		.cover-menu-top.active .menu-top, .cover-menu-top:hover > .menu-top{
			color: black;
			transition: .2s ease;
		}
		.dropdown-menu-top a{
			font-weight: 600;
		}
		.dropdown-menu-top .item-menu-top:hover{
			background-color: #FFE605;
			transition: .2s ease;
		}
	</style>
</head>
<body>
	<section class="d-md-block d-none">
		<div class="top-header bg-dark text-yellow">
			<div class="container">
				<div class="navbar">
				<?php 
					$notice = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
				?>
				<style type="text/css">
					#notice{
						animation: notice 10s linear infinite;
						overflow: hidden
					}
					@keyframes notice{
						from{
							transform: translateX(100%);
						} to {
							transform: translateX(-100%);
						}
					}
				</style>
					<a href="javascript:;" id="outer" class="text-decoration-none text-yellow me-auto overflow-hidden d-flex align-items-center col-6">
						<div style="width: 25px"><img src="{{ asset('assets/images/speaker.png') }}" width="20px" class="me-2"></div>
						<small class="d-lg-none d-md-block" style="overflow: hidden;"><div id="notice"><?= substr($notice, 0, 45) ?> ...</div></small>
						<small class="d-lg-block d-md-none" style="overflow: hidden;"><div id="notice"><div id="inside"><?= substr($notice, 0, 50) ?> ...</div></div></small>
					</a>
					<div class="ms-auto">
						<small>{{ date('l, d F Y') }}</small>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="logo-header">
		<div class="container">
			<div class="navbar">
				<div class="me-md-auto col-md-8 col-12 text-center d-md-flex align-items-center">
					<img src="{{ asset('assets/images/logo.png') }}" width="100px">
					<div class="mx-3 page-text-header">
						<h2 class="my-0">SMKN 1 PAKISJAYA</h2>
						<span>Kreatif, aktif, kompetitif dan berbudaya</span>
					</div>
				</div>
				<div class="ms-md-auto col-md-4 d-md-block d-none">
					<form>
						<div class="input-group mb-3">
							<input style="background-color: #E5E5E5" type="text" class="form-control" name="search" aria-describedby="search" placeholder="Cari ...">
							<button style="background: none;" class="input-group-text"><i class="fas fa-search"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<section class="header-menu">
		<header class="bg-dark">
			<div class="text-center d-md-none"><i onclick="showmenu()" class="fas fa-bars text-dark bg-white rounded py-2 px-3 my-1"></i></div>
			<div class="container">
				<div class="navbar py-0 animate__animated animate__fadeIn d-md-block d-none" id="header-menu">
					<ul class="my-0 cover-menu">
						<li class="d-md-inline-block d-block py-md-1 cover-menu-top">
							<a href="{{ route('home') }}" class="px-md-3 py-md-1 text-decoration-none menu-top">Home</a>
						</li>
						<li class="d-md-inline-block d-block py-md-1 cover-menu-top">
							<a href="{{ route('akademik') }}" class="px-md-3 py-md-1 text-decoration-none menu-top">Akademik</a>
						</li>
						<li class="d-md-inline-block d-block py-md-1 cover-menu-top">
							<a href="javascript:;" onclick="profilshow()" class="px-md-3 py-md-1 text-decoration-none menu-top">Profil</a>
							<div id="profil" class="dropdown-menu-top mt-md-3 mt-2">
								<div class="bg-gray item-menu-top border border-dark py-md-1">
									<a href="{{ route('sejarah') }}" class=" px-md-5 py-md-1 text-decoration-none text-dark">Sejarah</a>
								</div>
								<div class="bg-gray item-menu-top border border-dark py-md-1">
									<a href="{{ route('visimisi') }}" class=" px-md-5 py-md-1 text-decoration-none text-dark">Visi dan Misi</a>
								</div>
								<div class="bg-gray item-menu-top border border-dark py-md-1">
									<a href="{{ route('gurustaff') }}" class=" px-md-5 py-md-1 text-decoration-none text-dark">Guru dan Staff</a>
								</div>
								<div class="bg-gray item-menu-top border border-dark py-md-1">
									<a href="{{ route('programstudi') }}" class=" px-md-5 py-md-1 text-decoration-none text-dark">Program Studi</a>
								</div>
							</div>
						</li>
						<li class="d-md-inline-block d-block py-md-1 cover-menu-top">
							<a href="{{ route('kesiswaan') }}" class="px-md-3 py-md-1 text-decoration-none menu-top">Kesiswaan</a>
						</li>
						<li class="d-md-inline-block d-block py-md-1 cover-menu-top">
							<a href="{{ route('berita') }}" class="px-md-3 py-md-1 text-decoration-none menu-top">Berita</a>
						</li>
						<li class="d-md-inline-block d-block py-md-1 cover-menu-top">
							<a href="" class="px-md-3 py-md-1 text-decoration-none menu-top">Galeri Prestasi</a>
						</li>
						<li class="d-md-inline-block d-block py-md-1 cover-menu-top">
							<a href="javascript:;" onclick="this.href='#'" class="px-md-3 py-md-1 text-decoration-none menu-top">PPDB</a>
						</li>
					</ul>
				</div>
			</div>
		</header>
		<div class="bg-yellow py-1"></div>
	</section>
	<section>
		@yield('content')
	</section>
	<section>
		<footer class="bg-yellow pt-md-3 pt-lg-5 pt-3 pb-2">
			<div class="container">
				<div class="row" style="line-height: 18px">
					<div class="col-lg-5 col-md-4 col-12" >
						<h5 class="mt-md-0 mb-0 mt-4"><strong>Sekilas SMKN 1 Pakisjaya</strong></h5>
						<hr class="my-1">
						<small>Sekolah Menengah Kejuruan (SMK) Negeri 1 Pakisjaya merupakan sekolah kejuruan negeri pertama di Pakisjaya yang mendapat kepercayaan dari Departemen Pendidikan Nasional (Depdiknas) melalui Direktorat Jenderal Manajemen Pendidikan Dasar dan Menengah Direktorat Pembinaan SMK untuk memberikan layanan pendidikan bertaraf internasional.</small>
					</div>
					<div class="col-lg-3 col-md-4 col-12">
						<h5 class="mt-md-0 mb-0 mt-4"><strong>Link Penting</strong></h5>
						<hr class="my-1">
						<ul>
							<li><a href="" class="text-decoration-none">KRS Online</a></li>
							<li><a href="" class="text-decoration-none">Kemdikbud</a></li>
							<li><a href="" class="text-decoration-none">BKN</a></li>
							<li><a href="" class="text-decoration-none">Dapo Dikdasmen</a></li>
							<li><a href="" class="text-decoration-none">Disdik Jabar</a></li>
							<li><a href="" class="text-decoration-none">GTK</a></li>
							<li><a href="" class="text-decoration-none">Akreditasi Sekolah</a></li>
							<li><a href="" class="text-decoration-none">Portal Pendidikan</a></li>
							<li><a href="" class="text-decoration-none">Angket kepuasan Pengunjung</a></li>
						</ul>
					</div>
					<div class="col-md-4 col-12">
						<h5 class="mt-md-0 mb-0 mt-4"><strong>Sosial Media Kami</strong></h5>
						<hr class="my-1">
						<div class="d-flex align-items-center">
							<h3 class="me-3"><a href="" class="text-decoration-none me-2"><i class="fab fa-facebook text-primary"></i></a></h3>
							<h3 class="me-3"><a href="" class="text-decoration-none me-2"><i class="fab fa-youtube text-danger"></i></a></h3>
							<h3 class="me-3"><a href="" class="text-decoration-none me-2"><i class="fab fa-twitter text-info"></i></a></h3>
						</div>
						<h5 class="my-md-0">
							Ayo Follow dan Ikuti informasi seputar kegiatan di SMK Negeri 1 Pakisjaya di social media kami.
						</h5>
					</div>
				</div>
			</div>
			<hr class="my-2"></hr>
			<div class="text-center">
				<h5 class="my-0 pb-1">Copyright - 2021, SMK Negeri 1 Pakisjaya</h5>
			</div>
		</footer>
	</section>
	<script type="text/javascript">
		$('#profil').slideUp('d-none')
		function showmenu(){
			$('#header-menu').toggleClass('d-none')
		}
		function profilshow(){
			$('#profil').slideToggle('d-none')
		}
	</script>
	@if(Session::has('success'))
	<?=
		'<script type="text/javascript">
			iziToast.success({
            	title : "Success",
            	message: "'.Session::get('success').'",
            	position: "topCenter"
        	})
		</script>'
	?>
	@endif
	@if(Session::has('error'))
	<?=
		'<script type="text/javascript">
			iziToast.error({
            	title : "Error",
            	message: "'.Session::get('error').'",
            	position: "topCenter"
        	})
		</script>'
	?>
	@endif
</body>
</html>
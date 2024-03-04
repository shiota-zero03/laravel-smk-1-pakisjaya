@extends('landing-page.layout')
@section('title', 'Akademik')
@section('content')

<script type="text/javascript">
	document.getElementsByClassName('cover-menu-top')[1].classList.add('active')
</script>
<style type="text/css">
	.form-riwayat{
		overflow: hidden;
	}
	.form-riwayat .riwayat-menu{
		font-weight: 600;
		font-family: 'Barlow Condensed', sans-serif;
		transition: .2s ease;
	}
	.form-riwayat .riwayat-menu:hover, .form-riwayat .riwayat-menu.active{
		background-color: #FFE605;
		transition: .2s ease;
	}
	@media screen and (min-width: 768px){
		.calendar-cover{
			border: 1px solid #000000;
		}
	}
</style>
<section class="py-5">
	<div class="container">
		<div class="form-search mx-2">
			<div class="form-riwayat row bg-light-gray">
				<div class="col-md-3 col-6 text-center border border-dark riwayat-menu">
					<a href="javascript:;" onclick="this.href='{{ route('akademik')}}?filter=kalender-akademik'" class="text-decoration-none text-center w-100">
						<i style="margin-top: 18px; color: #000000" class="fas fa-calendar-days p-1 rounded"></i><br>
						<p style="margin-bottom: 18px" class="mt-2"><span class="text-dark">Kalender Akademik</span></p>
					</a>
				</div>
				<div class="col-md-3 col-6 text-center border border-dark riwayat-menu">
					<a href="javascript:;" onclick="this.href='{{ route('akademik')}}?filter=mata-pelajaran'" class="text-decoration-none text-center w-100">
						<i style="margin-top: 18px; color: #000000" class="fas fa-book-open text-dark p-1 rounded"></i><br>
						<p style="margin-bottom: 18px" class="mt-2"><span class="text-dark">Mata Pelajaran</span></p>
					</a>
				</div>
				<div class="col-md-3 col-6 text-center border border-dark riwayat-menu">
					<a href="javascript:;" onclick="this.href='{{ route('akademik')}}?filter=silabus'" class="text-decoration-none text-center w-100">
						<i style="margin-top: 18px; color: #000000" class="fas fa-list text-dark p-1 rounded"></i><br>
						<p style="margin-bottom: 18px" class="mt-2"><span class="text-dark">Silabus</span></p>
					</a>
				</div>
				<div class="col-md-3 col-6 text-center border border-dark riwayat-menu bg-primary">
					<a href="javascript:;" onclick="this.href='{{ route('akademik')}}?filter=login-pkl'" class="text-decoration-none text-center w-100">
						<i style="margin-top: 18px; color: #000000" class="fas fa-user text-white p-1 rounded"></i><br>
						<p style="margin-bottom: 18px" class="mt-2"><span class="text-white">Login PKL</span></p>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
@if(isset($_GET['filter']))
	<?php $filter = $_GET['filter'] ?>
	@if($filter == 'kalender-akademik')
	<section class="py-md-5 py-3">
		<div class="container">
			<div class="py-md-5 py-1 px-md-5 calendar-cover bg-light-gray px-1" style="border-radius: 10px">
				<div id="calendar"></div>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		document.getElementsByClassName('riwayat-menu')[0].classList.add('active');
	</script>
	@elseif($filter == 'mata-pelajaran')
	<script type="text/javascript">
		document.getElementsByClassName('riwayat-menu')[1].classList.add('active');
	</script>
	@elseif($filter == 'silabus')
	<script type="text/javascript">
		document.getElementsByClassName('riwayat-menu')[2].classList.add('active');
	</script>
	@elseif($filter == 'login-pkl')
	<section class="py-5">
		<div class="container">
			<div class="d-md-flex align-items-center border border-dark rounded overflow-hidden">
				<div class="col-md-6 col-12">
					<div class="px-md-5 px-3 py-5">
						<h3 class="text-dark my-0">Sign In</h3>
						<span><em>Sign In to continue to your account</em></span>
						<form class="my-3" method="post" action="{{ route('login.pkl') }}">
							@csrf
							<div class="input-group">
								<input style="border: none; border-bottom: 1px solid #FEB700" type="text" class="form-control" name="email" aria-describedby="search" placeholder="youremail@gmail.com" value="{{ old('email') }}">
								<span style="background: none; border: none; border-bottom: 1px solid #FEB700" class="input-group-text"><i class="text-dark fas fa-envelope"></i></span>
							</div>
							@error('email')<small class="text-danger"><em>{{ $message }}</em></small>@enderror
							<div class="my-3">
								<div class="input-group">
									<input style="border: none; border-bottom: 1px solid #FEB700" type="password" class="form-control" name="password" aria-describedby="search" placeholder="password">
									<span style="background: none; border: none; border-bottom: 1px solid #FEB700" class="input-group-text"><i class="text-dark fas fa-key"></i></span>
								</div>
								@error('password')<small class="text-danger"><em>{{ $message }}</em></small>@enderror
							</div>
							<div class="form-group">
								<button class="btn text-white w-100" style="background-color: #FEB700; font-weight: 600">Sign In</button>
							</div>
							<div class="mt-3 text-center">
								<span>Didn't have any account ? <a style="font-weight: 600" class="btn ms-3 btn-outline-warning text-dark" href="javascript:;" onclick="this.href='{{ route('akademik')}}?filter=register-pkl'">Register</a></span>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6 col-12 d-md-block d-none">
					<img src="{{ asset('assets/images/login.png') }}" width="100%">
				</div>
			</div>
		</div>
	</section>
	@elseif($filter == 'register-pkl')
	<section class="py-5">
		<div class="container">
			<div class="d-md-flex align-items-center border border-dark rounded overflow-hidden">
				<div class="col-md-6 col-12">
					<div class="px-md-5 px-3 py-5">
						<h3 class="text-dark my-0">Sign Up</h3>
						<span><em>Create your own account</em></span>
						<form class="my-3" method="post" action="{{ route('daftar.pkl.siswa') }}">
							@csrf
							<div class="row">
								<div class="col-6 form-group">
									<label style="font-weight: 600">Name</label>
									<input name="name" value="{{ old('name') }}" class="form-control">
									@error('name')<small class="text-danger"><em>{{ $message }}</em></small>@enderror
								</div>
								<div class="col-6 form-group">
									<label style="font-weight: 600">Username</label>
									<input name="username" value="{{ old('username') }}" class="form-control">
									@error('username')<small class="text-danger"><em>{{ $message }}</em></small>@enderror
								</div>
								<div class="col-12 mt-3 form-group">
									<label style="font-weight: 600">Email</label>
									<input name="email" class="form-control" value="{{ old('email') }}">
									@error('email')<small class="text-danger"><em>{{ $message }}</em></small>@enderror
								</div>
								<div class="col-12 mt-3 form-group">
									<label style="font-weight: 600">Password</label>
									<input type="password" name="password" class="form-control">
									@error('password')<small class="text-danger"><em>{{ $message }}</em></small>@enderror
								</div>
							</div>
							<div class="form-group my-3">
								<div class="d-flex">
									<input id="privacy" type="checkbox" name="privacy_and_policy" class="me-2"> 
									<label for="privacy">Creating an account means you're okey with our Terms of service, Privacy Policy, and our Notification Settings.</label>
								</div>
								@error('privacy_and_policy')<small class="text-danger"><em>{{ $message }}</em></small>@enderror
							</div>
							<div class="form-group">
								<button class="btn text-white w-100" style="background-color: #FEB700; font-weight: 600">Sign Up</button>
							</div>
							<div class="mt-3 text-center">
								<span>Have any account ? <a style="font-weight: 600" class="btn ms-3 btn-outline-warning text-dark" href="javascript:;" onclick="this.href='{{ route('akademik')}}?filter=login-pkl'">Login</a></span>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6 col-12 d-md-block d-none">
					<img src="{{ asset('assets/images/login.png') }}" width="100%">
				</div>
			</div>
		</div>
	</section>
	@endif
@else
<section class="py-md-5 py-3">
	<div class="container">
		<div class="py-md-5 py-1 px-md-5 calendar-cover bg-light-gray px-1" style="border-radius: 10px">
			<div id="calendar"></div>
		</div>
	</div>
</section>
<script type="text/javascript">
	document.getElementsByClassName('riwayat-menu')[0].classList.add('active');
</script>
@endif

<script type="text/javascript">
	
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          	initialView: 'dayGridMonth',
          	themeSystem: 'bootstrap5',
          	height: 700,
          	events: {
    			url: '{{ route('calendar.json') }}'
    		},
        });
        calendar.render();
    });
</script>
@endsection
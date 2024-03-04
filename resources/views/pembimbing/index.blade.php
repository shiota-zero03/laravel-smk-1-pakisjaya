<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMKN 1 PAKISJAYA | Pembimbing</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/aos.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/iziToast/iziToast.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/auth.min.css') }}">

	<link rel="shortcut icon" type="text/css" href="{{ asset('assets/images/logo.png') }}">

	<script type="text/javascript" src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/aos.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/iziToast/iziToast.min.js') }}"></script>
</head>
<body>
	<section class="cover-auth d-flex align-items-center justify-content-center">
		<div class="col-lg-5 col-md-7 col-11 border border-dark rounded">
			<div class="alert alert-dark rounded">
				<div class="text-center">
					<h3 class="col-12">Guru SMKN 1 Pakisjaya</h3>
				</div>
			</div>
			<form action="{{ route('login.pembimbing') }}" method="post">
				@csrf
				<div class="container">
					<div class="form-group mb-3">
						<div class="input-group">
  							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
  							<input required="" type="number" class="form-control" placeholder="NIP" name="nip">
						</div>
  					</div>
  					<div class="form-group mb-2">
						<div class="input-group">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
  							<input required="" type="password" class="form-control" placeholder="Password" name="password" id="password">
  							<span class="input-group-text" id="show-hide" onclick="showpassword()"><i class="fas fa-eye" id="eye"></i></span>
						</div>
					</div>
					<div class="form-group mb-2">
						<button class="btn btn-dark btn-outline-light w-100"><b>SUBMIT</b></button>
					</div>
				</div>
			</form>
		</div>
	</section>
	<script type="text/javascript">
		function showpassword(){
			if($('#password').attr('type') == 'password'){
				$('#password').attr('type', 'text')
				$('#eye').addClass('fa-eye-slash')
				$('#eye').removeClass('fa-eye')
			} else {
				$('#password').attr('type', 'password')
				$('#eye').removeClass('fa-eye-slash')
				$('#eye').addClass('fa-eye')
			}
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
@extends('landing-page.layout')
@section('title', 'Program Studi')
@section('content')
<script type="text/javascript">
	document.getElementsByClassName('cover-menu-top')[4].classList.add('active')
</script>
<style type="text/css">
	.profil h3{
		font-weight: 500;
		font-size: 26px;
	}
	.profil .page-header{
		margin-bottom: 46px;
	}
	.content-profil .cover-content{
		padding: 20px 40px;
		border: 1px solid #D5D5D5;
		box-shadow: 12px 12px 10px rgba(0, 0, 0, 0.05);
		border-radius: 6px;
		margin-bottom: 20px;
	}
</style>
<div class="profil py-5">
	<div class="container">
		<div class="content-profil">
			<div class="bg-white cover-content">
				<h4 class="my-0" style="font-weight: 600">{{ $berita->judul_berita }}</h4>
				<div class="d-flex align-items-center" style="margin-top: 12px; margin-bottom:18px;">
					<i class="far fa-clock me-2" style="color: #109CF1"></i>{{ date('d M Y', strtotime($berita->tanggal_berita)) }}
					<i class="far fa-user ms-4 me-2" style="color: #109CF1"></i>{{ $berita->author }}
				</div>
				<div style="background: #D9D9D9; height: 2px; width: 100%; margin-bottom: 18px"></div>
				<img src="{{ asset('assets/images/berita/'.$berita->feature_image) }}" width="100%">
				<div style="margin-top: 18px">
					<?= $berita->isi_berita ?>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
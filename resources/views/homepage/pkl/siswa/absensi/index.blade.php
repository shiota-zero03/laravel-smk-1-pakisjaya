@extends('homepage.pkl.siswa.layout')
@section('title', 'Absensi')
@section('pageheader', 'Absensi Siswa PKL')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[2].classList.add('active')
  document.getElementsByClassName('menu-dropdown')[2].classList.add('bg-secondary')
</script>
@if($member->status_pkl == 'Sedang PKL' || $member->status_pkl == 'Selesai PKL')
<form class="p-2 border rounded" method="post" action="{{ route('siswa.storeabsensi') }}" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-6">
			<div class="waktu alert alert-warning"></div>
		</div>
		<div class="col-6">
			<input type="file" name="file_izin" class="form-control"><br>
		</div>
		<div class="col-6">
			<button name="hadir" class="btn btn-primary w-100">Hadir</button>
		</div>
		<div class="col-6">
			<button name="izin" class="btn btn-warning w-100">Kirim File Izin</button>
		</div>
	</div>
</form>
<br><br>
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="datatable">
		<thead>
			<tr>
				<th>Tanggal PKL</th>
				<th>Jam Absen</th>
				<th>Status Absen</th>
				<th>File</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = strtotime($member->mulai_pkl) - 86400; ?>
			@while($i < strtotime($member->selesai_pkl))
			<tr>
				<?php
					
					$i=$i+86400;
					$getabsen = DB::table('absensis')->where('id_member', '=', $member->id_member)->where('tangal_absen', '=', date('Y-m-d', $i))->first();
				?>
				<td>{{ date('F, d Y', $i) }}</td>
				@if( date('l', $i) == 'Saturday' || date('l', $i) == 'Sunday' )
					<td class="bg-danger"></td>
					<td class="bg-danger"></td>
					<td class="bg-danger"></td>
					<td class="bg-danger"></td>
				@else
					<td>
						@if($getabsen)
							{{ $getabsen->jam_absen }}
						@endif
					</td>
					<td>
						@if($getabsen)
							{{ $getabsen->status_absen }}
						@endif
					</td>
					<td>
						@if($getabsen)
							@if($getabsen->status_absen == 'Izin')
								<a href="{{ asset('assets/file/absen/'.$getabsen->file_absen) }}" target="__blank" class="btn btn-info"><i class="fas fa-download"></i></a>
							@endif
						@endif
					</td>
					<td>
						@if($getabsen)
							@if($getabsen->status_absen != 'Hadir')
								<a href="javascript:;" onclick="gantiabsen({{ $i }})" class="btn btn-primary"><i class="fas fa-edit"></i></a>
								<form class="absenupdate" id="storeabsen-{{ $i }}" method="post" action="{{ route('siswa.storeabsensi') }}" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="id_absen" value="{{ $getabsen->id_absen }}">
									<input type="file" required name="file_izin" class="form-control">
									<button class="btn btn-success mt-3" name="updatefile">Simpan</button>
								</form>
							@endif
						@endif
					</td>
				@endif
			</tr>
			@endwhile
		</tbody>
	</table>
</div>
@else
<div class="text-center"><h4><em>JADWAL PKL BELUM ADA</em></h4></div>
@endif
<script type="text/javascript">
	$('.absenupdate').slideUp();
	function gantiabsen(id){
		$('#storeabsen-'+id).slideToggle();
	}
	$('#datatable').dataTable()

	window.setTimeout("waktu()", 1000);
		function waktu() {
			var waktu = new Date();
			setTimeout("waktu()", 1000);
			var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu'];
			var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', "Juni", 'Juli', 'Agustus', 'September', 'OKtober', 'November', 'Desember'];
			if(waktu.getSeconds() < 10){ var detik = '0'+waktu.getSeconds() } else { var detik = waktu.getSeconds() }
			if(waktu.getMinutes() < 10){ var menit = '0'+waktu.getMinutes() } else { var menit = waktu.getMinutes() }
			if(waktu.getHours() < 10){ var jam = '0'+waktu.getHours() } else { var jam = waktu.getHours() }
			if(waktu.getDate() < 10){ var tanggal = '0'+waktu.getDate() } else { var tanggal = waktu.getDate() }

			$(".waktu").html('<i class="fas fa-clock me-md-3 me-2"></i>'+hari[waktu.getDay()]+', '+tanggal+' '+bulan[waktu.getMonth()]+' '+waktu.getFullYear()+' - '+jam+' : '+menit+' : '+detik);
		}
</script>
@endsection
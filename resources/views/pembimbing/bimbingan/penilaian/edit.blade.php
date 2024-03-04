@extends('pembimbing.layout')
@section('title', 'Penilaian')
@section('pageheader', 'Penilaian Siswa PKL')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[2].classList.add('active')
  document.getElementsByClassName('menu-dropdown')[2].classList.add('bg-secondary')
</script>
<h3>{{ $member->nama }}</h3>
<span>{{ $member->no_identitas }}</span><br>
<hr>
<div class="table-responsive">
	<h5>A. Pelaksanaan</h5>
	<hr>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th rowspan="2">No</th>
				<th rowspan="2">Aspek yang dinilai</th>
				<th>Nilai</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<form method="post" action="{{ route('pembimbing.update') }}">
					@csrf
					<input required type="hidden" name="id_member" value="{{ $member->id_member }}">
					<td>1</td>
					<td>Kedisiplinan <input required type="hidden" name="aspek" value="Kedisiplinan"></td>
					<td>@if($kedisiplinan) <input required type="number" name="nilai" value="{{ $kedisiplinan->nilai }}" class="form-control"> @else <input required type="number" name="nilai" value="0" class="form-control"> @endif</td>
					<td>
						<button name="pelaksanaan" class="btn btn-primary">Simpan</button>
					</td>
				</form>
			</tr>
			<tr>
				<form method="post" action="{{ route('pembimbing.update') }}">
					@csrf
					<input required type="hidden" name="id_member" value="{{ $member->id_member }}">
					<td>2</td>
					<td>Tanggung Jawab <input required type="hidden" name="aspek" value="Tanggung Jawab"></td>
					<td>@if($tanggungjawab) <input required type="number" name="nilai" value="{{ $tanggungjawab->nilai }}" class="form-control"> @else <input required type="number" name="nilai" value="0" class="form-control"> @endif</td>
					<td>
						<button name="pelaksanaan" class="btn btn-primary">Simpan</button>
					</td>
				</form>
			</tr>
			<tr>
				<form method="post" action="{{ route('pembimbing.update') }}">
					@csrf
					<input required type="hidden" name="id_member" value="{{ $member->id_member }}">
					<td>3</td>
					<td>Inisiatif <input required type="hidden" name="aspek" value="Inisiatif"></td>
					<td>@if($inisiatif) <input required type="number" name="nilai" value="{{ $inisiatif->nilai }}" class="form-control"> @else <input required type="number" name="nilai" value="0" class="form-control"> @endif</td>
					<td>
						<button name="pelaksanaan" class="btn btn-primary">Simpan</button>
					</td>
				</form>
			</tr>
			<tr>
				<form method="post" action="{{ route('pembimbing.update') }}">
					@csrf
					<input required type="hidden" name="id_member" value="{{ $member->id_member }}">
					<td>4</td>
					<td>Kerajinan <input required type="hidden" name="aspek" value="Kerajinan"></td>
					<td>@if($kerajinan) <input required type="number" name="nilai" value="{{ $kerajinan->nilai }}" class="form-control"> @else <input required type="number" name="nilai" value="0" class="form-control"> @endif</td>
					<td>
						<button name="pelaksanaan" class="btn btn-primary">Simpan</button>
					</td>
				</form>
			</tr>
			<tr>
				<form method="post" action="{{ route('pembimbing.update') }}">
					@csrf
					<input required type="hidden" name="id_member" value="{{ $member->id_member }}">
					<td>5</td>
					<td>Kerjasama <input required type="hidden" name="aspek" value="Kerjasama"></td>
					<td>@if($kerjasama) <input required type="number" name="nilai" value="{{ $kerjasama->nilai }}" class="form-control"> @else <input required type="number" name="nilai" value="0" class="form-control"> @endif</td>
					<td>
						<button name="pelaksanaan" class="btn btn-primary">Simpan</button>
					</td>
				</form>
			</tr>
			<tr>
				<th colspan="2" class="text-center">Jumlah Nilai</th>
				<th colspan="2" class="text-center">{{ $sumpelaksanaan }}</th>
			</tr>
			<tr>
				<th colspan="2" class="text-center">Rata - Rata</th>
				<th class="text-center">{{ number_format($avgpelaksanaan, 2, ',', '') }}</th>
				<th class="text-center">
					@if($avgpelaksanaan < 60)
						D
					@elseif($avgpelaksanaan >= 60 && $avgpelaksanaan < 75)
						C
					@elseif($avgpelaksanaan >= 75 && $avgpelaksanaan < 90)
						B
					@elseif($avgpelaksanaan >= 90 && $avgpelaksanaan <=100)
						A
					@endif
				</th>
			</tr>
		</tbody>
	</table>
</div>
<br>
</script>
<div class="table-responsive">
	<h5>B. Keterampilan</h5>
	<form class="p-2" method="post" action="{{ route('pembimbing.update') }}">
		@csrf
		<input required type="hidden" name="id_member" value="{{ $member->id_member }}">
		<table class="table">
			<tr>
				<th>Aspek yang dinilai</th>
				<th>Nilai</th>
				<th>Aksi</th>
			</tr>
			<tr>
				<th><input required type="text" name="aspek" class="form-control"></th>
				<th><input required type="number" name="nilai" class="form-control"></th>
				<td>
					<button name="keterampilanstore" class="btn btn-primary">Simpan</button>
				</td>
			</tr>
		</table>
	</form>
	<hr>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th rowspan="2">No</th>
				<th rowspan="2">Aspek yang dinilai</th>
				<th colspan="2" class="text-center">Nilai</th>
			</tr>
			<tr>
				<th>Angka</th>
				<th>Huruf</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			@foreach($keterampilan as $ket)
				<tr>
					<form method="post" action="{{ route('pembimbing.update') }}">
						@csrf
						<input type="hidden" name="id_nilai" value="{{ $ket->id_nilai }}">
						<td>1</td>
						<td>{{ $ket->aspek }}</td>
						<td><input type="number" name="nilai" class="form-control" value="{{ $ket->nilai }}" required=""></td>
						<td>
							<button name="keterampilanupdate" class="btn btn-primary">Simpan</button>
							<a href="{{ route('pembimbing.penilaian') }}/hapus-penilaian/{{ $ket->id_nilai }}" class="btn btn-danger">Delete</a>
						</td>
					</form>
				</tr>
			@endforeach
			<tr>
				<th colspan="2" class="text-center">Jumlah Nilai</th>
				<th colspan="2" class="text-center">{{ $sumketerampilan }}</th>
			</tr>
			<tr>
				<th colspan="2" class="text-center">Rata - Rata</th>
				<th class="text-center">{{ number_format($avgketerampilan, 2, ',', '') }}</th>
				<th class="text-center">
					@if($avgketerampilan < 60)
						D
					@elseif($avgketerampilan >= 60 && $avgketerampilan < 75)
						C
					@elseif($avgketerampilan >= 75 && $avgketerampilan < 90)
						B
					@elseif($avgketerampilan >= 90 && $avgketerampilan <=100)
						A
					@endif
				</th>
			</tr>
		</tbody>
	</table>
</div>
@endsection
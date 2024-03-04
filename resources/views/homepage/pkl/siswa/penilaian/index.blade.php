@extends('homepage.pkl.siswa.layout')
@section('title', 'Penilaian')
@section('pageheader', 'Penilaian Siswa PKL')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[3].classList.add('active')
</script>
<div class="table-responsive">
	<h5>A. Pelaksanaan</h5>
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
			<tr>
				<td>1</td>
				<td>Kedisiplinan</td>
				<td>@if($kedisiplinan) {{ $kedisiplinan->nilai }} @else 0 @endif</td>
				<td>
					@if($kedisiplinan)
						@if($kedisiplinan->nilai < 60)
							D
						@elseif($kedisiplinan->nilai >= 60 && $kedisiplinan->nilai < 75)
							C
						@elseif($kedisiplinan->nilai >= 75 && $kedisiplinan->nilai < 90)
							B
						@elseif($kedisiplinan->nilai >= 90 && $kedisiplinan->nilai <=100)
							A
						@endif
					@else
						-
					@endif
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Tanggung Jawab</td>
				<td>@if($tanggungjawab) {{ $tanggungjawab->nilai }} @else 0 @endif</td>
				<td>
					@if($tanggungjawab)
						@if($tanggungjawab->nilai < 60)
							D
						@elseif($tanggungjawab->nilai >= 60 && $tanggungjawab->nilai < 75)
							C
						@elseif($tanggungjawab->nilai >= 75 && $tanggungjawab->nilai < 90)
							B
						@elseif($tanggungjawab->nilai >= 90 && $tanggungjawab->nilai <=100)
							A
						@endif
					@else
						-
					@endif
				</td>
			</tr>
			<tr>
				<td>3</td>
				<td>Inisiatif</td>
				<td>@if($inisiatif) {{ $inisiatif->nilai }} @else 0 @endif</td>
				<td>
					@if($inisiatif)
						@if($inisiatif->nilai < 60)
							D
						@elseif($inisiatif->nilai >= 60 && $inisiatif->nilai < 75)
							C
						@elseif($inisiatif->nilai >= 75 && $inisiatif->nilai < 90)
							B
						@elseif($inisiatif->nilai >= 90 && $inisiatif->nilai <=100)
							A
						@endif
					@else
						-
					@endif
				</td>
			</tr>
			<tr>
				<td>4</td>
				<td>Kerajinan</td>
				<td>@if($kerajinan) {{ $kerajinan->nilai }} @else 0 @endif</td>
				<td>
					@if($kerajinan)
						@if($kerajinan->nilai < 60)
							D
						@elseif($kerajinan->nilai >= 60 && $kerajinan->nilai < 75)
							C
						@elseif($kerajinan->nilai >= 75 && $kerajinan->nilai < 90)
							B
						@elseif($kerajinan->nilai >= 90 && $kerajinan->nilai <=100)
							A
						@endif
					@else
						-
					@endif
				</td>
			</tr>
			<tr>
				<td>5</td>
				<td>Kerjasama</td>
				<td>@if($kerjasama) {{ $kerjasama->nilai }} @else 0 @endif</td>
				<td>
					@if($kerjasama)
						@if($kerjasama->nilai < 60)
							D
						@elseif($kerjasama->nilai >= 60 && $kerjasama->nilai < 75)
							C
						@elseif($kerjasama->nilai >= 75 && $kerjasama->nilai < 90)
							B
						@elseif($kerjasama->nilai >= 90 && $kerjasama->nilai <=100)
							A
						@endif
					@else
						-
					@endif
				</td>
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
					<td>1</td>
					<td>{{ $ket->aspek }}</td>
					<td>{{ $ket->nilai }}</td>
					<td>
						@if($ket->nilai < 60)
							D
						@elseif($ket->nilai >= 60 && $ket->nilai < 75)
							C
						@elseif($ket->nilai >= 75 && $ket->nilai < 90)
							B
						@elseif($ket->nilai >= 90 && $ket->nilai <=100)
							A
						@endif
					</td>
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
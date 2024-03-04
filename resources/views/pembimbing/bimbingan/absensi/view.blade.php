@extends('pembimbing.layout')
@section('title', 'Absensi')
@section('pageheader', 'Absensi Siswa PKL')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[2].classList.add('active')
  document.getElementsByClassName('menu-dropdown')[1].classList.add('bg-secondary')
</script>
<h3>{{ $member->nama }}</h3>
<span>{{ $member->no_identitas }}</span><br>
<hr>
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="datatable">
		<thead>
			<tr>
				<th>Tanggal PKL</th>
				<th>Jam Absen</th>
				<th>Status Absen</th>
				<th>File</th>
				<th>Laporan Absensi</th>
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
							{{ $getabsen->laporan_absen }}
						@endif
					</td>
				@endif
			</tr>
			@endwhile
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$('#datatable').dataTable()
</script>
@endsection
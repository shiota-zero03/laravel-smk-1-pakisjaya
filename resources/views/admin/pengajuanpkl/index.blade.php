@extends('admin.layout')
@section('title', 'Pengajuan PKL')
@section('pageheader', 'Pengajuan PKL')
@section('content')
<script type="text/javascript">
  document.getElementsByClassName('menu-side')[2].classList.add('active')
  document.getElementsByClassName('menu-dropdown')[2].classList.add('bg-secondary')
</script>
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>NIS</th>
				<th>Mulai PKL</th>
				<th>Selesai PKL</th>
				<th>Lokasi PKL</th>
				<th>Pembimbing Sekolah</th>
				<th>Pembimbing Industri</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			@foreach($member as $mem)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $mem->nama }}</td>
					<td>{{ $mem->no_identitas }}</td>
					<td>{{ date('F, d Y', strtotime($mem->mulai_pkl)) }}</td>
					<td>{{ date('F, d Y', strtotime($mem->selesai_pkl)) }}</td>
					<td>{{ $mem->lokasi_pkl }}</td>
					<form method="post" action="{{ route('update.member.pkl') }}">
						@csrf
						<input type="hidden" name="id_member" value="{{ $mem->id_member }}">
						<td>
							@if($mem->pembimbing_sekolah == null)
							<select class="form-control" name="pembimbing_sekolah">
								@foreach($guru as $gr)
								<option value="{{ $gr->nama_guru }}">{{ $gr->nama_guru }}</option>
								@endforeach
							</select>
							@else
							{{ $mem->pembimbing_sekolah }}
							@endif
						</td>
						<td>{{ $mem->pembimbing_industri }}</td>
						<td>
							@if($mem->status_pkl == 'Menunggu ACC Guru')
								<button type="submit" class="btn btn-primary">ACC</button>
								<a href="{{ route('admin.pengajuanpkl') }}/tolak/{{ $mem->id_member }}" class="btn btn-danger">TOLAK</a>
							@endif
						</td>
					</form>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$('#datatable').dataTable()
</script>
@endsection
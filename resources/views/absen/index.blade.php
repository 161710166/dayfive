@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading"><center><b><h3>Data Absen</h3></b></center>
			  	<div class="panel-title pull-right"><a href="{{ route('absen.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="row">
                            <div class="col-lg-9">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                        		<tr>
			  		  <th>No</th>
					  <th>Nama Siswa</th>
					  <th>Kelas</th>
					  <th>Keterangan</th>
					  <th>Guru Piket</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($absen as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->siswa->nama }}</td>
				    	<td>{{ $data->kelas->kelas }}</td>				    	
				    	<td>{{ $data->keterangan }}</td>
				    	<td><p>{{ $data->piket->nama_guru_piket }}</p></td>
						<td>
							<a class="btn btn-warning" href="{{ route('absen.edit',$data->id) }}">Edit</a>
						</td>
						<td>
							<form method="post" action="{{ route('absen.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
						</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection
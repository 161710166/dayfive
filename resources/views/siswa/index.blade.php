@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading"><center><b><h3>Data Siswa</h3></b></center>
			  	<div class="panel-title pull-right"><a href="{{ route('siswa.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table border="4" class="table">
                            <div class="col-lg-9">
                                    <table class="table table-borderless table-striped table-earning">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
			  		  <th>Nis</th>
					  <th>Nama Siswa</th>
					  <th>Jenis Kelamin</th>
					  <th>Tanggal Lahir</th>
					  <th>Alamat</th>
					  <th>Kelas</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($siswa as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->nis }}</td>
				    	<td>{{ $data->nama }}</td>
				    	<td>{{ $data->jk }}</td>
				    	<td>{{ $data->tanggal_lahir }}</td>
				    	<td>{{ $data->alamat }}</td>
				    	<td><p>{{ $data->kelas->kelas }}</p></td>
<td>
	<a class="btn btn-warning" href="{{ route('siswa.edit',$data->id) }}">Edit</a>
</td>
<td>
	<form method="post" action="{{ route('siswa.destroy',$data->id) }}">
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
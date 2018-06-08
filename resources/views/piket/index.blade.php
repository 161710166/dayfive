@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-warning">
			  <div class="panel-heading"><center><b><h3>Data Piket</h3></b></center>
			  	<div class="panel-title pull-right"><a href="{{ route('piket.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel panel-danger">
			  	<div class="table-responsive">
				  <table class="table">
                            <div class="col-lg-9">
                                    <table class="table table-borderless table-striped table-earning">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Nama Guru Piket</th>
					  <th>Hari</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($piket as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->nama_guru_piket }}</td>
				    	<td><p>{{ $data->hari }}</p></td>
<td>
	<form method="post" action="{{ route('piket.destroy',$data->id) }}">
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
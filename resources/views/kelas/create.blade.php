@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Tambah Data Kelas 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('kelas.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('kelas') ? ' has-error' : '' }}">
			  			<label class="control-label">kelas</label>	
			  			<input type="text" name="kelas" class="form-control"  required>
			  			@if ($errors->has('kelas'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kelas') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('siswa_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Siswa</label>	
			  			<select name="siswa_id" class="form-control">
			  				@foreach($siswa as $data)
			  				<option value="{{ $data->id }}" {{ $selectedSiswa == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('siswa_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('siswa_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection
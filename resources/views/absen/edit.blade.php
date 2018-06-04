@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Absen 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('mahasiswa.update',$mhs->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('siswa_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Siswa</label>	
			  			<select name="siswa_id" class="form-control">
			  				@foreach($dosen as $data)
			  				<option value="{{ $data->id }}" {{ $selectedDosen == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('siswa_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('siswa_id') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('kelas_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Kelas</label>	
			  			<select name="kelas_id" class="form-control">
			  				@foreach($dosen as $data)
			  				<option value="{{ $data->id }}" {{ $selectedDosen == $data->id ? 'selected="selected"' : '' }} >{{ $data->kelas }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kelas_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kelas_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('keterangan') ? ' has-error' : '' }}">
			  			<label class="control-label">keterangan</label>	
			  			<input type="text" name="keterangan" class="form-control" value="{{ $mhs->keterangan }}" required>
			  			@if ($errors->has('keterangan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('keterangan') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('alasan') ? ' has-error' : '' }}">
			  			<label class="control-label">alasan</label>	
			  			<input type="text" value="{{ $absen->alasan }}" name="alasan" class="form-control"  required>
			  			@if ($errors->has('alasan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alasan') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('piket_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Guru Piket</label>	
			  			<select name="piket_id" class="form-control">
			  				@foreach($piket as $data)
			  				<option value="{{ $data->id }}" {{ $selectedPiket == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama_guru_piket }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('piket_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('piket_id') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection
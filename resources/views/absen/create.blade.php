@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Tambah Data Absen 
			  	<div class="panel-title pull-right"><a href="{{ route('absen.index') }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('absen.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('siswa_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Siswa</label>	
			  			<select name="siswa_id" class="form-control">
			  				@foreach($siswa as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}</option>
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
			  				@foreach($kelas as $data)
			  				<option value="{{ $data->id }}" >{{ $data->kelas }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kelas_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kelas_id') }}</strong>
                            </span>
                        @endif
			  		</div>

					<div class="form-group {{$errors->has('keterangan') ? 'has-error' : ''}}">
								<label class="control-label">keterangan</label><br>
								<input type="radio" class="radio-control" name="keterangan" value="izin">Izin&nbsp&nbsp
								<input type="radio" class="radio-control" name="keterangan"  value="sakit">Sakit&nbsp&nbsp
								<input type="radio" class="radio-control" name="keterangan"  value="alfa">Alfa
								@if ($errors->has('keterangan'))
									<span class="help-blocks">
										<strong>{{$errors->first('keterangan')}}</strong>
									</span>
								@endif
							</div>
			  		<div class="form-group {{ $errors->has('piket_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Guru Piket</label>	
			  			<select name="piket_id" class="form-control">
			  				@foreach($piket as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_guru_piket }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('piket_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('piket_id') }}</strong>
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
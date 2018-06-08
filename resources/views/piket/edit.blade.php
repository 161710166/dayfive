@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Petugas Piket
					<div class="panel-title pull-right">
						<a href="{{route('piket.index')}}">Kembali</a>
					</div>
					</div>
					<div class="panel-body">
						<form action="{{route('piket.update', $piket->id)}}" method="post">
							<input name="_method" type="hidden" value="PATCH">
							{{csrf_field()}}

							<div class="form-group {{$errors->has('nama_guru_piket') ? 'has-error' : ''}}">
								<label class="control-label">Nama Guru Piket</label>
								<input type="text" name="nama_guru_piket" class="form-control" value="{{$petugaspikets->nama_guru_piket}}" required>
								@if ($errors->has('nama_guru_piket'))
									<span class="help-block">
										<strong>{{$errors->first('nama_guru_piket')}}</strong>
									</span>
								@endif
							</div>
							
							<div class="form-group {{$errors->has('hari') ? 'has-error' : ''}}">
								<label class="control-label">Hari</label>
								<input type="text" name="hari" class="form-control" value="{{$petugaspikets->hari}}" required>
								@if ($errors->has('hari'))
									<span class="help-block">
										<strong>{{$errors->first('hari')}}</strong>
									</span>
								@endif
							</div>


							<div class="form-group">
								<button type="submit" class="btn btn-primary">Edit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

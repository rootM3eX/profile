@extends('layouts.master')

@section('content')
	<div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
		  			@if(Session::has('sukses'))
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						{{ Session::get('sukses') }}
					</div>
					@endif
	
					@if(Session::has('gagal'))
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> Gagal!</h4>
						{{ Session::get('gagal') }}
					</div>
					@endif
			<!-- Card header -->
					<div class="card">
						<div class="card-body">
							<form method="post" action="{{ url('profile-data/'.\Auth::user()->id)}}" enctype="multipart/form-data">
							@csrf
							{{ method_field('PUT') }}
								<div class="form-group row">
									<label>Status</label>
										<input class="form-control" type="text" name="status" placeholder="Ex" value="{{ $dt->status }}" >
								</div>
								<div class="form-group row">
									<label>Nomor HP</label>
										<input class="form-control" type="number" name="nomor" placeholder="Ex: +62" value="{{ $dt->nomor }}">
								</div>
								<div class="form-group">
									<label>Photo</label>
									<input type="file" name="photo">
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<textarea name="alamat" id="summernote" class="form-control" cols="30" rows="10">{{ $dt->alamat }}</textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
        </div>
      </div>
	</div>
	
	<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>

@endsection
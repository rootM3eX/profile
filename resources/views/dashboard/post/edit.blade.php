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
			<!-- SELECT2 EXAMPLE -->
			<div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
			  <form method="post" action="{{ url('post/update/'.$dt->id)}}" enctype="multipart/form-data">
				@csrf
				{{ method_field('PUT') }}
                <div class="form-group">
					<label>Title</label>
					<input class="form-control" type="text" name="judul" placeholder="Ex: Title" value="{{ $dt->judul }}">
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
				<label>Category</label>
				<select name="category_id" class="form-control">
					@foreach($datas as $dt)
					<option value="{{ $dt->id }}">{{ $dt->name }}</option>
					@endforeach
				</select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
					<label>Description</label>
					<textarea name="deskripsi" id="summernote" class="form-control" cols="30" rows="10">{!! $dt->deskripsi !!}</textarea>
                </div>
                <!-- /.form-group -->
			  </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Thumbnail</label>
                  <input type="file" name="photo" class="form-control">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
			<!-- /.row -->
			
			<div class="col-12 col-sm-6">
			  	<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			  </div>
          </div>
        </div>
					</form>
        </div>
      </div>
	</div>
	
	
  </script>

@endsection
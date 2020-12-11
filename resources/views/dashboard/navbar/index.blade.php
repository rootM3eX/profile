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
                            <form method="post" action="{{ url('navbar/data')}}" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group row">
                                    <label>Name Navbar</label>
                                        <input class="form-control" type="text" name="name" placeholder="Ex: Title">
                                </div>
                                <div class="form-group row">
                                    <label>URL Navbar</label>
                                        <input class="form-control" type="text" name="url" placeholder="Ex: post/data">
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
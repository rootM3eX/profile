@extends('layouts.master')

@section('content')
	<div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
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
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <label class="btn btn-success">{{ $dt->name }}</label>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
          </div>
          <div class="card">
            <div class="card-body">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Action</th>
                      <th>Name Subnav</th>
                      <th>URL</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $e=>$d)
                    <tr>
                    <td>{{ $e+1 }}</td>
                    <td>
                      <!-- <a href="{{ url('subnav/edit/'.$d->id)}}" class="btn btn-warning">Edit</a> -->
                      <a href="{{ url('subnav/hapus/'.$d->id)}}" class="btn btn-danger">Hapus</a>
                    </td>
                      <td>
                        <label class="btn btn-info">{{ $d->subname }}</label>
                      </td>
                      <td>
                        <a href="{{ url($dt->url)}}" class="btn btn-success" target="_blank">View</a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
            </div>
          </div>
          <div class="card">
                <div class="card-body">
                  <form action="{{ url('subnav/data/'.$dt->id)}}" method="post">
                  @csrf
                    <div class="form-group">
                      <label>Subnav</label>
                      <input type="text" name="subname" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>URL Subnav</label>
                      <input type="text" name="url" class="form-control">
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

@endsection
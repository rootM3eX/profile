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
                      <th>#</th>
                      <th>Action</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Thumbnail</th>
                    </tr>
                  </thead>
                  <tbody>
				  @foreach($data as $e=>$dt)
					<tr>
						<td>{{ $e+1 }}</td>
						<td>
							<a href="{{ url('post/edit/'.$dt->id)}}" class="btn btn-warning">Edit</a>
							<a href="{{ url('post/hapus/'.$dt->id)}}" class="btn btn-danger">Hapus</a>
							<a href="{{ url('post/detail/'.$dt->id)}}" class="btn btn-info">Detail</a>
						</td>
						<td>{{ $dt->judul }}</td>
						<td>
							<label class="btn btn-success">{{ $dt->category->name }}</label>
						</td>
						<td>
							<img src="{{ asset($dt->photo)}}" alt="photo" width="100px" height="100px">
						</td>
					</tr>
				@endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                {{ $data->links() }}
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
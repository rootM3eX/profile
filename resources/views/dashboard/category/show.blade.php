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
                      <th>Name</th>
                    </tr>
                  </thead>
                  <tbody>
				  @foreach($data as $e=>$dt)
					<tr>
						<td>{{ $e+1 }}</td>
						<td>
							<a href="{{ url('category/edit/'.$dt->id)}}" class="btn btn-warning">Edit</a>
							<a href="{{ url('category/hapus/'.$dt->id)}}" class="btn btn-danger">Hapus</a>
						</td>
						<td>{{ $dt->name }}</td>
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
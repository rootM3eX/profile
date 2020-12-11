@extends('layouts.master')

@section('content')
	<div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-body table-responsive p-0">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Title</th>
							<th scope="col">URL</th>
							<th scope="col">Photo</th>
							<th scope="col">Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><h3>{{ $dt->judul }}</h3></td>
							<td>
								<a href="{{ $dt->url }}" class="btn btn-success" target="_blank">View</a>
							</td>
							<td>
								<img src="{{ asset($dt->photo)}}" alt="photo" width="150px" height="150px">
							</td>
							<td>{{ $dt->deskripsi }}</td>
						</tr>
					</tbody>
				</table>
              </div>
          </div>
        </div>
      </div>
    </div>

@endsection
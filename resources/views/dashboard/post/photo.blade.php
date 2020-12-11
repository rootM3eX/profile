@extends('layouts.master')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">{{ $title }}</h4>
              </div>
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info active" href="{{ url('thumbnail')}}" data-filter="all"> All items </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Category 1 (WHITE) </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> Category 2 (BLACK) </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="3"> Category 3 (COLORED) </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="4"> Category 4 (COLORED, BLACK) </a>
                  </div>
                  <div class="mb-2">
                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                    <div class="float-right">
                      <select class="custom-select" style="width: auto;" data-sortOrder>
                        <option value="index"> Sort by Position </option>
                        <option value="sortData"> Sort by Custom Data </option>
                      </select>
                      <div class="btn-group">
                        <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                        <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="filter-container p-0 row">
                  @foreach($data as $dt)
                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                      <a href="{{ asset($dt->photo)}}" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="{{ asset($dt->photo)}}" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    @endforeach
                  </div>
                </div>

              </div>
            </div>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

@endsection
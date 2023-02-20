@extends('layouts.dashboard.master')

@section('title') 
    Sub-categories (Excel)
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-end flex-wrap">
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
            <i class="mdi mdi-download text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-clock-outline text-muted"></i>
          </button>
          {{-- <a href="{{ route('subcategories.create') }}" class="btn btn-primary text-light">
            <i class="fa-solid fa-plus"></i>
            <span>Add Sub-category</span>
          </a> --}}
        </div>
      </div>
    </div>
</div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sub-categories</h4>
        <p class="card-description">
            <div class="d-flex mb-3">
                <a href="{{ route('dashboard') }}" class="text-decoration-none">
                  <i class="mdi mdi-home text-primary"></i>
                  <span class="text-primary">
                    @if(auth()->user()->user_type == 'admin') 
                      Admin
                    @else
                      Moderator 
                    @endif 
                    Dashboard
                  </span>
                </a>
                <p>
                    &nbsp;/&nbsp;
                    <a href="{{ route('subcategories.index') }}" class="text-primary text-decoration-none">Sub-categories</a>
                </p>
                <p class="text-muted mb-0">
                    &nbsp;/&nbsp;
                    Import & Export Sub-categories from/to excel file
                </p>
            </div>
         <div class="container">
             <div class="card bg-light mt-3">
                    <div class="card-header">
                        Import and Export Excel data
                        to database
                    </div>
                    <div class="card-body">
                        <form action="{{ route('import-sub-categories') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="input_file_for_importing" class="form-control">
                            <br>
                            <button class="btn btn-success">Import Sub-categories Data</button>
                            <a class="btn btn-warning"href="{{ route('export-sub-categories') }}">Export Sub-categories Data</a>
                        </form>
                    </div>
            </div>
        </div>
          
      </div>
    </div>
  </div>
@endsection

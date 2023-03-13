@extends('layouts.dashboard.master')

@section('title') 
  Categories (Excel)
@endsection

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Categories</h4>
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
                    &nbsp;/
                    <a href="{{ route('categories.index') }}" class="text-primary text-decoration-none">Categories</a>
                </p>
                <p class="text-muted mb-0">
                    &nbsp;/
                    Import & Export Categories from/to Excel file
                </p>
            </div>
            <div class="container">
             <div class="card bg-light mt-3">
                    <div class="card-header">
                        Import/Export Excel data to/from database
                    </div>
                    @if(session()->has('imported_file_successfully'))
                      <div class="alert alert-success text-center mt-1">
                        <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                        {{ session()->get('imported_file_successfully') }}
                      </div>
                    {{-- @elseif(session()->has('exported_file_successfully'))
                      <div class="alert alert-success text-center mt-1">
                        <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                        {{ session()->get('exported_file_successfully') }}
                      </div> --}}
                    @endif

                    {{-- @if($errors->any())
                      <div class="alert alert-danger mt-1">
                          <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                          <h4>Whoops! Something went wrong.</h4>
                          <span class="text-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </span>
                      </div>
                    @endif --}}

                    <div class="card-body">
                        <form action="{{ route('import-categories') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="importing_input" class="form-control border-1 border-dark @error('importing_input') is-invalid @enderror">
                            @error('importing_input')
                                <span class="invalid-feedback mb-4" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 

                            {{-- <div class="valid-feedback">Okay!</div>
                            <div class="invalid-feedback">Wrong!</div> --}}

                            {{-- @if($errors->has('importing_input'))
                                <div class="invalid-feedback">{{ $errors->first('importing_input') }}</div>
                            @else
                              <div class="valid-feedback">Okay!</div>
                            @endif --}}

                            <div class="mt-4">
                              <button type="submit" class="btn btn-success text-white"><i class="mdi mdi-upload"></i> Import Categories Data</button>
                              <a class="btn btn-warning" href="{{ route('export-categories') }}"><i class="mdi mdi-download"></i> Export Categories Data</a>
                            </div>
                        </form>
                    </div>
              </div>
            </div>
          
      </div>
    </div>
  </div>
@endsection

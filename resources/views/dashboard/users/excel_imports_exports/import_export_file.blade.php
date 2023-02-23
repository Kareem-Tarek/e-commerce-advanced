@extends('layouts.dashboard.master')

@section('title') 
  Users (Excel)
@endsection

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Users</h4>
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
                    <a href="{{ route('users.index') }}" class="text-primary text-decoration-none">Users</a>
                </p>
                <p class="text-muted mb-0">
                    &nbsp;/
                    Import & Export Users from/to Excel file
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
                        <form action="{{ route('import-users') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="importing_input" class="form-control @error('importing_input') is-invalid @enderror">
                            @error('importing_input')
                                <span class="invalid-feedback mb-4" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                            <div class="mt-4">
                              <button type="submit" class="btn btn-success text-white"><i class="mdi mdi-upload"></i> Import Users Data</button>
                              <a class="btn btn-warning" href="{{ route('export-users') }}"><i class="mdi mdi-download"></i> Export Users Data</a>
                            </div>
                        </form>
                    </div>
              </div>
            </div>
          
      </div>
    </div>
  </div>
@endsection

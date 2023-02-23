@extends('layouts.dashboard.master')

@section('title') 
  Contact Us Info (Excel)
@endsection

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Contact Us Info</h4>
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
                    <a href="{{ route('contact-us.index') }}" class="text-primary text-decoration-none">Contact Us Info</a>
                    /
                    <a href="{{ route('customers-contact-us-info') }}" class="text-primary text-decoration-none">Contact Us Info (Customers)</a>
                </p>
                <p class="text-muted mb-0">
                    &nbsp;/
                    Export Customers' Contact Us Info to Excel file
                </p>
            </div>
            <div class="container">
             <div class="card bg-light mt-3">
                    <div class="card-header">
                        Export Excel data from database
                    </div>
                    @if(session()->has('null_data'))
                      <div class="alert alert-danger text-center mt-1">
                        <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                        {{ session()->get('null_data') }}
                      </div>
                    {{-- @elseif(session()->has('exported_file_successfully'))
                      <div class="alert alert-success text-center mt-1">
                        <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                        {{ session()->get('exported_file_successfully') }}
                      </div> --}}
                    @endif

                    <div class="card-body">
                        <a class="btn btn-warning" href="{{ route('export-contact-us-customers') }}"><i class="mdi mdi-download"></i> Export Customers' Contact Us Data</a>
                    </div>
              </div>
            </div>
          
      </div>
    </div>
  </div>
@endsection

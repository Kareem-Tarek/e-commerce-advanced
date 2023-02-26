@extends('layouts.dashboard.master')

@section('title') 
    Dashboard - Login
@endsection

@section('content')
{{-- <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-end flex-wrap">
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <button type="button" onclick="window.location.href='{{ route('import-export-view-categories') }}'" class="btn btn-dark bg-success me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-upload"></i>
            <i class="mdi mdi-download"></i>
            <span>Import/Export into/from "Excel" file</span>
          </button>
          <a href="{{ route('categories.create') }}" class="btn btn-primary text-light">
            <i class="fa-solid fa-plus"></i>
            <span>Add Category</span>
          </a>
        </div>
      </div>
    </div>
</div> --}}



<div class="login-page">
    <div class="form">
      {{-- <form class="register-form">
        <input type="text" placeholder="name"/>
        <input type="password" placeholder="password"/>
        <input type="text" placeholder="email address"/>
        <button>create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form> --}}
      <form class="login-form" action="{{ route('login') }}" method="POST">
        @csrf
        <span class="h3">Welcome Back,</span>
        <input type="text" class="mt-4 @error('email') is-invalid @enderror" name="email" placeholder="Email, username or phone here.."/>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Password here.."/>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <button type="submit" class="mt-2">login</button>
        <p class="message">Not registered? <a href="#">Create an account</a></p>
      </form>
    </div>
</div>  
@endsection

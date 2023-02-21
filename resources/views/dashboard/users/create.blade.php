@extends('layouts.dashboard.master')
@inject('User_model', 'App\Models\User')

@section('title')
    Create User
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
            <h4 class="card-title">Users</h4>
            <p class="card-description">
                Add User
            </p>
            <div class="col-sm-12 col-xl-12 xl-100">
                {{-- <div class="card-header pb-0">
                    <h5>Add New Category</h5>
                </div> --}}
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <form action="{{route('users.store')}}" class="forms-sample" method="post" id="alert-form">
                            @csrf
                            @include('dashboard.users.form')
                            <input type="submit" value="Add" class="btn btn-success border-info text-light me-2">
                            <input type="reset" value="Reset" class="btn btn-light border-secondary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

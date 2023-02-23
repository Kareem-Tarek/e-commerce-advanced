@extends('layouts.dashboard.master')

@section('title')
    @if($User_model->id == auth()->user()->id)
        Edit your data
    @else
        Edit User ({{ $User_model->name ?? $User_model->username }})
    @endif 
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
            <h4 class="card-title">Users</h4>
            <p class="card-description">
                @if($User_model->id == auth()->user()->id)
                    Edit your data
                @else
                    Edit User (<span class="fw-bold">{{ $User_model->name ?? $User_model->username }}</span>)
                @endif 
            </p>
            <div class="col-sm-12 col-xl-12 xl-100">
                {{-- <div class="card-header pb-0">
                    <h5>Add New Category</h5>
                </div> --}}
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <form action="{{route('users.update', $User_model->id)}}" class="forms-sample" method="post" id="alert-form">
                            @csrf
                            {{ method_field('patch') }}
                            @include('dashboard.users.form')
                            <input type="submit" value="Update" class="btn btn-primary border-info text-light me-2">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary text-light me-2">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.dashboard.master')

@section('title')
    Edit Category ({{ $Category_model->name }})
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
            <h4 class="card-title">Categories</h4>
            <p class="card-description">
                Edit Category (<span class="fw-bold">{{ $Category_model->name }}</span>)
            </p>
            <div class="col-sm-12 col-xl-12 xl-100">
                {{-- <div class="card-header pb-0">
                    <h5>Add New Category</h5>
                </div> --}}
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <form action="{{route('categories.update', $Category_model->id)}}" class="forms-sample" method="post" id="alert-form">
                            @csrf
                            {{ method_field('put') }}
                            @include('dashboard.categories.form')
                            <input type="submit" value="Update" class="btn btn-primary border-info text-light me-2">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

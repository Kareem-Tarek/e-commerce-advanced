@extends('layouts.dashboard.master')

@section('title')
    Edit Sub-category ({{ $SubCategory_model->name }})
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
            <h4 class="card-title">Sub-categories</h4>
            <p class="card-description">
                Edit Sub-category (<span class="fw-bold">{{ $SubCategory_model->name }}</span>)
            </p>
            <div class="col-sm-12 col-xl-12 xl-100">
                {{-- <div class="card-header pb-0">
                    <h5>Add New Category</h5>
                </div> --}}
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <form action="{{route('subcategories.update', $SubCategory_model->id)}}" class="forms-sample" method="post" id="alert-form">
                            @csrf
                            {{ method_field('put') }}
                            @include('dashboard.sub_categories.form')
                            <input type="submit" value="Update" class="btn btn-primary border-info text-light me-2">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

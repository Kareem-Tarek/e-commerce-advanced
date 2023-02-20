@extends('layouts.dashboard.master')

@section('title')
    Edit Final Product ({{ $FinalProduct_model->productDetail->name }})
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
            <div class="d-flex justify-content-start">
                <h6 class="fw-bold">Final Products</h6>&nbsp;
                <h6>(for "<span class="fw-bold text-decoration-underline">{{ $FinalProduct_model->productDetail->name }}</span>")</h6>
            </div>
            <p class="card-description">
                Edit Final Product (ID: <span class="fw-bold">{{ $FinalProduct_model->id }}</span>)
            </p>
            <div class="col-sm-12 col-xl-12 xl-100">
                {{-- <div class="card-header pb-0">
                    <h5>Add New Category</h5>
                </div> --}}
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <form action="{{route('products.update', $FinalProduct_model->id)}}" class="forms-sample" method="post" id="alert-form">
                            @csrf
                            {{ method_field('put') }}
                            @include('dashboard.products.final_products.form')
                            <input type="submit" value="Update" class="btn btn-primary border-info text-light me-2">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary text-light me-2">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

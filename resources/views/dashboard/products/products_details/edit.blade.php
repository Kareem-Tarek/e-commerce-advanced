@extends('layouts.dashboard.master')

@section('title')
    Edit Product Detail ({{ $ProductDetail_model->name }})
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
            <h4 class="card-title">Products</h4>
            <p class="card-description">
                Edit Product Detail ({{ $ProductDetail_model->name }})
            </p>
            <div class="col-sm-12 col-xl-12 xl-100">
                {{-- <div class="card-header pb-0">
                    <h5>Add New Product</h5>
                </div> --}}
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <form action="{{route('all-products.update', [$ProductDetail_model->id])}}" class="forms-sample" method="post" id="alert-form">
                            @csrf
                            {{ method_field('put') }}
                            @include('dashboard.products.products_details.form')
                            <input type="submit" value="Update" class="btn btn-primary border-info text-light me-2">
                            <a href="{{ route('all-products.index') }}" class="btn btn-secondary text-light me-2">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

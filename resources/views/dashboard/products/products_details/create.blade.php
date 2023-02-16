@extends('layouts.dashboard.master')
@inject('ProductDetail_model', 'App\Models\ProductDetail')

@section('title')
    Create Product Detail
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
            <h4 class="card-title">Products</h4>
            <p class="card-description">
                Add Product Detail
            </p>
            <div class="col-sm-12 col-xl-12 xl-100">
                {{-- <div class="card-header pb-0">
                    <h5>Add New Product</h5>
                </div> --}}
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <form action="{{route('all-products.store')}}" class="forms-sample" method="post" id="alert-form">
                            @csrf
                            @include('dashboard.products.products_details.form')
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

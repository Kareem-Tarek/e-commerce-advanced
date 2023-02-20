@extends('layouts.dashboard.master')
@inject('FinalProduct_model', 'App\Models\FinalProduct')

@section('title')
    Create Final Product
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
            <h4 class="card-title">Products</h4>
            <p class="card-description">
                Add Final Product
            </p>
            <div class="col-sm-12 col-xl-12 xl-100">
                {{-- <div class="card-header pb-0">
                    <h5>Add New Product</h5>
                </div> --}}
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <form action="{{route('products.store')}}" class="forms-sample" method="POST" id="alert-form">
                            @csrf
                            @include('dashboard.products.final_products.form')
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

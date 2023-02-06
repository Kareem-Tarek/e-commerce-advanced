@extends('layouts.admin.master')
@inject('model', 'App\Models\Product')

@section('title')
    Create Product
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Create Product</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('products.index')}}">Products</a> </li>
        <li class="breadcrumb-item active">Create Product</li>

    @endcomponent

    @include('layouts.admin.partials.validation-errors')

    <div class="col-sm-12 col-xl-6 xl-100">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Add New Product</h5>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <form action="{{route('products.store')}}" method="post" id="alert-form">
                        @csrf
                        @include('dashboard.products.form')
                        <button class="btn btn-success mt-4 d-block me-auto" type="submit">Add</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

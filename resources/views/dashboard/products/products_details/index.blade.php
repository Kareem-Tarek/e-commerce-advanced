@extends('layouts.dashboard.master')

@section('title') 
    @if(auth()->user()->user_type == "supplier")
        All My Products
    @else
        All Products
    @endif
@endsection

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Products</h4>
        <p class="card-description">
            <div class="d-flex mb-3">
                <a href="{{ route('dashboard') }}">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                </a>
                <p class="text-muted mb-0 hover-cursor">
                    &nbsp;/&nbsp;
                    <a href="javascript:void(0);" class="text-decoration-none">
                        @if(auth()->user()->user_type == "supplier")
                            All My Products
                        @else
                            All Products
                        @endif
                    </a>
                </p>
            </div>
          {{-- Add class <code>.table-striped</code> --}}
            <span class="bg-secondary px-2 py-1 text-light rounded">
                Products' Results (<span class="fw-bold">{{ $products_details_count }}</span>)
            </span>
        </p>
        <div class="table-responsive mt-2">
          <table class="table table-striped table-bordered border border-secondary @if($products_details_count == 0) d-none @endif">
            <thead>
              <tr>
                <th class="fw-bold text-center">#</th>
                {{-- <th class="text-center text-white" style="background-color: rgb(129, 170, 247);">ID</th> --}}
                <th class="text-center">Image</th>
                <th class="text-center">Name</th>
                <th class="text-center">Discount</th>
                <th class="text-center">Price (EGP)</th>
                <th class="text-center">Category</th>
                <th class="text-center">Sub-category</th>
                <th class="text-center">Brand Name</th>
                <th class="text-center">Supplier</th>
                <th class="text-center">—</th>
                @if(auth()->user()->user_type == "admin")
                    <th class="text-center">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
                @forelse($products_details as $product)
                    <tr>
                        <td class="fw-bold">{{ $loop->iteration }}</td>

                        {{-- <td class="fw-bold text-primary">{{ $product->product_id }}</td> --}}

                        <td class="py-1"><img src="{{ $product->image }}" alt="img Not Found!"/></td>

                        <td>{{ $product->name }}</td>

                        <td class="text-center w-25">
                            @if($product->discount == 0)
                                —
                            @else
                                {{-- <span class="fw-bold text-light bg-dark p-1 rounded">
                                    {{ $product->discount * 100}}%
                                </span> --}}
                                <span class="fw-bold">{{ $product->discount * 100 }}%</span>
                                <div class="progress mt-2">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $product->discount * 100 }}%" aria-valuenow="{{ $product->discount * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            @endif
                        </td>

                        <td>
                            @if($product->discount > 0)
                                <del class="text-danger">{{ $product->price }}</del>
                                &RightArrow;
                                <span class="text-success fw-bold">{{ $product->price - ($product->price * $product->discount) }}</span>
                            @else($product->discount == 0)
                                <span class="text-dark">{{ $product->price }}</span>
                            @endif
                        </td>

                        <td>
                            {{ ucfirst($product->subCategory->Category->name) }}
                        </td>

                        <td>
                            {{ ucfirst($product->subCategory->name) }}
                        </td>

                        <td>{{ $product->brand_name }}</td>
                        
                        <td>{{ $product->user_supplier->name }}</td>

                        <td>
                            <a href="{{ route('products.index', [$product->id, $product->name]) }}" class="text-light text-decoration-none">
                                <div class="bg-secondary text-center px-0 py-1 rounded">
                                    Show more details...
                                </div>
                            </a>
                        </td>

                        @if(auth()->user()->user_type == "admin")
                            <td class="text-center">
                                <a href="javascript:void(0);" class="btn btn-success btn-sm p-1 text-white">
                                    <i class="fas fa-edit dashboard-admin-icon-action"></i> Edit
                                </a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm p-1 text-white">
                                    <i class="fa-solid fa-trash dashboard-admin-icon-action"></i> Delete
                                </a>
                            </td>
                        @endif
                    </tr>
                    @empty
                        <div class="alert alert-danger text-center">
                            <span class="h6">There are no products yet! <a href="{{ route('products.create') }}" class="fw-bold text-dark">Add products from here</a>.</span>
                        </div>
                @endforelse
            </tbody>
          </table>
        </div>
      </div>
      <nav class="m-b-30" aria-label="Page navigation example">
        <ul class="pagination justify-content-center pagination-primary">
            {!! $products_details->links('pagination::bootstrap-5') !!}
        </ul>
    </nav>
    </div>
  </div>
@endsection

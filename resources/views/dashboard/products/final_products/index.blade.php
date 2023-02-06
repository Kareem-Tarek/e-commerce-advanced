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
                    <a href="{{ route('all_products.index') }}" class="text-decoration-none">
                        @if(auth()->user()->user_type == "supplier")
                            All My Products
                        @else
                            All Products
                        @endif
                    </a>
                    &nbsp;/&nbsp;
                    @if(auth()->user()->user_type == "supplier")
                        All My Products Varieties That Belongs To
                    @else
                        All Products Varieties That Belongs To
                    @endif
                    &nbsp;</p>
                    &RightArrow;
                    &nbsp;
                "<p class="text-success fw-bold mb-0 hover-cursor">{{ $find_product->name }}</p>"
            </div>
          {{-- Add class <code>.table-striped</code> --}}
            @if(auth()->user()->user_type == "supplier")
                All My Products ({{ $final_products_count }})
            @else
                All Products ({{ $final_products_count }})
            @endif
        </p>
        <div class="table-responsive">
          <table class="table table-striped table-bordered border border-secondary @if($final_products_count == 0) d-none @endif">
            <thead>
              <tr>
                <th class="fw-bold text-center">#</th>
                <th class="text-center text-white" style="background-color: rgb(129, 170, 247);">ID</th>
                <th class="text-center">Image</th>
                <th class="text-center">Name</th>
                <th class="text-center">Size</th>
                <th class="text-center">Color</th>
                <th class="text-center">Discount</th>
                <th class="text-center">Price (EGP)</th>
                <th class="text-center">Available Quantity</th>
                <th class="text-center">Category</th>
                <th class="text-center">Sub-category</th>
                <th class="text-center">Brand Name</th>
                <th class="text-center">Supplier</th>
                @if(auth()->user()->user_type == "admin")
                    <th class="text-center">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
                @forelse($final_products as $product)
                    <tr>
                        <td class="fw-bold">{{ $loop->iteration }}</td>

                        <td class="fw-bold text-primary">{{ $product->product_id }}</td>

                        <td class="py-1"><img src="{{ $product->image }}" alt="img Not Found!"/></td>

                        <td>{{ $product->productDetail->name }}</td>

                        <td>{{ $product->size }}</td>

                        <td class="text-center w-25">
                            {{ $product->color }}&nbsp;
                            <span style="background-color: {{ $product->color }}; color: {{ $product->color }}; border: 1px solid black;">
                                ——
                            </span>
                        </td>

                        <td class="text-center w-25">
                            @if($product->productDetail->discount == 0)
                                —
                            @else
                                {{-- <span class="fw-bold text-light bg-dark p-1 rounded">
                                    {{ $product->productDetail->discount * 100}}%
                                </span> --}}
                                <span class="fw-bold">{{ $product->productDetail->discount * 100 }}%</span>
                                <div class="progress mt-2">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $product->productDetail->discount * 100 }}%" aria-valuenow="{{ $product->productDetail->discount * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            @endif
                        </td>

                        <td>
                            @if($product->productDetail->discount > 0)
                                <del class="text-danger">{{ $product->productDetail->price }}</del>
                                &RightArrow;
                                <span class="text-success fw-bold">{{ $product->productDetail->price - ($product->productDetail->price * $product->productDetail->discount) }}</span>
                            @else($product->productDetail->discount == 0)
                                <span class="text-dark">{{ $product->productDetail->price }}</span>
                            @endif
                        </td>

                        <td class="text-center">
                            @if($product->available_quantity <= 4 && (auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"))
                                <span class="text-danger">{{ $product->available_quantity }}</span>
                                <hr>
                                <a href="javascript:void(0);" class="text-dark text-decoration-none">
                                    <div class="bg-warning px-0 py-1 rounded">
                                        Inform supplier!
                                    </div>
                                </a>
                            @elseif($product->available_quantity <= 4 && auth()->user()->user_type == "supplier")
                                <span class="text-danger">{{ $product->available_quantity }}</span>
                            @else
                                <span>{{ $product->available_quantity }}</span>
                            @endif
                        </td>

                        <td>
                            {{ ucfirst($product->productDetail->subCategory->Category->name) }}
                        </td>

                        <td>
                            {{ ucfirst($product->productDetail->subCategory->name) }}
                        </td>

                        <td>{{ $product->productDetail->brand_name }}</td>
                        
                        <td>{{ $product->productDetail->user_supplier->name }}</td>

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
            {!! $final_products->links('pagination::bootstrap-5') !!}
        </ul>
    </nav>
    </div>
  </div>
@endsection

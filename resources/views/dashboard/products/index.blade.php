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
          {{-- Add class <code>.table-striped</code> --}}
            @if(auth()->user()->user_type == "supplier")
                All My Products
            @else
                All Products
            @endif
        </p>
        <div class="table-responsive">
          <table class="table table-striped table-bordered @if($final_products->count() == 0) d-none @endif">
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
                {{-- <th class="text-center">Category</th>
                <th class="text-center">Sub-category</th> --}}
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

                        <td style="width: 15%;">
                            {{ $product->color }}&nbsp;
                            <span style="background-color: {{ $product->color }}; color: {{ $product->color }}; border: 1px solid black;">
                                ——
                            </span>
                        </td>

                        <td class="text-center" style="width: 15%;">
                            @if($product->productDetail->discount == 0)
                                —
                            @else
                                {{-- <span class="fw-bold text-light bg-dark p-1 rounded">
                                    {{ $product->productDetail->discount * 100}}%
                                </span> --}}
                                {{ $product->productDetail->discount * 100 }}%
                                <div class="progress">
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

                        <td class="text-center w-25">
                            @if($product->available_quantity <= 4 && (auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"))
                                <span class="text-danger">{{ $product->available_quantity }}</span>
                                <hr>
                                <a href="javascript:void(0);" class="px-2 py-1" style="background-color: rgb(247, 176, 54); color: black; border-radius: 20px;">
                                    Inform supplier!
                                </a>
                            @elseif($product->available_quantity <= 4 && auth()->user()->user_type == "supplier")
                                <span class="text-danger">{{ $product->available_quantity }}</span>
                            @else
                                <span>{{ $product->available_quantity }}</span>
                            @endif
                        </td>

                        {{-- <td>
                            {{ $product->productDetail->p ?? '/' }}
                        </td>

                        <td>
                            {{ $product->productDetail->subCategory->name ?? '/' }}
                        </td> --}}

                        <td>{{ $product->productDetail->brand_name }}</td>
                        
                        <td>{{ $product->productDetail->user_supplier->name }}</td>

                        @if(auth()->user()->user_type == "admin")
                            <td class="text-center" style="width: 15%;">
                                <a href="javascript:void(0);" class="btn btn-success btn-sm p-1 text-white">
                                    <i class="fas fa-edit icon-sm" style="font-size: 100%;"></i> Edit
                                </a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm p-1 text-white">
                                    <i class="fa-solid fa-trash" style="font-size: 100%;"></i> Delete
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

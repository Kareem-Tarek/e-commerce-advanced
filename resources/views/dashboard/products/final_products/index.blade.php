@extends('layouts.dashboard.master')

@section('title') 
    @if(auth()->user()->user_type == "supplier")
        My Products ({{ $product_detail->name }})
    @else
        Products ({{ $product_detail->name }})
    @endif
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-end flex-wrap">
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
            <i class="mdi mdi-download text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-clock-outline text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-plus text-muted"></i>
          </button>
          <a href="{{ route('products.create') }}" class="btn btn-primary mt-2 mt-xl-0 text-light">
            Add Product Variety (for "{{ $product_detail->name }}")
          </a>
        </div>
      </div>
    </div>
</div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Products</h4>
        <p class="card-description">
            <div class="d-flex mb-3">
                <a href="{{ route('dashboard') }}">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                </a>
                <p class="text-muted mb-0">
                    &nbsp;/&nbsp;
                    <a href="{{ route('products_details.index') }}" class="text-decoration-none">
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
                    &nbsp;
                </p>
                    &RightArrow;
                    &nbsp;
                "<p class="text-success fw-bold mb-0">{{ $product_detail->name }}</p>"
            </div>
          {{-- Add class <code>.table-striped</code> --}}
            <span class="bg-secondary px-2 py-1 text-light rounded">
                Results (<span class="fw-bold">{{ $final_products_count }}</span>)
            </span>
        </p>
        <div class="table-responsive">
          <table class="table table-striped table-bordered border border-secondary @if($final_products_count == 0) d-none @endif">
            <thead>
              <tr class="bg-dark text-light">
                <th class="fw-bold">#</th>
                {{-- <th class="text-center text-white" style="background-color: rgb(129, 170, 247);">ID</th> --}}
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
                @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "supplier")
                    <th class="text-center">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
                @forelse($final_products as $product)
                    <tr>
                        <td class="fw-bold">{{ $loop->iteration }}</td>

                        {{-- <td class="fw-bold text-primary">{{ $product->product_id }}</td> --}}

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
                                <span class="fw-bold text-light bg-dark p-1 rounded">
                                    {{ $product->productDetail->discount * 100}}%
                                </span>
                                {{-- <span class="fw-bold">{{ $product->productDetail->discount * 100 }}%</span>
                                <div class="progress mt-2">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $product->productDetail->discount * 100 }}%" aria-valuenow="{{ $product->productDetail->discount * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> --}}
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
                            @if($product->available_quantity <= 5 && (auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"))
                                <span class="text-danger">{{ $product->available_quantity }}</span>
                                <hr>
                                <a href="javascript:void(0);" class="text-dark text-decoration-none">
                                    <div class="bg-warning px-0 py-1 rounded">
                                        Inform supplier!
                                    </div>
                                </a>
                            @elseif($product->available_quantity <= 5 && auth()->user()->user_type == "supplier")
                                <span class="text-danger">{{ $product->available_quantity }}</span>
                                <hr>
                                <a href="javascript:void(0);" class="text-dark text-decoration-none">
                                    <div class="bg-warning px-0 py-1 rounded">
                                        Add more quantity!
                                    </div>
                                </a>
                            @else
                                <span>{{ $product->available_quantity }}</span>
                            @endif
                        </td>

                        <td>
                            {{ ucfirst($product->productDetail->subCategory->Category->name) ?? 'N/A' }}
                        </td>

                        <td>
                            {{ ucfirst($product->productDetail->subCategory->name) ?? 'N/A'}}
                        </td>

                        <td>{{ $product->productDetail->brand_name }}</td>
                        
                        <td>{{ $product->productDetail->user_supplier->name }}</td>

                        @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "supplier")
                            <td class="text-center">
                                {{-- <a href="javascript:void(0);" class="btn btn-primary btn-sm p-1 text-white">
                                    <i class="fas fa-edit dashboard-admin-icon-action"></i> Edit
                                </a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm p-1 text-white">
                                    <i class="fa-solid fa-trash dashboard-admin-icon-action"></i> Delete
                                </a> --}}
                                {!! Form::open([
                                    'route' => ['products.destroy',$product->id],
                                    'method' => 'delete'
                                ])!!}
                                @php $product_name = $product->productDetail->name @endphp
                                <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary btn-md p-1 text-white" type="button" title="{{'Edit '."- $product_name [$product->id]"}}"><i class="fas fa-edit dashboard-admin-icon-action"></i> Edit</a>
                                <button class="btn btn-danger btn-md p-1 text-white" onclick="return confirm('Are you sure that you want to delete - {{ $product_name }}?');" type="submit" title="{{'Delete '."- $product_name [$product->id]"}}"><i class="fa-solid fa-trash dashboard-admin-icon-action"></i> Delete </button>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    </tr>
                    @empty
                        <div class="alert alert-danger text-center">
                            <span class="h6">There are no product varieties for this product ({{ $product_detail->name }}) yet!</span>
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

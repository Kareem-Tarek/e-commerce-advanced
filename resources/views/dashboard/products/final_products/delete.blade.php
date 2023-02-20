@extends('layouts.dashboard.master')

@section('title') 
    @if(auth()->user()->user_type == "supplier")
        My Deleted Final Products
    @else
        Deleted Final Products
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
          <a href="{{ route('products.create') }}" class="btn btn-primary text-light">
            <i class="fa-solid fa-plus"></i>
            <span>Add a Product Variety</span>
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
                <a href="{{ route('dashboard') }}" class="text-decoration-none">
                  <i class="mdi mdi-home text-primary"></i>
                  <span class="text-primary">
                    @if(auth()->user()->user_type == 'admin') 
                      Admin
                    @elseif(auth()->user()->user_type == 'moderator')
                      Moderator
                    @else
                      Supplier 
                    @endif 
                    Dashboard
                  </span>
                </a>
                <p class="text-muted mb-0">
                    &nbsp;/&nbsp;
                    <a href="{{ url()->previous() }}" class="text-decoration-none">
                        @if(auth()->user()->user_type == "supplier")
                            All My Deleted Final Products
                        @else
                            All Deleted Final Products
                        @endif
                    </a>
                </p>
            </div>
            @if(session()->has('added_final_products_message'))
                <div class="alert alert-success text-center">
                  <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                  {{ session()->get('added_final_products_message') }} 
                </div>
            @endif
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
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Image</th>
                <th class="text-center">Size</th>
                <th class="text-center">Color</th>
                <th class="text-center">Discount</th>
                <th class="text-center">Price (EGP)</th>
                <th class="text-center">Available Quantity</th>
                <th class="text-center">Category</th>
                <th class="text-center">Sub-category</th>
                <th class="text-center">Brand Name</th>
                <th class="text-center">Supplier</th>
                <th class="text-center">Deleted at</th>
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

                        <td class="fw-bold">{{ $product->id }}</td>

                        <td>{{ $product->productDetail->name }}</td>

                        <td class="py-1"><img src="{{ $product->image }}" alt="No img!"/></td>

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
                            @if($product->available_quantity <= 5)
                                @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator")
                                    <span class="text-danger">{{ $product->available_quantity }}</span>
                                    <hr>
                                    <a href="javascript:void(0);" class="text-dark text-decoration-none">
                                        <div class="bg-warning px-0 py-1 rounded">Inform supplier!</div>
                                    </a>
                                @else(auth()->user()->user_type == "supplier")
                                    <span class="text-danger">{{ $product->available_quantity }}</span>
                                    <hr>
                                    <a href="javascript:void(0);" class="text-dark text-decoration-none">
                                        <div class="bg-warning px-0 py-1 rounded">Add more quantity!</div>
                                    </a>
                                @endif
                            @else($product->available_quantity > 5)
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
                        
                        <td>{{ $product->deleted_at->format('(D) d-M-Y — h:m A') }}</td>

                        @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "supplier")
                            <td class="text-center">
                                {{-- <a href="javascript:void(0);" class="btn btn-primary btn-sm p-1 text-white">
                                    <i class="fas fa-edit dashboard-admin-icon-action"></i> Edit
                                </a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm p-1 text-white">
                                    <i class="fa-solid fa-trash dashboard-admin-icon-action"></i> Delete
                                </a> --}}
                                {!! Form::open([
                                    'route' => ['products.forceDelete',$product->id],
                                    'method' => 'delete'
                                ])!!}
                                @php $product_name = $product->productDetail->name @endphp
                                <a href="{{route('products.restore', $product->id)}}" class="btn btn-success btn-md p-1 text-white" type="button" title="{{'Edit '."- $product_name [$product->id]"}}"><i class="fas fa-edit dashboard-admin-icon-action"></i> Restore</a>
                                <button class="btn btn-danger btn-md p-1 text-white" onclick="return confirm('Are you sure that you want to delete - {{ $product_name }}?');" type="submit" title="{{'Delete '."- $product_name [$product->id]"}}"><i class="fa-solid fa-trash dashboard-admin-icon-action"></i> Permanent Delete</button>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    </tr>
                    @empty
                        <div class="alert alert-danger text-center">
                            <span class="h6">There are no deleted product varieties yet!</span>
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

@extends('layouts.dashboard.master')

@section('title') 
    @if(auth()->user()->user_type == "supplier")
        My Products Details (With Discounts)
    @else
        Products Details (With Discounts)
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
          <a href="{{ route('all-products.create') }}" class="btn btn-primary text-light">
            <i class="fa-solid fa-plus"></i>
            <span>Add Product Detail</span>
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
                    @if(auth()->user()->user_type == "supplier")
                        All My Products (With Discounts)
                    @else
                        All Products (With Discounts)
                    @endif
                </p>
            </div>
            @if(session()->has('deleted_product_detail_message'))
                <div class="alert alert-success text-center">
                  <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                  {{ session()->get('deleted_product_detail_message') }} 
                  and moved to <a href="{{ route('all-products.delete') }}" class="text-primary text-decoration-none">Trash</a>.
                </div>
            @endif
          {{-- Add class <code>.table-striped</code> --}}
            <span class="bg-secondary px-2 py-1 text-light rounded">
                Results (<span class="fw-bold">{{ $products_details_count }}</span>)
            </span>
        </p>
        <div class="table-responsive mt-2">
          <table class="table table-striped table-bordered border border-secondary @if($products_details_count == 0) d-none @endif">
            <thead>
              <tr class="bg-dark text-light">
                <th class="fw-bold">#</th>
                {{-- <th class="text-center text-white" style="background-color: rgb(129, 170, 247);">ID</th> --}}
                <th class="text-center">Name</th>
                <th class="text-center">Discount</th>
                <th class="text-center">Price (EGP)</th>
                <th class="text-center">Category</th>
                <th class="text-center">Sub-category</th>
                <th class="text-center">Brand Name</th>
                <th class="text-center">Supplier</th>
                <th class="text-center"> Created at</th>
                <th class="text-center"> Updated at</th>
                <th class="text-center"> Added by</th>
                <th class="text-center"> Last Updated by</th>
                <th class="text-center"> More Details</th>
                @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "supplier")
                    <th class="text-center">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
                @forelse($products_details as $product)
                    <tr>
                        <td class="fw-bold">{{ $loop->iteration }}</td>

                        {{-- <td class="fw-bold text-primary">{{ $product->product_id }}</td> --}}

                        <td>{{ $product->name }}</td>

                        <td class="text-center w-25">
                            {{-- <span class="fw-bold text-light bg-dark p-1 rounded">
                                {{ $product->discount * 100}}%
                            </span> --}}
                            <span class="fw-bold">{{ $product->discount * 100 }}%</span>
                            <div class="progress mt-2">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $product->discount * 100 }}%" aria-valuenow="{{ $product->discount * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>

                        <td>
                            <del class="text-danger">{{ $product->price }}</del>
                            &RightArrow;
                            <span class="text-success fw-bold">{{ $product->price - ($product->price * $product->discount) }}</span>
                        </td>

                        <td>
                            {{ ucfirst($product->subCategory->Category->name) ?? 'N/A' }}
                        </td>

                        <td>
                            {{ ucfirst($product->subCategory->name) ?? 'N/A' }}
                        </td>

                        <td>{{ $product->brand_name }}</td>
                        
                        <td>{{ $product->user_supplier->name ?? 'N/A' }}</td>

                        <td>{{ $product->created_at->format('(D) d-M-Y — h:m A') }}</td>

                        <td>
                            {{ isset($product->updated_at) ? $product->updated_at->format('(D) d-M-Y — h:m A') : 'N/A' }}
                        </td>

                        <td>
                            @if(isset($product->create_user->name) == null)
                                {{ $product->create_user->username ?? 'N/A' }}
                            @else
                                {{ $product->create_user->name ?? 'N/A' }}
                            @endif
                        </td>

                        <td>
                            @if(isset($product->update_user->name) == null)
                                {{ $product->update_user->username ?? 'N/A' }}
                            @else
                                {{ $product->update_user->name ?? 'N/A' }}
                            @endif
                        </td>

                        <td class="text-center">
                            <a href="{{ route('final_products.index', [$product->id, $product->name]) }}" class="text-decoration-none">
                                <div class="bg-secondary text-white fw-bold px-0 py-2 rounded">Show..</div>
                            </a>
                        </td>

                        @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "supplier")
                        <td class="text-center">
                            {{-- <a href="javascript:void(0);" class="btn btn-success btn-sm p-1 text-white">
                                <i class="fas fa-edit dashboard-admin-icon-action"></i> Edit
                            </a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm p-1 text-white">
                                <i class="fa-solid fa-trash dashboard-admin-icon-action"></i> Delete
                            </a> --}}
                            {!! Form::open([
                                'route' => ['all-products.destroy',$product->id],
                                'method' => 'delete'
                            ])!!}
                            <a href="{{route('all-products.edit', $product->id)}}" class="btn btn-primary btn-md p-1 text-white" type="button" title="{{'Edit '."- ($product->name)"}}"><i class="fas fa-edit dashboard-admin-icon-action"></i> Edit</a>
                            <button class="btn btn-danger btn-md p-1 text-white" onclick="return confirm('Are you sure that you want to delete - {{ $product->name }}?');" type="submit" title="{{'Delete '."- ($product->name)"}}"><i class="fa-solid fa-trash dashboard-admin-icon-action"></i> Delete </button>
                            {!! Form::close() !!}
                        </td>
                        @endif
                    </tr>
                    @empty
                        <div class="alert alert-danger text-center">
                            <span class="h6">There are no products with discounts yet! <a href="{{ route('all-products.create') }}" class="fw-bold text-dark">Add products from here (and add a discount to it)</a>.</span>
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

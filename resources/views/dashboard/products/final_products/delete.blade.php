@extends('layouts.admin.master')

@section('title')
    Deleted Products
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Deleted Products</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('products.index')}}">Products</a> </li>
        <li class="breadcrumb-item active">Deleted Products</li>
        @slot('bookmark')
            <a href="{{route('products.create')}}" class="btn btn-pill btn-air-success btn-success-gradien" type="button" title="Add New Product">Add New Product</a>
        @endslot
    @endcomponent
    @include('layouts.admin.partials.messages.message')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Show deleted products - <span class="b-b-success">{{App\Models\Product::where('brand_name', auth()->user()->id)->onlyTrashed()->count()}}</span></h5>
                        <span>
                            All deleted products. If you want to create and add new sections, 
                            you must click the (Add New Product) button at the top of the page, 
                            and if you want to restore any section, press (Restore) next to each product.
                        </span>
                    </div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered @if($products->count() == 0) d-none @endif">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Image</th>
                                        <th scope="col" class="text-center">Discount (%)</th>
                                        <th scope="col" class="text-center">Price (EGP)</th>
                                        <th scope="col" class="text-center">Category</th>
                                        <th scope="col" class="text-center">Clothing Type</th>
                                        <th scope="col" class="text-center">Available Quantity</th>
                                        <th scope="col" class="text-center">Brand Name (Supplier)</th>
                                        <th scope="col" class="text-center">Added By</th>
                                        <th scope="col" class="text-center">Last Updated By</th>
                                        <th scope="col" class="text-center">Date of Creation</th>
                                        <th scope="col" class="text-center">Date of Deletion</th>
                                        @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "supplier")
                                            <th scope="col" class="text-center">Action</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($products as $product)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                        <td class="text-center">{{$product->name}}</td>
                                        <td class="text-center font-secondary">{{$product->image}}</td>
                                        <td>{{ $product->discount * 100 }}%</td>
                                        @if($product->discount > 0)
                                            <td class="text-center">
                                                <span class="font-danger"><del>{{$product->price}}</del></span> <label class="font-secondary">&RightArrow;</label> <span class="font-primary">{{$product->price - ($product->price * $product->discount)}}</span>
                                            </td>
                                        @elseif($product->discount <= 0 || $product->discount == null || $product->discount == "")
                                            <td class="text-center">{{$product->price}}</td>
                                        @endif
                                        <td class="text-center">{{$product->product_category}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('categories.index') }}" style="color: rgb(63, 82, 205);">
                                                @if($product->clothing_type == '1')
                                                    Formal
                                                @elseif($product->clothing_type == '2')
                                                    Casual
                                                @else
                                                    Sports Wear
                                                @endif
                                            </a>
                                        </td>
                                        <td class="text-center">{{$product->available_quantity}}</td>
                                        <td class="text-center">{{$product->user->name ?? $product->user->username}}</td>
                                        <td class="text-center">{{$product->create_user->name ?? '—'}}</td>
                                        <td class="text-center">{{$product->update_user->name ?? '—'}}</td>
                                        <td class="text-center" title="{{$product->created_at->format('Y-D-M h:m h:m A')}}">{{$product->created_at->format('Y-D-M h:m A')}}</td>
                                        <td class="text-center" title="{{$product->deleted_at->format('Y-D-M h:m h:m A')}}">{{$product->deleted_at->format('Y-D-M h:m A')}}</td>
                                        @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "supplier")
                                            <td class="text-center">
                                                {!! Form::open([
                                                    'route' => ['products.forceDelete',$product->id],
                                                    'method' => 'delete'
                                                ])!!}
                                                <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure that you want to permanently delete - {{ $product->name }}?');" type="submit" title="{{'Permanent Delete'." ($product->name)"}}"><i class="fa-solid fa-trash"></i> Permanent Delete </button>
                                                <a href="{{route('products.restore',$product->id)}}" onclick="return confirm('Are you sure that you want to restore - {{ $product->name }}?');" class="btn btn-primary btn-xs" type="button" title="{{'Restore'." ($product->name)"}}"><i class="fa-solid fa-trash-arrow-up"></i> Restore</a>
                                                {!! Form::close() !!}
                                            </td>
                                        @endif
                                    </tr>

                                    @empty
                                        <div class="alert alert-secondary text-center">
                                            <span class="h6">There are no deleted products!</span>
                                        </div>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="m-b-30" aria-label="Page navigation example">
                    <ul class="pagination justify-content-center pagination-primary">
                        {!! $products->links('pagination::bootstrap-5') !!}
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    @push('scripts')
        <script src="{{asset('admin/js/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap/bootstrap.min.js')}}"></script>
    @endpush

@endsection

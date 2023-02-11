@extends('layouts.dashboard.master')

@section('title') 
    Categories
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
          <a href="{{ route('categories.create') }}" class="btn btn-primary mt-2 mt-xl-0 text-light">
            Add Category
          </a>
        </div>
      </div>
    </div>
</div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Categories</h4>
        <p class="card-description">
            <div class="d-flex mb-3">
                <a href="{{ route('dashboard') }}">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                </a>
                <p class="text-muted mb-0 hover-cursor">
                    &nbsp;/&nbsp;
                    <a href="javascript:void(0);" class="text-decoration-none">
                        All Categories
                    </a>
                </p>
            </div>
            @if(session()->has('added_category_message'))
                <div class="alert alert-success text-center">
                    {{ session()->get('added_category_message') }}
                </div>
            @elseif(session()->has('updated_same_name_category_message'))
                <div class="alert alert-warning text-center">
                    {{ session()->get('updated_same_name_category_message') }}
                </div>
            @elseif(session()->has('updated_category_message'))
                <div class="alert alert-success text-center">
                    {{ session()->get('updated_category_message') }}
                </div>
            @elseif(session()->has('deleted_category_message'))
                <div class="alert alert-success text-center">
                    {{ session()->get('deleted_category_message') }} 
                    and moved to <a href="{{ route('categories.delete') }}" class="text-primary text-decoration-none">Trash</a>.
                </div>
            @endif
          {{-- Add class <code>.table-striped</code> --}}
            <span class="bg-secondary px-2 py-1 text-light rounded">
                Categories' Results (<span class="fw-bold">{{ $categories_count }}</span>)
            </span>
        </p>
        <div class="table-responsive mt-2">
          <table class="table table-striped table-bordered border border-secondary @if($categories_count == 0) d-none @endif">
            <thead>
              <tr class="bg-dark text-light">
                <th class="fw-bold">#</th>
                {{-- <th class="text-center text-white" style="background-color: rgb(129, 170, 247);">ID</th> --}}
                <th class="text-center">Name</th>
                <th class="text-center">Description</th>
                <th class="text-center">Created at</th>
                <th class="text-center">Updated at</th>
                <th class="text-center">Added by</th>
                <th class="text-center">Last Updated by</th>
                @if(auth()->user()->user_type == "admin")
                    <th class="text-center">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td class="fw-bold">{{ $loop->iteration }}</td>

                        {{-- <td class="fw-bold text-primary">{{ $category->product_id }}</td> --}}

                        <td>{{ ucfirst($category->name) }}</td>

                        <td class="@if($category->description == null) text-center @endif">
                            {{ $category->description ?? '—' }}
                        </td>

                        <td>{{ $category->created_at->format('(D) d-M-Y — h:m A') }}</td>

                        <td class="@if($category->updated_at == null) text-center @endif">
                          @if($category->updated_at == null)
                            —
                          @else
                            {{ $category->updated_at->format('(D) d-M-Y — h:m A') }}
                          @endif
                        </td>
                        
                        <td class="text-center">{{ $category->create_user->name ?? '—'}}</td>
                        
                        <td class="text-center">{{ $category->update_user->name ?? '—'}}</td>

                        @if(auth()->user()->user_type == "admin")
                            <td class="text-center">
                                {{-- <a href="javascript:void(0);" class="btn btn-success btn-sm p-1 text-white">
                                    <i class="fas fa-edit dashboard-admin-icon-action"></i> Edit
                                </a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm p-1 text-white">
                                    <i class="fa-solid fa-trash dashboard-admin-icon-action"></i> Delete
                                </a> --}}
                                {!! Form::open([
                                    'route' => ['categories.destroy',$category->id],
                                    'method' => 'delete'
                                ])!!}
                                <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary btn-md p-1 text-white" type="button" title="{{'Edit '."- ($category->name)"}}"><i class="fas fa-edit dashboard-admin-icon-action"></i> Edit</a>
                                <button class="btn btn-danger btn-md p-1 text-white" onclick="return confirm('Are you sure that you want to delete - {{ $category->name }}?');" type="submit" title="{{'Delete '."- ($category->name)"}}"><i class="fa-solid fa-trash dashboard-admin-icon-action"></i> Delete </button>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    </tr>
                    @empty
                        <div class="alert alert-danger text-center">
                            <span class="h6">There are no categories yet! <a href="{{ route('categories.create') }}" class="fw-bold text-dark">Add categories from here</a>.</span>
                        </div>
                @endforelse
            </tbody>
          </table>
        </div>
      </div>
      <nav class="m-b-30" aria-label="Page navigation example">
        <ul class="pagination justify-content-center pagination-primary">
            {!! $categories->links('pagination::bootstrap-5') !!}
        </ul>
    </nav>
    </div>
  </div>
@endsection

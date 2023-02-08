@extends('layouts.dashboard.master')

@section('title') 
    Deleted Sub-categories
@endsection

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sub-categories</h4>
        <p class="card-description">
            <div class="d-flex mb-3">
                <a href="{{ route('dashboard') }}">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                </a>
                <p class="text-muted mb-0 hover-cursor">
                    &nbsp;/&nbsp;
                    <a href="javascript:void(0);" class="text-decoration-none">
                        All Deleted Sub-categories
                    </a>
                </p>
            </div>
            @if(session()->has('restored_sub_category_message'))
                <div class="alert alert-success text-center">
                    {{ session()->get('restored_sub_category_message') }} 
                    Go back to the <a href="{{ route('subcategories.index') }}">sub-categories'</a> main page.
                </div>
            @elseif(session()->has('permanent_deleted_sub_category_message'))
                <div class="alert alert-success text-center">
                    {{ session()->get('permanent_deleted_sub_category_message') }}
                </div>
            @endif
          {{-- Add class <code>.table-striped</code> --}}
            <span class="bg-secondary px-2 py-1 text-light rounded">
                Sub-categories' Results (<span class="fw-bold">{{ $sub_categories_count }}</span>)
            </span>
        </p>
        <div class="table-responsive mt-2">
          <table class="table table-striped table-bordered border border-secondary @if($sub_categories_count == 0) d-none @endif">
            <thead>
              <tr class="bg-dark text-light">
                <th class="fw-bold">#</th>
                {{-- <th class="text-center text-white" style="background-color: rgb(129, 170, 247);">ID</th> --}}
                <th class="text-center">Name<br>(Sub-category)</th>
                <th class="text-center">Category</th>
                <th class="text-center">Description</th>
                <th class="text-center">Created at</th>
                <th class="text-center">Deleted at</th>
                <th class="text-center">Deleted by</th>
                <th class="text-center">Added by</th>
                <th class="text-center">Last Updated by</th>
                @if(auth()->user()->user_type == "admin")
                    <th class="text-center">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
                @forelse($sub_categories as $sub_category)
                    <tr>
                        <td class="fw-bold">{{ $loop->iteration }}</td>

                        {{-- <td class="fw-bold text-primary">{{ $sub_category->product_id }}</td> --}}

                        <td>{{ ucfirst($sub_category->name) }}</td>

                        <td>{{ ucfirst($sub_category->category->name ?? '—') }}</td>

                        <td class="@if($sub_category->description == null) text-center @endif">
                            {{ $sub_category->description ?? '—' }}
                        </td>

                        <td>
                            {{ $sub_category->created_at->format('(D) d-M-Y — h:m A') }}
                        </td>

                        <td>{{ $sub_category->deleted_at->format('(D) d-M-Y — h:m A') }}</td>

                        <td class="text-center">{{ $sub_category->delete_user->name ?? '—' }}</td>
                        
                        <td class="text-center">{{ $sub_category->create_user->name ?? '—' }}</td>
                        
                        <td class="text-center">{{ $sub_category->update_user->name ?? '—' }}</td>

                        @if(auth()->user()->user_type == "admin")
                            <td class="text-center">
                                {{-- <a href="javascript:void(0);" class="btn btn-success btn-sm p-1 text-white">
                                    <i class="fas fa-edit dashboard-admin-icon-action"></i> Edit
                                </a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm p-1 text-white">
                                    <i class="fa-solid fa-trash dashboard-admin-icon-action"></i> Delete
                                </a> --}}
                                {!! Form::open([
                                    'route' => ['subcategories.forceDelete',$sub_category->id],
                                    'method' => 'delete'
                                ])!!}
                                <a href="{{route('subcategories.restore', $sub_category->id)}}" class="btn btn-success btn-md p-1 text-white" type="button" title="{{'Edit '."- ($sub_category->name)"}}"><i class="mdi mdi-backup-restore dashboard-admin-icon-action"></i> Restore</a>
                                <button class="btn btn-danger btn-md p-1 text-white" onclick="return confirm('Are you sure that you want to delete - {{ $sub_category->name }}?');" type="submit" title="{{'Delete '."- ($sub_category->name)"}}"><i class="fa-solid fa-trash dashboard-admin-icon-action"></i> Permanent Delete </button>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    </tr>
                    @empty
                        <div class="alert alert-info text-center">
                            <span class="h6">There are no deleted sub-categories!</span>
                        </div>
                @endforelse
            </tbody>
          </table>
        </div>
      </div>
      <nav class="m-b-30" aria-label="Page navigation example">
        <ul class="pagination justify-content-center pagination-primary">
            {!! $sub_categories->links('pagination::bootstrap-5') !!}
        </ul>
    </nav>
    </div>
  </div>
@endsection
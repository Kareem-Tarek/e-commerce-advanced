@extends('layouts.dashboard.master')

@section('title') 
    Suppliers Contact Us Info
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
          {{-- <a href="" class="btn btn-primary mt-2 mt-xl-0 text-light">
            Button
          </a> --}}
        </div>
      </div>
    </div>
</div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Contact Us</h4>
        <p class="card-description">
            <div class="d-flex mb-3">
                <a href="{{ route('dashboard') }}">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                </a>
                <p class="text-muted mb-0">
                    &nbsp;/&nbsp;
                    Suppliers Contact Us Info
                </p>
            </div>
            @if(session()->has('deleted_contact_us_message'))
                <div class="alert alert-success text-center">
                    <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                    {{ session()->get('deleted_contact_us_message') }}
                </div>
            @endif
          {{-- Add class <code>.table-striped</code> --}}
            <span class="bg-secondary px-2 py-1 text-light rounded">
                Results (<span class="fw-bold">{{ $suppliers_contact_us_count }}</span>)
            </span>
        </p>
        <div class="table-responsive mt-2">
          <table class="table table-striped table-bordered border border-secondary @if($suppliers_contact_us_count == 0) d-none @endif">
            <thead>
              <tr class="bg-dark text-light">
                <th class="fw-bold">#</th>
                {{-- <th class="text-center text-white" style="background-color: rgb(129, 170, 247);">ID</th> --}}
                <th class="text-center">Info Number</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Subject</th>
                <th class="text-center">Message</th> 
                <th class="text-center">Created at</th>
                <th class="text-center">Added by</th>
                <th class="text-center">User Type</th>
                @if(auth()->user()->user_type == "admin")
                    <th class="text-center">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
                @forelse($suppliers_contact_us as $supplier_contact_info)
                    <tr>
                        <td class="fw-bold">{{ $loop->iteration }}</td>

                        <td class="fw-bold">{{ $supplier_contact_info->info_number }}</td>

                        <td>
                            {{ ucfirst($supplier_contact_info->name) }}
                        </td>

                        <td>{{ $supplier_contact_info->email }}</td>

                        <td class="@if($supplier_contact_info->phone == null) text-center @endif">
                            {{ $supplier_contact_info->phone ?? '—' }}
                        </td>

                        <td class="@if($supplier_contact_info->subject == null) text-center @endif">
                            {{ $supplier_contact_info->subject ?? '—' }}
                        </td>

                        <td>{{ $supplier_contact_info->message }}</td>

                        <td>{{ $supplier_contact_info->created_at->format('(D) d-M-Y — h:m A') }}</td>

                        <td>
                            @if($supplier_contact_info->user->name == null)
                                {{ $supplier_contact_info->user->username }}
                            @else
                                {{ $supplier_contact_info->user->name }}
                            @endif
                        </td>

                        <td>{{ ucfirst($supplier_contact_info->user_type) }}</td>

                        @if(auth()->user()->user_type == "admin")
                            <td class="text-center">
                                {{-- <a href="javascript:void(0);" class="btn btn-success btn-sm p-1 text-white">
                                    <i class="fas fa-edit dashboard-admin-icon-action"></i> Edit
                                </a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm p-1 text-white">
                                    <i class="fa-solid fa-trash dashboard-admin-icon-action"></i> Delete
                                </a> --}}
                                {!! Form::open([
                                    'route' => ['contact-us.destroy', $supplier_contact_info->id],
                                    'method' => 'delete'
                                ])!!}
                                <button class="btn btn-danger btn-md p-1 text-white" onclick="return confirm('Are you sure that you want to delete contact info number [ID: {{ $supplier_contact_info->info_number }}] which belongs to ({{$supplier_contact_info->name}} / {{$supplier_contact_info->email}})?');" type="submit" title="{{'Delete '."- Contact Info (ID: $supplier_contact_info->id)"}}"><i class="fa-solid fa-trash dashboard-admin-icon-action"></i> Delete </button>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    </tr>
                    @empty
                        <div class="alert alert-danger text-center">
                            <span class="h6">There are no contact us info from suppliers yet!</span>
                        </div>
                @endforelse
            </tbody>
          </table>
        </div>
      </div>
      <nav class="m-b-30" aria-label="Page navigation example">
        <ul class="pagination justify-content-center pagination-primary">
            {!! $suppliers_contact_us->links('pagination::bootstrap-5') !!}
        </ul>
    </nav>
    </div>
  </div>
@endsection

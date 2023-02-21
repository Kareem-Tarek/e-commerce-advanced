@extends('layouts.dashboard.master')

@section('title') 
  Users
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-end flex-wrap">
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <button type="button" onclick="window.location.href='{{ route('import-export-view-users') }}'" class="btn btn-dark bg-success me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-upload"></i>
            <i class="mdi mdi-download"></i>
            <span>Import/Export into/from "Excel" file</span>
          </button>
          <a href="{{ route('users.create') }}" class="btn btn-primary text-light">
            <i class="fa-solid fa-plus"></i>
            <span>Add User</span>
          </a>
          &nbsp;&nbsp;&nbsp;
          <a href="{{ route('users.edit', auth()->user()->id) }}" class="btn btn-warning text-dark">
            <i class="fas fa-edit"></i>
            <span>Edit your data</span>
          </a>
        </div>
      </div>
    </div>
</div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Users</h4>
        <p class="card-description">
            <div class="d-flex mb-3">
                <a href="{{ route('dashboard') }}" class="text-decoration-none">
                  <i class="mdi mdi-home text-primary"></i>
                  <span class="text-primary">
                    @if(auth()->user()->user_type == 'admin') 
                      Admin
                    @else
                      Moderator 
                    @endif 
                    Dashboard
                  </span>
                </a>
                <p class="text-muted mb-0">
                    &nbsp;/
                    All Users
                </p>
            </div>
            @if(session()->has('added_user_message'))
              <div class="alert alert-success text-center">
                <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                {{ session()->get('added_user_message') }}
              </div>
            @elseif(session()->has('updated_user_message'))
              <div class="alert alert-success text-center">
                <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                {{ session()->get('updated_user_message') }}
              </div>
            @elseif(session()->has('unauthorized_action'))
              <div class="alert alert-danger text-center">
                <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                {{ session()->get('unauthorized_action') }}
              </div>
            @endif
          {{-- Add class <code>.table-striped</code> --}}
            <span class="bg-secondary px-2 py-1 text-light rounded">
                Results (<span class="fw-bold">{{ $users_count }}</span>)
            </span>
        </p>
        <div class="table-responsive mt-2">
          <table class="table table-striped table-bordered border border-secondary @if($users_count == 0) d-none @endif">
            <thead>
              <tr class="bg-dark text-light">
                <th class="fw-bold">#</th>
                {{-- <th class="text-center text-white" style="background-color: rgb(129, 170, 247);">ID</th> --}}
                <th class="text-center">Avatar</th>
                <th class="text-center">Username</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">User Type</th>
                <th class="text-center">Status</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Address</th>
                <th class="text-center">Bio</th>
                <th class="text-center">Gender</th>
                <th class="text-center">DOB</th>
                @if(auth()->user()->user_type == "admin")
                    <th class="text-center">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td class="fw-bold">{{ $loop->iteration }}</td>

                        {{-- <td class="fw-bold text-primary">{{ $user->product_id }}</td> --}}

                        <td class="@if($user->avatar == null) text-center @endif">
                          @if($user->avatar == null)
                            —
                          @else
                            <img src="{{ $user->avatar }}">
                          @endif
                        </td>

                        <td>{{ ucfirst($user->username) }}</td>

                        <td>{{ ucfirst($user->name) }}</td>
                        
                        <td>{{ $user->email }}</td>

                        <td>{{ ucfirst($user->user_type) }}</td>

                        <td>
                          @if($user->status == "active")
                            <span class="bg-success text-white px-2 py-1 rounded">{{ ucfirst($user->status) }}</span>
                          @elseif($user->status == "inactive")
                            <span class="bg-warning text-dark px-2 py-1 rounded">{{ ucfirst($user->status) }}</span>
                          @else($user->status == "blocked")
                            <span class="bg-danger text-white px-2 py-1 rounded">{{ ucfirst($user->status) }}</span>
                          @endif
                        </td>

                        <td class="@if($user->phone == null) text-center @endif">
                          {{ $user->phone ?? '—' }}
                        </td>

                        <td class="@if($user->address == null) text-center @endif">
                          {{ $user->address ?? '—' }}
                        </td>

                        <td class="@if($user->bio == null) text-center @endif">
                          {{ Illuminate\Support\Str::limit($user->bio, '30', '...') ?? '—' }}
                        </td>

                        <td class="@if($user->gender == null) text-center @endif">
                          {{ $user->gender ?? '—' }}
                        </td>

                        <td class="@if($user->dob == null) text-center @endif">
                          {{ $user->dob ?? '—' }}
                        </td>

                        @if(auth()->user()->user_type == "admin")
                            <td class="text-center" style="@if($user->user_type == "admin" && $user->id != auth()->user()->id) background-color: lightgrey; @endif">                              
                              {!! Form::open([
                                  'route' => ['users.destroy',$user->id],
                                  'method' => 'delete'
                              ])!!}
                              @if($user->user_type == "admin" && $user->id != auth()->user()->id)
                                —
                                {{-- <a style="display: none;" href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-md p-1 text-white" type="button" title="{{'Edit '."- ($user->name)"}}"><i class="fas fa-edit dashboard-admin-icon-action"></i> Edit</a> --}}
                                {{-- <button style="display: none;" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure that you want to delete - {{ $user->name }}?');" type="submit" title="{{'Delete'." ($user->name)"}}"><i class="fa-solid fa-trash"></i> Delete </button> --}}
                              @else
                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-md p-1 text-white" type="button" title="{{'Edit '."- ($user->name)"}}"><i class="fas fa-edit dashboard-admin-icon-action"></i> Edit</a>
                                <button class="btn btn-danger btn-md p-1 text-white" onclick="return confirm('Are you sure that you want to delete - {{ $user->name }}?');" type="submit" title="{{'Delete '."- ($user->name)"}}"><i class="fa-solid fa-trash dashboard-admin-icon-action"></i> Delete </button>
                              @endif
                              {!! Form::close() !!}
                          </td>
                        @endif
                    </tr>
                    @empty
                        {{-- <div class="alert alert-danger text-center">
                            <span class="h6">There are no users yet! <a href="{{ route('user.create') }}" class="fw-bold text-dark">Add users from here</a>.</span>
                        </div> --}}
                @endforelse
            </tbody>
          </table>
        </div>
      </div>
      <nav class="m-b-30" aria-label="Page navigation example">
        <ul class="pagination justify-content-center pagination-primary">
            {!! $users->links('pagination::bootstrap-5') !!}
        </ul>
    </nav>
    </div>
  </div>
@endsection

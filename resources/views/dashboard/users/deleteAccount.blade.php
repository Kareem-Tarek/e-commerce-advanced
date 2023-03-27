@extends('layouts.dashboard.master')

@section('title')
    Delete Account
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
            <h4 class="card-title">Delete your account?</h4>
            <p class="h6 fw-bold" style="font-family:Verdana, Geneva, Tahoma, sans-serif;">Very Important!</p>
            <div class="col-sm-12 col-xl-12 xl-100">
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <form action="{{route('users.deleteAccount', [$User_model->id, $User_model->username])}}" class="forms-sample" method="post" id="alert-form">
                            @csrf
                            {{ method_field('delete') }}
                            @if(session()->has('incorrect_password_confirmation_for_account_deletion'))
                                <div class="alert alert-danger text-center">
                                    <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                                    {{ session()->get('incorrect_password_confirmation_for_account_deletion') }}
                                </div>
                            @elseif(session()->has('empty_password_confirmation_for_account_deletion'))
                                <div class="alert alert-danger text-center">
                                    <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                                    {{ session()->get('empty_password_confirmation_for_account_deletion') }}
                                </div>
                            {{-- @elseif(session()->has('account_deleted_successfully')) 
                                <div class="alert alert-success text-center"> 
                                    <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a> 
                                    {{ session()->get('account_deleted_successfully') }} 
                                </div>   --}}
                            @endif
                            <p class="mb-3">Once you delete your account, there is no going back. Please be certain.</p>
                            <input type="password" class="form-control mb-4 border-1 border-dark" name="password" placeholder="Enter your password here..">
                            <input type="submit" value="Delete Account" class="btn btn-danger text-light me-2" onclick="return confirm('Are you sure that you want to delete your account?');" title="Delete Account">
                            <a href="{{ route('users.edit', auth()->user()->id) }}" class="btn btn-secondary text-light me-2">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

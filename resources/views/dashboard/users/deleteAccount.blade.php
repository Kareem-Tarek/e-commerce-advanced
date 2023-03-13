@extends('layouts.dashboard.master')

@section('title')
    Delete Account
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
            <h4 class="card-title">Delete your account?</h4>
            <div class="col-sm-12 col-xl-12 xl-100">
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <form action="{{route('users.deleteAccount', [$User_model->id, $User_model->username])}}" class="forms-sample" method="post" id="alert-form">
                            @csrf
                            {{ method_field('delete') }}

                            {{-- @if(session()->has('account_deleted_successfully')) 
                                <div class="alert alert-success text-center"> 
                                    <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a> 
                                    {{ session()->get('account_deleted_successfully') }} 
                                </div>  
                            @endif --}}
                            <p class="mb-4">Once you delete your account, there is no going back. Please be certain.</p>

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

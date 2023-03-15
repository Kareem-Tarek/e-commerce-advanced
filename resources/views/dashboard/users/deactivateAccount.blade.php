@extends('layouts.dashboard.master')

@section('title')
    Deactivate Account
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
            <h4 class="card-title">Deactivate your account?</h4>
            <p class="h6 fw-bold" style="font-family:Verdana, Geneva, Tahoma, sans-serif;">Read the content down below!</p>
            <div class="col-sm-12 col-xl-12 xl-100">
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <form action="{{route('users.deactivateAccount', [$User_model->id, $User_model->username])}}" class="forms-sample" method="post" id="alert-form">
                            @csrf
                            {{ method_field('patch') }}
                            <p class="mb-4">Once your your account is deactivate you won't be able to do some certain stuff (such as using giving a rate or comment, using cart, ..etc.). But You could reactivate it again by logging out and then logging in again.</p>
                            {{-- <input type="text" class="d-none" value="inactive" name="status"> --}}
                            {{-- <button type="submit" class="btn btn-warning text-dark me-2" onclick="return confirm('Are you sure that you want to deactivate your account?');" title="Deactivate Account">Deactivate Account</button> --}}
                            <button type="submit" value="inactive" name="status" class="btn btn-warning text-dark me-2" onclick="return confirm('Are you sure that you want to deactivate your account?');" title="Deactivate Account">Deactivate Account</button>
                            <a href="{{ route('users.edit', auth()->user()->id) }}" class="btn btn-secondary text-light me-2">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

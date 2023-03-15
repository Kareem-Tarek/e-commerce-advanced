@extends('layouts.dashboard.master')

@section('title')
    {{-- @if($User_model->id == auth()->user()->id)
        Edit your data
    @else
        Edit User ({{ $User_model->name ?? $User_model->username }})
    @endif  --}}
    Change your password
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
            <h4 class="card-title">Change your password</h4>
            <p class="card-description">
                {{-- @if($User_model->id == auth()->user()->id)
                    Edit your data
                @else
                    Edit User (<span class="fw-bold">{{ $User_model->name ?? $User_model->username }}</span>)
                @endif  --}}
            </p>
            <div class="col-sm-12 col-xl-12 xl-100">
                {{-- <div class="card-header pb-0">
                    <h5>Add New Category</h5>
                </div> --}}
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <form action="{{route('users.changePassword', $User_model->id)}}" class="forms-sample" method="post" id="alert-form">
                            @csrf
                            {{ method_field('patch') }}

                            @if(session()->has('password_changed_successfully')) 
                                <div class="alert alert-success text-center"> 
                                    <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a> 
                                    {{ session()->get('password_changed_successfully') }} 
                                </div>  
                            @elseif(session()->has('old_req_not_matching_db')) 
                                <div class="alert alert-danger text-center"> 
                                    <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a> 
                                    {{ session()->get('old_req_not_matching_db') }} 
                                </div>                    
                            @elseif(session()->has('confirm_not_matching_new')) 
                                <div class="alert alert-danger text-center"> 
                                    <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a> 
                                    {{ session()->get('confirm_not_matching_new') }} 
                                </div>                     
                            @elseif(session()->has('new_is_matching_old')) 
                                <div class="alert alert-danger text-center"> 
                                    <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a> 
                                    {{ session()->get('new_is_matching_old') }} 
                                </div> 
                            @endif
                            
                            <div class="form-group">
                                <label>Old Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" name="old_password" id="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Enter your old password here..">
                                    <i onclick="show_hide_old_password();" id="dot-eye-icon-old-password" class="input-group-text fa-solid fa-eye"></i>
                                </div>
                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>New Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="Enter your new password here..">
                                    <i onclick="show_hide_new_password();" id="dot-eye-icon-new-password" class="input-group-text fa-solid fa-eye"></i>
                                </div>
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Confirm New Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control" placeholder="Confirm your new password here..">
                                    <i onclick="show_hide_confirm_new_password();" id="dot-eye-icon-confirm-new-password" class="input-group-text fa-solid fa-eye"></i>
                                </div>
                            </div>

                            <input type="submit" value="Update" class="btn btn-primary border-info text-light me-2">
                            <a href="{{ route('users.edit', auth()->user()->id) }}" class="btn btn-secondary text-light me-2">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    #dot-eye-icon-old-password, 
    #dot-eye-icon-new-password, 
    #dot-eye-icon-confirm-new-password{
        cursor: pointer;
        font-size: 120%;
        padding-top: 10px;
        z-index: 100;
    }
</style>

<script>
    function show_hide_old_password(){
        const old_password_input = document.querySelector("#old_password");
        const dot_eye            = document.querySelector("#dot-eye-icon-old-password");

        if(old_password_input.getAttribute('type') === "password"){
            old_password_input.setAttribute('type', 'text'); //also => old_password_input.type = "text"; (but not preferred!)
            if(dot_eye.classList.contains("fa-eye")){
                dot_eye.classList.remove("fa-eye");
            }
            dot_eye.classList.add("fa-eye-slash");
            dot_eye.style.color = "grey";
        } 
        else{
            old_password_input.setAttribute('type', 'password'); //also => old_password_input.type = "password"; (but not preferred!)
            if(dot_eye.classList.contains("fa-eye-slash")){
                dot_eye.classList.remove("fa-eye-slash");
            }
            dot_eye.classList.add("fa-eye");
            dot_eye.style.color = "inherit";
        }
    }

    function show_hide_new_password(){
        const new_password_input = document.querySelector("#new_password");
        const dot_eye            = document.querySelector("#dot-eye-icon-new-password");

        if(new_password_input.getAttribute('type') === "password"){
            new_password_input.setAttribute('type', 'text'); //also => new_password_input.type = "text"; (but not preferred!)
            if(dot_eye.classList.contains("fa-eye")){
                dot_eye.classList.remove("fa-eye");
            }
            dot_eye.classList.add("fa-eye-slash");
            dot_eye.style.color = "grey";
        } 
        else{
            new_password_input.setAttribute('type', 'password'); //also => new_password_input.type = "password"; (but not preferred!)
            if(dot_eye.classList.contains("fa-eye-slash")){
                dot_eye.classList.remove("fa-eye-slash");
            }
            dot_eye.classList.add("fa-eye");
            dot_eye.style.color = "inherit";
        }
    }

    function show_hide_confirm_new_password(){
        const confirm_new_password_input = document.querySelector("#confirm_new_password");
        const dot_eye                    = document.querySelector("#dot-eye-icon-confirm-new-password");

        if(confirm_new_password_input.getAttribute('type') === "password"){
            confirm_new_password_input.setAttribute('type', 'text'); //also => confirm_new_password_input.type = "text"; (but not preferred!)
            if(dot_eye.classList.contains("fa-eye")){
                dot_eye.classList.remove("fa-eye");
            }
            dot_eye.classList.add("fa-eye-slash");
            dot_eye.style.color = "grey";
        } 
        else{
            confirm_new_password_input.setAttribute('type', 'password'); //also => confirm_new_password_input.type = "password"; (but not preferred!)
            if(dot_eye.classList.contains("fa-eye-slash")){
                dot_eye.classList.remove("fa-eye-slash");
            }
            dot_eye.classList.add("fa-eye");
            dot_eye.style.color = "inherit";
        }
    }
</script>
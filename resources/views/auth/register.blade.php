@extends('layouts.website.master')

@section('title')
    Register
@endsection

@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0 mt-0 bg-dark position-fixed w-100">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-light" aria-current="page">Register</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('/assets/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Register</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="singin-email-2">Username, Email Address or Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="singin-email-2" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password-login" name="password" required>
                                        <i onclick="show_hide_password_function_login();" id="dot-eye-icon-password-login" class="input-group-text fa-solid fa-eye"></i>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>LOG IN</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                        <label class="custom-control-label" for="signin-remember-2">Remember Me</label>
                                    </div><!-- End .custom-checkbox -->

                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="forgot-link">
                                            Forgot Your Password?
                                        </a>
                                    @endif
                                </div><!-- End .form-footer -->
                            </form>
                            <div class="form-choice">
                                <p class="text-center">or sign in with</p>
                                <div class="row d-flex justify-content-center mb-2">
                                    <img src="/assets/images/three_down_arrows_thin_blue.png" width="150">
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="#" class="btn btn-login">
                                            <i class="fa-brands fa-github"></i>
                                            Login With GitHub
                                        </a>
                                    </div><!-- End .col-4 -->
                                    <div class="col-sm-4">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-google"></i>
                                            Login With Google
                                        </a>
                                    </div><!-- End .col-4 -->
                                    <div class="col-sm-4">
                                        <a href="#" class="btn btn-login btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Login With Facebook
                                        </a>
                                    </div><!-- End .col-4 -->
                                </div><!-- End .row -->
                            </div><!-- End .form-choice -->
                        </div><!-- .End .tab-pane -->

                        <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                    
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" name="name" autocomplete="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="username">Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}" name="username" autocomplete="username" required>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-email-2">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="register-email-2" value="{{ old('email') }}" name="email" autocomplete="email" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-password-2">Password <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password-register" name="password" autocomplete="new-password" required>
                                        <i onclick="show_hide_password_function_register();" id="dot-eye-icon-password-register" class="input-group-text fa-solid fa-eye"></i>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-password-2">Confirm Password <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" autocomplete="new-password" required>
                                        <i onclick="show_hide_confirm_password_function_register();" id="dot-eye-icon-confirm-password" class="input-group-text fa-solid fa-eye"></i>
                                    </div>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label>User Type <span class="text-danger">*</span></label>
                                    <select name="user_type" class="form-control select @error('user_type') is-invalid @enderror" required>
                                        <option value="" selected>---------- Please choose a user type ----------</option>
                                        <option value="customer" {{ old('user_type') == "customer" ? 'selected' : '' }}>Customer</option>
                                        <option value="supplier" {{ old('user_type') == "supplier" ? 'selected' : '' }}>Supplier</option>
                                    </select>
                                    @error('user_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="phone">Phone (optional)</label>
                                    <input type="text" class="form-control @error('avatar') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" id="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="avatar">Avatar (optional)</label>
                                    <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" autocomplete="avatar" id="avatar">
                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SIGN UP</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="register-policy-2">
                                        <label class="custom-control-label" for="register-policy-2">I agree to the <a href="#">privacy policy</a> *</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-footer -->
                            </form>
                            <div class="form-choice">
                                <p class="text-center">or sign in with</p>
                                <div class="row d-flex justify-content-center mb-2">
                                    <img src="/assets/images/three_down_arrows_thin_blue.png" width="150">
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="#" class="btn btn-login">
                                            <i class="fa-brands fa-github"></i>
                                            Login With GitHub
                                        </a>
                                    </div><!-- End .col-4 -->
                                    <div class="col-sm-4">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-google"></i>
                                            Login With Google
                                        </a>
                                    </div><!-- End .col-4 -->
                                    <div class="col-sm-4">
                                        <a href="#" class="btn btn-login btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Login With Facebook
                                        </a>
                                    </div><!-- End .col-4 -->
                                </div><!-- End .row -->
                            </div><!-- End .form-choice -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->
@endsection


<style>
    /* START show/hide password (for Login & Register Forms) -- CSS */
    #dot-eye-icon-password-login,  /* for login form */
    #dot-eye-icon-password-register, /* for register form */
    #dot-eye-icon-confirm-password /* for register form */{
        cursor: pointer;
        font-size: 120%;
        padding-top: 10px;
        width: 8%;
        z-index: 100;
    }
    /* END show/hide password (for Login & Register Forms) -- CSS */
</style>

<script>
    /************** START show/hide password (for Login Form) -- JS **************/
    function show_hide_password_function_login(){
        const password_input = document.querySelector("#password-login");
        const dot_eye        = document.querySelector("#dot-eye-icon-password-login");

        if(password_input.getAttribute('type') === "password"){
            password_input.setAttribute('type', 'text'); //also => password_input.type = "text"; (but not preferred!)
            if(dot_eye.classList.contains("fa-eye")){
                dot_eye.classList.remove("fa-eye");
            }
            dot_eye.classList.add("fa-eye-slash");
            dot_eye.style.color = "grey";
        } 
        else{
            password_input.setAttribute('type', 'password'); //also => password_input.type = "password"; (but not preferred!)
            if(dot_eye.classList.contains("fa-eye-slash")){
                dot_eye.classList.remove("fa-eye-slash");
            }
            dot_eye.classList.add("fa-eye");
            dot_eye.style.color = "inherit";
        }
    }
    /************** END show/hide password (for Login Form) -- JS **************/


    /************** START show/hide password & confirm password (for Register Form) -- JS **************/
    function show_hide_password_function_register(){
        const password_input = document.querySelector("#password-register");
        const dot_eye        = document.querySelector("#dot-eye-icon-password-register");

        if(password_input.getAttribute('type') === "password"){
            password_input.setAttribute('type', 'text'); //also => password_input.type = "text"; (but not preferred!)
            if(dot_eye.classList.contains("fa-eye")){
                dot_eye.classList.remove("fa-eye");
            }
            dot_eye.classList.add("fa-eye-slash");
            dot_eye.style.color = "grey";
        } 
        else{
            password_input.setAttribute('type', 'password'); //also => password_input.type = "password"; (but not preferred!)
            if(dot_eye.classList.contains("fa-eye-slash")){
                dot_eye.classList.remove("fa-eye-slash");
            }
            dot_eye.classList.add("fa-eye");
            dot_eye.style.color = "inherit";
        }
    }

    function show_hide_confirm_password_function_register(){
        const confirm_password_input = document.querySelector("#password-confirm");
        const dot_eye                = document.querySelector("#dot-eye-icon-confirm-password");

        if(confirm_password_input.getAttribute('type') === "password"){
            confirm_password_input.setAttribute('type', 'text'); //also => password_input.type = "text"; (but not preferred!)
            if(dot_eye.classList.contains("fa-eye")){
                dot_eye.classList.remove("fa-eye");
            }
            dot_eye.classList.add("fa-eye-slash");
            dot_eye.style.color = "grey";
        } 
        else{
            confirm_password_input.setAttribute('type', 'password'); //also => password_input.type = "password"; (but not preferred!)
            if(dot_eye.classList.contains("fa-eye-slash")){
                dot_eye.classList.remove("fa-eye-slash");
            }
            dot_eye.classList.add("fa-eye");
            dot_eye.style.color = "inherit";
        }
    }
    /************** END show/hide password & confirm password (for Register Form) -- JS **************/
</script>
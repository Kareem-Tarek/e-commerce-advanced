{{-- @if($errors->any())
<div class="alert alert-danger">
    <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
    <h4>Whoops! Something went wrong.</h4>
    <span class="text-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </span>
</div>
@endif --}}

@if(Route::is('users.create') || (Route::is('users.edit') && $User_model->id == auth()->user()->id))
    @if(session()->has('confirm_password_not_matching'))
        <div class="alert alert-danger text-center">
            <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
            {{ session()->get('confirm_password_not_matching') }}
        </div>
    @endif

    @if(Route::is('users.edit') && $User_model->id == auth()->user()->id)
        {{-- <div class="position-relative mb-5" style="background-color: ; 
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url({{ $User_model->cover }});
        background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
            <img src="{{ $User_model->avatar }}" width="210" style="object-position: center center;" class="position-absolute mb-5 border border-dark rounded-circle" alt="">
        </div> --}}

        <div class="d-flex card position-relative" style="margin-bottom: 12%;">
            <div class="upper bg-black rounded" style="height: 300px; max-height: 300px;">
                @if($User_model->cover == null)
                    <a href="{{ 'javascript:void(0);' }}" 
                        class="position-absolute btn btn-secondary btn-sm fw-bold" style="bottom: 8px; right: 8px; z-index: 100;">
                        <i class="fa-solid fa-plus" style="font-size: 1rem;"></i> Add a cover
                    </a>
                @else
                    <a href="{{ 'javascript:void(0);' }}" 
                        class="position-absolute btn btn-secondary btn-sm fw-bold" style="bottom: 8px; right: 170px; z-index: 100;">
                        <i class="mdi mdi-pencil" style="font-size: 1rem;"></i> Edit your cover
                    </a>
                    <a href="{{ 'javascript:void(0);' }}" 
                        class="position-absolute btn btn-secondary btn-sm fw-bold" style="bottom: 8px; right: 8px; z-index: 100;">
                        <i class="mdi mdi-delete" style="font-size: 1rem;"></i> Delete your cover
                    </a>
                @endif
              <img src="{{ $User_model->cover == null ? '/assets/images/covers/no-cover.jpg' : $User_model->cover }}" alt="" class="img-fluid bg-cover  w-100 h-100 rounded">
            </div>
        
            <div class="user text-center w-25 position-absolute" style="top:80%;">
              <div class="profile">
                <a href="javscript:void(0);" class="avatar-link" onclick="">
                    <img src="{{ $User_model->avatar == null ? '/assets/images/avatars/no-avatar.jpg' : $User_model->avatar }}" alt="" class="auth-user-avatar rounded-circle bg-transparent border border-5 border-white" style="width: 50%; max-width: 50%;">
                </a>
                <div class="overlay"><a href="{{ 'javascript:void(0);' }}" class="text-decoration-none text-dark"><i class="mdi mdi-pencil" style="font-size: 1rem;"></i> Edit Avatar</a></div>
              </div>
            </div>
            <style>
                .profile{
                    position: relative;
                    display:inline-block;
                }
                .avatar-link:hover{
                    opacity: 0.7;
                }
                .overlay {
                    display: none;
                }  
                .avatar-link:hover + .overlay {
                    display: block;
                    color: black;
                    z-index: 500;
                }
            </style>

            <script>
                function load() {
                    $("#foo").tigger('click');
                }
                function burn() {
                    $(this).css("color", "red");
                }
            </script>
        </div>

        <div class="row">
            <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Avatar</label>
                <div class="col-sm-9">
                    <input type="file" id="avatar-input" name="avatar" class="form-control"/>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Cover</label>
                <div class="col-sm-9">
                <input type="file" id="cover-input" name="cover" class="form-control"/>
                </div>
            </div>
            </div>
        </div>
    @endif

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter user name here.."
        value="{{Request::old('name') ? Request::old('name') : $User_model->name}}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label>Username <span class="text-danger @error('username') is-invalid @enderror">*</span></label>
        <input type="text" name="username" class="form-control" placeholder="Enter user username here.."
        value="{{Request::old('username') ? Request::old('username') : $User_model->username}}">
        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label>Email <span class="text-danger">*</span></label>
        @if(Route::is('users.create'))
            <input class="form-control @error('email') is-invalid @enderror" value="{{Request::old('email') ? Request::old('email') : $User_model->email}}" type="text" name="email" placeholder="Enter user email here..">
        @elseif(Route::is('users.edit') && $User_model->email == auth()->user()->email)
            <input class="form-control @error('email') is-invalid @enderror" value="{{Request::old('email') ? Request::old('email') : $User_model->email}}" type="text" name="email" placeholder="Enter your email here..">
        @else(Route::is('users.edit'))
            <input disabled class="form-control @error('email') is-invalid @enderror" value="{{Request::old('email') ? Request::old('email') : $User_model->email}}" type="text" name="email" placeholder="Enter user email here..">
        @endif
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    @if(Route::is('users.create') || $User_model->id == auth()->user()->id)
        <div class="form-group">
            <label>Password <span class="text-danger">*</span></label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
            placeholder="Enter {{ Route::is('users.edit', auth()->user()->id) ? 'your' : 'user' }} password here..">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Confirm Password <span class="text-danger">*</span></label>
            <input type="password" name="confirm_password" class="form-control" 
            placeholder="Enter {{ Route::is('users.edit', auth()->user()->id) ? 'your' : 'user' }} password again here..">
        </div>
    @endif

    @if(Route::is('users.create'))
        <div class="form-group">
            <label>User Type <span class="text-danger">*</span></label>
            <select disabled id="user_type_select" name="user_type" class="form-control select @error('user_type') is-invalid @enderror" value="{{Request::old('user_type') ? Request::old('user_type') : $User_model->user_type}}">
                <option value="" selected>---------- Please select a user type ----------</option>
                <option value="customer" {{ $User_model->user_type == "customer" ? 'selected' : '' }}>Customer</option>
                <option value="supplier" {{ $User_model->user_type == "supplier" ? 'selected' : '' }}>Supplier</option>
                <option value="admin" {{ $User_model->user_type == "admin" ? 'selected' : '' }}>Admin</option>
                <option value="moderator" {{ $User_model->user_type == "moderator" ? 'selected' : '' }}>Moderator</option>
            </select>
            <div class="mt-1">
                <input type="checkbox" id="UserTypeCheckbox" onclick="EnabledUserType(this)">
                &nbsp;Check to toggle (enable/disable) the "User Type <span class="text-danger">*</span>" field.
            </div>
            @error('user_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    @elseif(Route::is('users.edit') && $User_model->id == auth()->user()->id && auth()->user()->user_type == "admin")
        <div class="form-group d-none">
            <label>User Type <span class="text-danger">*</span></label>
            <select id="user_type_select" name="user_type" class="form-control select @error('user_type') is-invalid @enderror" value="{{Request::old('user_type') ? Request::old('user_type') : $User_model->user_type}}">
                <option value="" selected>---------- Please select a user type ----------</option>
                <option value="customer" {{ $User_model->user_type == "customer" ? 'selected' : '' }}>Customer</option>
                <option value="supplier" {{ $User_model->user_type == "supplier" ? 'selected' : '' }}>Supplier</option>
                <option value="admin" {{ $User_model->user_type == "admin" ? 'selected' : '' }}>Admin</option>
                <option value="moderator" {{ $User_model->user_type == "moderator" ? 'selected' : '' }}>Moderator</option>
            </select>
            <div class="mt-1">
                <input type="checkbox" id="UserTypeCheckbox" onclick="EnabledUserType(this)">
                &nbsp;Check to toggle (enable/disable) the "User Type <span class="text-danger">*</span>" field.
            </div>
            @error('user_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    @elseif(Route::is('users.edit') && $User_model->id == auth()->user()->id  && (auth()->user()->user_type == "moderator" || auth()->user()->user_type == "supplier"))
        <div class="form-group">
            <label>User Type <span class="text-danger">*</span></label>
            <input disabled type="text" class="form-control" value="{{ ucfirst($User_model->user_type) }}">
        </div>
    @endif

    <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter user phone number here.."
        value="{{Request::old('phone') ? Request::old('phone') : $User_model->phone}}">
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label>Date Of Birth</label>
        <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{Request::old('dob') ? Request::old('dob') : $User_model->dob}}">
        @error('dob')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label>Gender</label>
        <div class="d-flex col-md-6 justify-content-between p-2 rounded" style="background-color: rgb(235, 235, 235);">
            <div class="radio radio-success">
                <input type="radio" class="@error('gender') is-invalid @enderror" name="gender" value="male" {{ $User_model->gender == "male" ? 'checked'  : '' }}>
                <label class="mb-0">Male</label>
            </div>
            <div class="radio radio-primary">
                <input type="radio" class="@error('gender') is-invalid @enderror" name="gender" value="female" {{ $User_model->gender == "female" ? 'checked'  : '' }}>
                <label class="mb-0">Female</label>
            </div>
        </div>
        @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    @if(Route::is('users.create'))
        <div class="form-group">
            <label>Status <span class="text-danger">*</span></label>
            <select disabled name="status" id="user_status_select" class="form-control select @error('status') is-invalid @enderror" value="{{Request::old('status') ? Request::old('status') : $User_model->status}}">
                <option value="active" {{ $User_model->status == "active" ? 'selected' : '' }} selected>Active</option>
                <option value="inactive" {{ $User_model->status == "inactive" ? 'selected' : '' }}>Inactive</option>
                <option value="blocked" {{ $User_model->status == "blocked" ? 'selected' : '' }}>Blocked</option>
            </select>
            <div class="mt-1">
                <input type="checkbox" id="UserStatusCheckbox" onclick="EnabledStatus(this)">
                &nbsp;Check to toggle (enable/disable) the "Status <span class="text-danger">*</span>" field.
            </div>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    @elseif(Route::is('users.edit') && $User_model->id == auth()->user()->id && auth()->user()->user_type == "admin")
        <div class="form-group d-none">
            <label>Status <span class="text-danger">*</span></label>
            <select name="status" id="user_status_select" class="form-control select @error('status') is-invalid @enderror" value="{{Request::old('status') ? Request::old('status') : $User_model->status}}">
                <option value="active" {{ $User_model->status == "active" ? 'selected' : '' }} selected>Active</option>
                <option value="inactive" {{ $User_model->status == "inactive" ? 'selected' : '' }}>Inactive</option>
                <option value="blocked" {{ $User_model->status == "blocked" ? 'selected' : '' }}>Blocked</option>
            </select>
            <div class="mt-1">
                <input type="checkbox" id="UserStatusCheckbox" onclick="EnabledStatus(this)">
                &nbsp;Check to toggle (enable/disable) the "Status <span class="text-danger">*</span>" field.
            </div>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    @elseif(Route::is('users.edit') && $User_model->id == auth()->user()->id  && (auth()->user()->user_type == "moderator" || auth()->user()->user_type == "supplier"))
        <div class="form-group">
            <label>Status <span class="text-danger">*</span></label>
            <input disabled type="text" class="form-control" value="{{ ucfirst($User_model->status) }}">
        </div>
    @endif
@else(Route::is('users.edit'))  <!-- users edit route in genral without any other condition which is available only 
                                    for the admins because he/she could updates on any other user type - except an 
                                    admin like him/her and this was handled in the "DashboardUsercontroller" in 
                                    the (edit) function -->
    <div class="d-flex card position-relative" style="margin-bottom: 12%;">
        <div class="upper bg-black rounded" style="height: 300px; max-height: 300px;">
            <img src="{{ $User_model->cover == null ? '/assets/images/covers/no-cover.jpg' : $User_model->cover }}" alt="" class="img-fluid bg-cover  w-100 h-100 rounded">
        </div>
        <div class="user text-center w-25 position-absolute" style="top: 80%;">
            <div class="profile">
            <img src="{{ $User_model->avatar == null ? '/assets/images/avatars/no-avatar.jpg' : $User_model->avatar }}" alt="" class="rounded-circle bg-transparent border border-5 border-white" style="width: 50%; max-width: 50%;">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>User Type <span class="text-danger">*</span></label>
        <select disabled name="user_type" id="user_type_select" class="form-control select @error('user_type') is-invalid @enderror" value="{{Request::old('user_type') ? Request::old('user_type') : $User_model->user_type}}">
            <option value="" selected>---------- Please select a user type ----------</option>
            <option value="customer" {{ $User_model->user_type == "customer" ? 'selected' : '' }}>Customer</option>
            <option value="supplier" {{ $User_model->user_type == "supplier" ? 'selected' : '' }}>Supplier</option>
            <option value="admin" {{ $User_model->user_type == "admin" ? 'selected' : '' }}>Admin</option>
            <option value="moderator" {{ $User_model->user_type == "moderator" ? 'selected' : '' }}>Moderator</option>
        </select>
        <div class="mt-1">
            <input type="checkbox" id="UserTypeCheckbox" onclick="EnabledUserType(this)">
            &nbsp;Check to toggle (enable/disable) the "User Type <span class="text-danger">*</span>" field.
        </div>
        @error('user_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label>Status <span class="text-danger">*</span></label>
        <select disabled name="status" id="user_status_select" class="form-control select @error('status') is-invalid @enderror" value="{{Request::old('status') ? Request::old('status') : $User_model->status}}">
            <option value="active" {{ $User_model->status == "active" ? 'selected' : '' }} selected>Active</option>
            <option value="inactive" {{ $User_model->status == "inactive" ? 'selected' : '' }}>Inactive</option>
            <option value="blocked" {{ $User_model->status == "blocked" ? 'selected' : '' }}>Blocked</option>
        </select>
        <div class="mt-1">
            <input type="checkbox" id="UserStatusCheckbox" onclick="EnabledStatus(this)">
            &nbsp;Check to toggle (enable/disable) the "Status <span class="text-danger">*</span>" field.
        </div>
        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
@endif

<script>
    function EnabledUserType(UserTypeCheckbox){
        var UserTypeSelect = document.querySelector('#user_type_select');
        UserTypeSelect.disabled = UserTypeCheckbox.checked ? false : true;
        if(!UserTypeSelect.disabled){
            UserTypeSelect.focus();
        }
    }

    function EnabledStatus(UserStatusCheckbox){
        var UserStatusSelect = document.querySelector('#user_status_select');
        UserStatusSelect.disabled = UserStatusCheckbox.checked ? false : true;
        if(!UserStatusSelect.disabled){
            UserStatusSelect.focus();
        }
    }     
</script>
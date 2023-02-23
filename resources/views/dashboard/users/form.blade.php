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

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"" placeholder="Enter user name here.."
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

    @if(Route::is('users.create'))
        <div class="form-group">
            <label>Password <span class="text-danger">*</span></label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter user password here..">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Confirm Password <span class="text-danger">*</span></label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Enter user password again here..">
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
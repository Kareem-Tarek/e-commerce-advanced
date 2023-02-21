@if($errors->any())
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
@endif

@if(Route::is('users.create') || (Route::is('users.edit') && $User_model->id == auth()->user()->id))
    @if(session()->has('confirm_password_not_matching'))
        <div class="alert alert-danger text-center">
            <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
            {{ session()->get('confirm_password_not_matching') }}
        </div>
    @endif

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter user name here.."
        value="{{Request::old('name') ? Request::old('name') : $User_model->name}}">
    </div>

    <div class="form-group">
        <label>Username <span class="text-danger">*</span></label>
        <input type="text" name="username" class="form-control" placeholder="Enter user username here.."
        value="{{Request::old('username') ? Request::old('username') : $User_model->username}}">
    </div>

    <div class="form-group">
        <label>Email <span class="text-danger">*</span></label>
        @if(Route::is('users.create'))
            <input class="form-control" value="{{Request::old('email') ? Request::old('email') : $User_model->email}}" type="text" name="email" placeholder="Enter user email here..">
        @elseif(Route::is('users.edit') && $User_model->email == auth()->user()->email)
            <input class="form-control" value="{{Request::old('email') ? Request::old('email') : $User_model->email}}" type="text" name="email" placeholder="Enter your email here..">
        @else(Route::is('users.edit'))
            <input disabled class="form-control" value="{{Request::old('email') ? Request::old('email') : $User_model->email}}" type="text" name="email" placeholder="Enter user email here..">
        @endif
    </div>

    @if(Route::is('users.create'))
        <div class="form-group">
            <label>Password <span class="text-danger">*</span></label>
            <input type="password" name="password" class="form-control" placeholder="Enter user password here..">
        </div>

        <div class="form-group">
            <label>Confirm Password <span class="text-danger">*</span></label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Enter user password again here..">
        </div>
    @endif

    <div class="form-group">
        <label>User Type <span class="text-danger">*</span></label>
        <select name="user_type" class="form-control select" value="{{Request::old('user_type') ? Request::old('user_type') : $User_model->user_type}}">
            <option value="" selected>---------- Please select a user type ----------</option>
            <option value="customer" {{ $User_model->user_type == "customer" ? 'selected' : '' }}>Customer</option>
            <option value="supplier" {{ $User_model->user_type == "supplier" ? 'selected' : '' }}>Supplier</option>
            <option value="admin" {{ $User_model->user_type == "admin" ? 'selected' : '' }}>Admin</option>
            <option value="moderator" {{ $User_model->user_type == "moderator" ? 'selected' : '' }}>Moderator</option>
        </select>
    </div>

    <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" placeholder="Enter user phone number here.."
        value="{{Request::old('phone') ? Request::old('phone') : $User_model->phone}}">
    </div>

    <div class="form-group">
        <label>Gender</label>
        <div class="d-flex col-md-6 justify-content-between p-2 rounded" style="background-color: rgb(235, 235, 235);">
            <div class="radio radio-success">
                <input type="radio" name="gender" value="male" {{ $User_model->gender == "male" ? 'checked'  : '' }}>
                <label class="mb-0">Male</label>
            </div>
            <div class="radio radio-primary">
                <input type="radio" name="gender" value="female" {{ $User_model->gender == "female" ? 'checked'  : '' }}>
                <label class="mb-0">Female</label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Status <span class="text-danger">*</span></label>
        <select name="status" class="form-control select" value="{{Request::old('status') ? Request::old('status') : $User_model->status}}">
            <option value="active" {{ $User_model->status == "active" ? 'selected' : '' }} selected>Active</option>
            <option value="inactive" {{ $User_model->status == "inactive" ? 'selected' : '' }}>Inactive</option>
            <option value="blocked" {{ $User_model->status == "blocked" ? 'selected' : '' }}>Blocked</option>
        </select>
    </div>
@else
    <div class="form-group">
        <label>User Type <span class="text-danger">*</span></label>
        <select name="user_type" class="form-control select" value="{{Request::old('user_type') ? Request::old('user_type') : $User_model->user_type}}">
            <option value="" selected>---------- Please select a user type ----------</option>
            <option value="customer" {{ $User_model->user_type == "customer" ? 'selected' : '' }}>Customer</option>
            <option value="supplier" {{ $User_model->user_type == "supplier" ? 'selected' : '' }}>Supplier</option>
            <option value="admin" {{ $User_model->user_type == "admin" ? 'selected' : '' }}>Admin</option>
            <option value="moderator" {{ $User_model->user_type == "moderator" ? 'selected' : '' }}>Moderator</option>
        </select>
    </div>

    <div class="form-group">
        <label>Status <span class="text-danger">*</span></label>
        <select name="status" class="form-control select" value="{{Request::old('status') ? Request::old('status') : $User_model->status}}">
            <option value="active" {{ $User_model->status == "active" ? 'selected' : '' }} selected>Active</option>
            <option value="inactive" {{ $User_model->status == "inactive" ? 'selected' : '' }}>Inactive</option>
            <option value="blocked" {{ $User_model->status == "blocked" ? 'selected' : '' }}>Blocked</option>
        </select>
    </div>
@endif
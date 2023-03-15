@if(session()->has('updated_profile_message'))
    <div class="alert alert-success text-center">
        <a href="javascript:void(0);" class="close-btn text-decoration-none text-white" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
        {{ session()->get('updated_profile_message') }} 
    </div>
@elseif(session()->has('user_type_unauthorized_action_message'))
    <div class="alert alert-danger text-center">
        <a href="javascript:void(0);" class="close-btn text-decoration-none text-white" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
        <span class="font-weight-bold">Unauthorized action!</span>
        {{ session()->get('user_type_unauthorized_action_message') }} 
    </div>
@endif

<div class="form-row">
    <div class="form-group col-md-6">
      <label>Name</label>
      <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ Request::Old('name') ? Request::Old('name') : $User_model->name }}" placeholder="Enter your name here...">
      @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label>Username <span class="text-danger">*</span></label>
      <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ Request::Old('username') ? Request::Old('username') : $User_model->username }}" placeholder="Enter your username here...">
      @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror 
    </div>
  </div>

  <div class="form-row">
      <div class="form-group col-md-6">
        <label>Email <span class="text-danger">*</span></label>
        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ Request::Old('email') ? Request::Old('email') : $User_model->email }}" placeholder="Enter your email here...">
        @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label >Phone Number</label>
        <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ Request::Old('phone') ? Request::Old('phone') : $User_model->phone }}" placeholder="Enter your phone number here...">
        @error('phone')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
  </div>

  <div class="form-row">
      <div class="form-group col-md-6">
        <label>Date Of Birth</label>
        <input name="dob" type="date" class="form-control @error('dob') is-invalid @enderror" value="{{ Request::Old('dob') ? Request::Old('dob') : $User_model->dob }}">
        @error('dob')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label >User Type <span class="text-danger">*</span></label>
        <input name="user_type" type="text" class="form-control" value="{{ Request::Old('user_type') ? Request::Old('user_type') : $User_model->user_type }}">
      </div>
  </div>

  {{-- <div class="form-row">
      <div class="form-group col-md-6">
        <label>Avatar</label>
        <input name="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" value="{{ Request::Old('avatar') ? Request::Old('avatar') : $User_model->avatar }}">
        @error('avatar')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label >Cover</label>
        <input name="cover" type="file" class="form-control @error('cover') is-invalid @enderror" value="{{ Request::Old('cover') ? Request::Old('cover') : $User_model->cover }}">
        @error('cover')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
  </div> --}}

  <div class="form-row">
      <div class="form-group col-md-6">
        <label>Bio</label>
        <input name="bio" type="text" class="form-control @error('bio') is-invalid @enderror" value="{{ Request::Old('bio') ? Request::Old('bio') : $User_model->bio }}" placeholder="Enter your bio here...">
        @error('bio')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group col-md-6">
          <label>Gender</label>
          <div class="d-flex col-md-4 justify-content-between">
              <div class="radio radio-success">
                  <input class="@error('bio') is-invalid @enderror" type="radio" name="gender" {{ $User_model->gender == 'male' ? 'checked'  : '' }}  value="male">
                  <label class="mb-0" for="radioinline1">Male</label>
              </div>
              <div class="radio radio-primary">
                  <input class="@error('bio') is-invalid @enderror" type="radio" name="gender" {{ $User_model->gender == 'female' ? 'checked'  : '' }} value="female">
                  <label class="mb-0" for="radioinline2">Female</label>
              </div>
          </div>
          @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>
  </div>

  <div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control @error('bio') is-invalid @enderror" value="{{ Request::Old('address') ? Request::Old('address') : $User_model->address }}" placeholder="Enter your address here...">
    @error('gender')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>

  <div class="form-group">
      <label>WhatsApp (whatsapp phone number)</label>
      <div class="input-group">
          <span class="input-group-text"><i class="fa-brands fa-whatsapp" style="font-size: 180%"></i></span>
          <input type="text" name="whatsapp" class="form-control @error('whatsapp') is-invalid @enderror" value="{{ Request::Old('whatsapp') ? Request::Old('whatsapp') : $User_model->whatsapp }}" placeholder="Enter your whatsapp number here...">
      </div>
      @error('whatsapp')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>

  <div class="form-group">
      <label>Facebook (profile link URL)</label>
      <div class="input-group">
          <span class="input-group-text"><i class="fa-brands fa-facebook" style="font-size: 180%"></i></span>
          <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ Request::Old('facebook') ? Request::Old('facebook') : $User_model->facebook }}" placeholder="Enter your facebook account/URL link here...">
      </div>
      @error('whatsapp')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>

  <div class="form-group">
      <label>Instagram (Username or profile link URL)</label>
      <div class="input-group">
          <span class="input-group-text"><i class="fa-brands fa-instagram" style="font-size: 180%"></i></span>
          <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" value="{{ Request::Old('instagram') ? Request::Old('instagram') : $User_model->instagram }}" placeholder="Enter your instagram account/URL link here...">
      </div>
      @error('instagram')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>

  {{-- <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div> --}}
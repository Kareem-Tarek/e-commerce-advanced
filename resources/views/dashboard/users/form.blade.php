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

<div class="form-group">
    <label for="exampleInputName1">Name</label>
    <input type="text" name="name" class="form-control mb-2" id="exampleInputName1" placeholder="Enter your name here.."
    value="{{Request::old('name') ? Request::old('name') : $User_model->name}}">
</div>

<div class="form-group">
    <label for="exampleInputEmail3">Username <span class="text-danger">*</span></label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail3" placeholder="Enter your username here.."
    value="{{Request::old('username') ? Request::old('username') : $User_model->username}}">
</div>
        
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

<div class="form-group">
    <label for="exampleInputName1">Name <span class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control border-1 border-dark mb-2 @error('name') is-invalid @enderror" id="exampleInputName1" placeholder="Enter category name here.."
    value="{{Request::old('name') ? Request::old('name') : $Category_model->name}}">
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="exampleInputEmail3">Description</label>
    <input type="text" name="description" class="form-control border-1 border-dark @error('description') is-invalid @enderror" id="exampleInputEmail3" placeholder="Enter category description name here.."
    value="{{Request::old('description') ? Request::old('description') : $Category_model->description}}">
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
        
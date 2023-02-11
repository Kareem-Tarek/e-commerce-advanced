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

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="exampleInputName1">Name <span class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control mb-2" id="exampleInputName1" placeholder="Enter category name here.."
    value="{{Request::old('name') ? Request::old('name') : $SubCategory_model->name}}">
    {{-- {!! $errors->first('name', '<p class="help-block alert alert-danger px-0 py-1 text-center text-danger rounded">:message</p>') !!} --}}
    {{-- @foreach ($errors->get('name') as $error_name)
        <p class="help-block alert alert-danger p-1 text-center text-danger rounded">
            {{ $error_name }}
        </p>
    @endforeach --}}
</div>

<div class="form-group">
    <label for="exampleInputEmail3">Description</label>
    <input type="text" name="description" class="form-control" id="exampleInputEmail3" placeholder="Enter category description name here.."
    value="{{Request::old('description') ? Request::old('description') : $SubCategory_model->description}}">
</div>

<div class="form-group {{ $errors->has('cat_id') ? 'has-error' : ''}}">
    <label for="exampleInputEmail3">Category <span class="text-danger">*</span></label>
    <select name="cat_id" class="form-control select mb-2" value="{{Request::old('cat_id') ? Request::old('cat_id') : $SubCategory_model->cat_id}}">
        <option value="" selected> ---------- Select a category ---------- </option>  
        @forelse($category as $cat)
            <option value="{{ $cat->id }}" {{ $cat->id == $SubCategory_model->cat_id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
            @empty
        @endforelse
    </select>
    {{-- {!! $errors->first('cat_id', '<p class="help-block alert alert-danger px-0 py-1 text-center text-danger rounded">:message</p>') !!} --}}
    {{-- @foreach ($errors->get('cat_id') as $error_cat_id)
        <p class="help-block alert alert-danger p-1 text-center text-danger rounded">
            {{ $error_cat_id }}
        </p>
    @endforeach --}}
</div>
        
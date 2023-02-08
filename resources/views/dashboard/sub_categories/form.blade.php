<div class="form-group">
    <label for="exampleInputName1">Name <span class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control mb-2" id="exampleInputName1" placeholder="Enter category name here.."
    value="{{Request::old('name') ? Request::old('name') : $SubCategory_model->name}}">
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <span class="alert alert-danger p-1 text-danger rounded">
                {{ $error }}
            </span>
        @endforeach
    @endif
</div>

<div class="form-group">
    <label for="exampleInputEmail3">Description</label>
    <input type="text" name="description" class="form-control" id="exampleInputEmail3" placeholder="Enter category description name here.."
    value="{{Request::old('description') ? Request::old('description') : $SubCategory_model->description}}">
    {{-- @if($errors->any())
        @foreach ($errors->all() as $error)
            <span class="alert alert-danger p-1 text-danger rounded">
                {{ $error }}
            </span>
        @endforeach
    @endif --}}
</div>

<div class="form-group">
    <label for="exampleInputEmail3">Category <span class="text-danger">*</span></label>
    <select name="cat_id" class="form-control select" value="{{Request::old('cat_id') ? Request::old('cat_id') : $SubCategory_model->cat_id}}" required>
        <option value="" selected> ---------- Select a category ---------- </option>        
        @forelse($category as $cat)
            <option value="{{ $cat->id }}" {{ $cat->id == $SubCategory_model->cat_id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
            @empty
        @endforelse
    </select>
    {{-- @if($errors->any())
        @foreach ($errors->all() as $error)
            <span class="alert alert-danger p-1 text-danger rounded">
                {{ $error }}
            </span>
        @endforeach
    @endif --}}
</div>
        
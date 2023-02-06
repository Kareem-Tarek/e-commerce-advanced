<div class="tab-pane mt-4" role="tabpanel">

    <div class="form-group row">
        <label class="form-label col-lg-3">Name <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input class="form-control @error('name') is-invalid @enderror" value="{{Request::old('name') ? Request::old('name') : $model->name}}" type="text" name="name" placeholder="Enter product name" required autocomplete="off">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Description</label>
        <div class="col-lg-9">
            <input class="form-control @error('description') is-invalid @enderror" value="{{Request::old('description') ? Request::old('description') : $model->description}}" type="text" name="description" placeholder="Enter product description" autocomplete="off">
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Brand Name (Supplier) <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            @if(auth()->user()->user_type == "supplier")
                {{-- <input class="form-control @error('brand_name') is-invalid @enderror" value="{{Request::old('brand_name') ? Request::old('brand_name') : $model->user->name ?? auth()->user()->id}}" type="text" name="brand_name" required disabled autocomplete="off"> --}}
                @inject('user','App\Models\User')
                {!! Form::select('brand_name',$user->type('supplier')->pluck('name','id'),Request::old('brand_name') ? Request::old('brand_name') : $model->brand_name,[
                    'placeholder' => '---------- Please select a brand name/supplier ----------',
                    'class'       => 'form-control select'. ( $errors->has('brand_name') ? ' is-invalid' : '' ),
                    'required',
                    'disabled',
                    ( $model->brand_name == auth()->user()->id ? 'selected'  : '' )
                ]) !!} 
            @else
                @inject('user','App\Models\User')
                {!! Form::select('brand_name',$user->type('supplier')->pluck('name','id'),Request::old('brand_name') ? Request::old('brand_name') : $model->brand_name,[
                    'placeholder' => '---------- Please select a brand name/supplier ----------',
                    'class'       => 'form-control select'. ( $errors->has('brand_name') ? ' is-invalid' : '' ),
                    'required'
                ]) !!} 
            @endif
            @error('brand_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Image <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input class="form-control @error('image') is-invalid @enderror" value="{{ old('image',$model->image) }}" type="file" name="image" required autocomplete="off">
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Discount (%)</label>
        <div class="col-lg-9">
            <select class="form-control select @error('discount') is-invalid @enderror" value="{{Request::old('discount') ? Request::old('discount') : $model->discount}}" name="discount" id="discount">
                <option name="" value="" disabled selected>---------- Please select a discount ----------</option>
                <?php
                    for($d = 0.00 ; $d < 1 ; $d = $d + 0.01){ //for(start ; end ; increment/decrement)
                ?>
                        <option value="{{ $d }}" {{ isset($model) && $model->discount == $d ? 'selected'  : '' }}>{{ $d * 100 }}%</option>
                <?php
                    }
                ?>
            </select>
            @error('discount')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Price (EGP) <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input class="form-control @error('price') is-invalid @enderror"
             value="{{Request::old('price') ? Request::old('price') : $model->price}}" 
             type="text" name="price" placeholder="Enter product price" 
             onkeyup="$('#gain_value').val($(this).val() - ( $(this).val() * $('#discount').val() ) );" 
             required autocomplete="off">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Sale Price/Final Price (EGP) </label>
        <div class="col-lg-9">
            <input class="form-control" value="{{ $model->price - ($model->price * $model->discount) ?? $model->price}}" 
            name="" id="gain_value" placeholder="Price After Discount/Final Price" 
            style="background-color: rgb(197, 225, 197); color: black; border: 1px solid green; font-weight: bold;" 
            disabled>
        </div>
    </div>

    {{-- <div class="form-group row">
        <label class="form-label col-lg-3">Size <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <select name="size" class="form-control select @error('size') is-invalid @enderror" value="{{Request::old('size') ? Request::old('size') : $model->size}}">
                <option> ---------- Please select a size ---------- </option>
                <option value="XS" {{ isset($model) && $model->size == 'XS' ? 'selected'  : '' }}>XS</option>
                <option value="S" {{ isset($model) && $model->size == 'S' ? 'selected'  : '' }}>S</option>
                <option value="M" {{ isset($model) && $model->size == 'M' ? 'selected'  : '' }}>M</option>
                <option value="L" {{ isset($model) && $model->size == 'L' ? 'selected'  : '' }}>L</option>
                <option value="XXL" {{ isset($model) && $model->size == 'XXL' ? 'selected'  : '' }}>XXL</option>
                <option value="XXXL" {{ isset($model) && $model->size == 'XXXL' ? 'selected'  : '' }}>XXXL</option>
                <option value="XXXXL" {{ isset($model) && $model->size == 'XXXXL' ? 'selected'  : '' }}>XXXXL</option>
            </select>
            @error('size')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div> --}}

    <div class="form-group row">
        <label class="form-label col-lg-3">Clothing Type <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {{-- @inject('clothing_type','App\Models\Category')
            {!! Form::select('id',$clothing_type->pluck('name','id'),[
                'placeholder' => 'Please select a clothing type',
                'class'       => 'form-control select'. ( $errors->has('clothing_type') ? ' is-invalid' : '' ),
            ]) !!} --}}
            <select name="clothing_type" class="form-control select @error('clothing_type') is-invalid @enderror" value="{{Request::old('clothing_type') ? Request::old('clothing_type') : $model->clothing_type}}" required>
                <option value="" disabled selected> ---------- Please select a clothing type ---------- </option>
                <option value="1" {{ isset($model) && $model->clothing_type == 1 ? 'selected'  : '' }}>Formal</option>
                <option value="2" {{ isset($model) && $model->clothing_type == 2 ? 'selected'  : '' }}>Casual</option>
                <option value="3" {{ isset($model) && $model->clothing_type == 3 ? 'selected'  : '' }}>Sports Wear</option>
            </select>
            @error('clothing_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Accessory? <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <select name="is_accessory" class="form-control select @error('is_accessory') is-invalid @enderror" value="{{Request::old('is_accessory') ? Request::old('is_accessory') : $model->is_accessory}}" required>
                <option value="" disabled selected> ---------- Is it an accessory? ---------- </option>
                <option value="yes" {{ isset($model) && $model->is_accessory == 'yes' ? 'selected'  : '' }}>Yes</option>
                <option value="no" {{ isset($model) && $model->is_accessory == 'no' ? 'selected'  : '' }}>No</option>
            </select>
            @error('is_accessory')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Product Category <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <select name="product_category" class="form-control select @error('product_category') is-invalid @enderror" value="{{Request::old('product_category') ? Request::old('product_category') : $model->product_category}}" required>
                <option value="" disabled selected> ---------- Please select a category ---------- </option>
                <option value="men" {{ isset($model) && $model->product_category == 'men' ? 'selected'  : '' }}>Men</option>
                <option value="women" {{ isset($model) && $model->product_category == 'women' ? 'selected'  : '' }}>Women</option>
                <option value="kids" {{ isset($model) && $model->product_category == 'kids' ? 'selected'  : '' }}>Kids</option>
            </select>
            @error('product_category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Available Quantity <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input class="form-control @error('available_quantity') is-invalid @enderror" value="{{Request::old('available_quantity') ? Request::old('available_quantity') : $model->available_quantity}}" type="number" name="available_quantity" placeholder="Enter the available quantity"  required autocomplete="off">
            @error('available_quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

</div>


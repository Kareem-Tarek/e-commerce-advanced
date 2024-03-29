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

@if(session()->has('auth_user_supplier_not_matching_id'))
    <div class="alert alert-danger text-center">
    <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
    {{ session()->get('auth_user_supplier_not_matching_id') }} 
    </div>
@endif

<div class="form-group">
    <label>Name <span class="text-danger">*</span></label>
    <input name="name" type="text" class="form-control border-1 border-dark @error('name') is-invalid @enderror" value="{{Request::old('name') ? Request::old('name') : $ProductDetail_model->name}}" placeholder="Enter name here..">
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="exampleInputEmail3">Description</label>
    <input name="description" type="text" class="form-control border-1 border-dark @error('description') is-invalid @enderror" value="{{Request::old('description') ? Request::old('description') : $ProductDetail_model->description}}" placeholder="Enter description here..">
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label>Discount (%)</label>
    <select name="discount" class="form-control select discount border-1 border-dark @error('discount') is-invalid @enderror" id="discount">
        <option value="" disabled>---------- Please select a discount ----------</option>
        @for($d = 0.00; $d < 1; $d = $d + 0.01)    <!-- for(start; end; increment/decrement) -->
            <option value="{{ $d }}" {{ $ProductDetail_model->discount == $d ? 'selected' : '' }}>
                @if($d == 0.00)
                    {{ $d * 100 }}% (No Discount) <!-- = 0% -->
                @else
                    {{ $d * 100 }}%  <!-- > 0% -->
                @endif
            </option>
        @endfor
    </select>
    {{-- <input name="discount" id="discount" type="text" class="form-control" value="{{Request::old('discount') ? Request::old('discount') : $ProductDetail_model->discount }}" placeholder="Enter discount here.."> --}}
    @error('discount')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label>Price (EGP) <span class="text-danger">*</span></label>
    <input class="form-control border-1 border-dark  @error('price') is-invalid @enderror"
            value="{{Request::old('price') ? Request::old('price') : $ProductDetail_model->price}}" 
            type="number" name="price" placeholder="Enter price here.." 
            onkeyup="$('#gain_value').val($(this).val() - ( $(this).val() * $('#discount').val() ) ); 
                     $('.gain_value').val($(this).val() - ( $(this).val() * $('.discount').val() ) );" autocomplete="off">
        {{-- <input class="form-control"
            value="{{Request::old('price') ? Request::old('price') : $ProductDetail_model->price}}" 
            type="text" name="price" placeholder="Enter price here.." 
            onkeyup="$('#gain_value').val($(this).val() - ( $(this).val() * $('#discount').val() / 100) );
                     $('.gain_value').val($(this).val() - ( $(this).val() * $('.discount').val() / 100 ) );" autocomplete="off"> --}}
    @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label>Sale Price/Final Price (EGP) &RightArrow; <span class="text-decoration-underline">Auto Generated</span></label>
    <input class="form-control text-dark" 
    value="{{ $ProductDetail_model->price - ($ProductDetail_model->price * $ProductDetail_model->discount) ?? $ProductDetail_model->price}}"
    name="sale_price_final_price" id="gain_value" placeholder="Price After Discount/Final Price" 
    class="gain_value"
    style="background-color: rgb(228, 231, 244); color: black; border: 1px solid rgb(11, 19, 170); font-weight: bold;" 
    disabled>
</div>

<div class="form-group">
    <label>(Sub-category) <span class="text-danger">*</span> &RightArrow; [Category]</label>
    <select name="sub_cat_id" class="form-control select border-1 border-dark mb-2 @error('sub_cat_id') is-invalid @enderror" value="{{Request::old('sub_cat_id') ? Request::old('sub_cat_id') : $ProductDetail_model->sub_cat_id}}">
        <option value="" selected> ---------- Select a Sub-category ---------- </option>  
        @forelse($sub_category as $sub_cat)
            <option value="{{ $sub_cat->id }}" {{ $sub_cat->id == $ProductDetail_model->sub_cat_id ? 'selected' : '' }}>
                ({{ ucfirst($sub_cat->name) }}) &RightArrow; [{{ ucfirst($sub_cat->Category->name) }}]
            </option>
            @empty
        @endforelse
    </select>
    @error('sub_cat_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label>Brand Name <span class="text-danger">*</span></label>
    <input name="brand_name" type="text" class="form-control border-1 border-dark @error('brand_name') is-invalid @enderror" value="{{Request::old('brand_name') ? Request::old('brand_name') : $ProductDetail_model->brand_name}}" placeholder="Enter brand name here..">
    @error('brand_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label>Supplier <span class="text-danger">*</span></label>
    @inject('user', 'App\Models\User')
    @if(auth()->user()->user_type == "supplier")
        {!! Form::select('supplier_id', $user->where('id', auth()->user()->id)->pluck('name', 'id'), Request::old('supplier_id') ? Request::old('supplier_id') : $ProductDetail_model->supplier_id,[
            'class' => 'form-control select border-1 border-dark'.( $errors->has('supplier_id') ? ' is-invalid' : '' ),
            // ( $ProductDetail_model->supplier_id == auth()->user()->id ? 'selected'  : '' ),
            // 'required',
            // 'disabled',
        ]) !!} 
    @else
        {!! Form::select('supplier_id', $user->type('supplier')->pluck('name','id'), Request::old('supplier_id') ? Request::old('supplier_id') : $ProductDetail_model->supplier_id,[
            'placeholder' => '---------- Please select a supplier ----------',
            'class'       => 'form-control select border-1 border-dark'.( $errors->has('supplier_id') ? ' is-invalid' : '' ),
            // ( $ProductDetail_model->supplier_id == $user->id ? 'selected'  : '' ),
            // 'required',
        ]) !!} 
    @endif
    @error('supplier_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
        
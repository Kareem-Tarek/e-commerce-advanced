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
    <label>Product <span class="text-danger">*</span></label>
    <select name="product_id" class="form-control select mb-2" value="{{Request::old('product_id') ? Request::old('product_id') : $FinalProduct_model->product_id}}">
        <option value="" selected> ---------- Please select a product ---------- </option>  
        @forelse($product_details as $product_detail)
            <option value="{{ $product_detail->id }}" {{ $product_detail->id == $FinalProduct_model->product_id ? 'selected' : '' }}>
                {{ ucfirst($product_detail->name) }}
            </option>
            @empty
        @endforelse
    </select>
</div>

{{-- <div class="form-group @if(Route::is('products.create')) d-none @endif">
    <label>Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control" value="{{ $FinalProduct_model->productDetail->name ?? ''}}" disabled>
</div> --}}

<div class="form-group">
    <label>Image <span class="text-danger">*</span></label>
    <input name="image" type="file" class="form-control">
</div>

<div class="form-group">
    <label>Size <span class="text-danger">*</span></label>
    <select name="size" class="form-control select" value="{{Request::old('size') ? Request::old('size') : $FinalProduct_model->size}}">
        <option value="" selected>---------- Please select a size ----------</option>
        <option value="XS" {{ $FinalProduct_model->size == "XS" ? 'selected' : '' }}>XS</option>
        <option value="S" {{ $FinalProduct_model->size == "S" ? 'selected' : '' }}>S</option>
        <option value="M" {{ $FinalProduct_model->size == "M" ? 'selected' : '' }}>M</option>
        <option value="L" {{ $FinalProduct_model->size == "L" ? 'selected' : '' }}>L</option>
        <option value="XL" {{ $FinalProduct_model->size == "XL" ? 'selected' : '' }}>XL</option>
        <option value="2XL" {{ $FinalProduct_model->size == "2XL" ? 'selected' : '' }}>2XL</option>
        <option value="3XL" {{ $FinalProduct_model->size == "3XL" ? 'selected' : '' }}>3XL</option>
        <option value="4XL" {{ $FinalProduct_model->size == "4XL" ? 'selected' : '' }}>4XL</option>
    </select>
</div>

<div class="form-group">
    <label>Color <span class="text-danger">*</span></label>
    <select name="color" class="form-control select" value="{{Request::old('color') ? Request::old('color') : $FinalProduct_model->color}}">
        <option value="" selected>---------- Please select a color ----------</option>
        <option value="#800000" class="text-white" style="background-color: #800000;" {{ $FinalProduct_model->color == '#800000' ? 'selected' : '' }}>Dark Red</option>
        <option value="red" class="text-white" style="background-color: red;" {{ $FinalProduct_model->color == 'red' ? 'selected' : '' }}>Red</option>
        <option value="rgb(241, 148, 47)" style="background-color: rgb(241, 148, 47);" class="text-white" {{ $FinalProduct_model->color == 'rgb(241, 148, 47)' ? 'selected' : '' }}>Orange</option>
        <option value="gold" class="text-dark" style="background-color: gold;" {{ $FinalProduct_model->color == 'gold' ? 'selected' : '' }}>Gold</option>
        <option value="yellow" class="text-dark" style="background-color: yellow;" {{ $FinalProduct_model->color == 'yellow' ? 'selected' : '' }}>Yellow</option>
        <option value="rgb(145, 57, 124)" class="text-white" style="background-color: rgb(145, 57, 124);" {{ $FinalProduct_model->color == 'rgb(145, 57, 124)' ? 'selected' : '' }}>Light Purple</option>
        <option value="rgb(207, 84, 137)" class="text-white" style="background-color: rgb(207, 84, 137);" {{ $FinalProduct_model->color == 'rgb(207, 84, 137)' ? 'selected' : '' }}>Light Pinkish Red</option>
        <option value="rgb(217, 128, 128)" style="background-color: rgb(217, 128, 128);" class="text-white" {{ $FinalProduct_model->color == 'rgb(217, 128, 128)' ? 'selected' : '' }}>Light Red</option>
        <option value="#000080" class="text-white" style="background-color: #000080;" {{ $FinalProduct_model->color == '#000080' ? 'selected' : '' }}>Navy Blue</option>
        <option value="blue" class="text-white" style="background-color: blue;" {{ $FinalProduct_model->color == 'blue' ? 'selected' : '' }}>Blue</option>
        <option value="darkcyan" class="text-white" style="background-color: darkcyan;" {{ $FinalProduct_model->color == 'darkcyan' ? 'selected' : '' }}>Dark Cyan</option>
        <option value="cyan" class="text-dark" style="background-color: cyan;" {{ $FinalProduct_model->color == 'cyan' ? 'selected' : '' }}>Cyan</option>
        <option value="rgb(126, 57, 57)" class="text-white" style="background-color: rgb(126, 57, 57);" {{ $FinalProduct_model->color == 'rgb(126, 57, 57)' ? 'selected' : '' }}>Brown</option>
        <option value="grey" class="text-white" style="background-color: grey;" {{ $FinalProduct_model->color == 'grey' ? 'selected' : '' }}>Grey/Gray</option>
        <option value="olive" class="text-white" style="background-color: olive;"  {{ $FinalProduct_model->color == 'olive' ? 'selected' : '' }}>Olive</option>
        <option value="beige" class="text-dark" style="background-color: beige;"  {{ $FinalProduct_model->color == 'beige' ? 'selected' : '' }}>Beige</option>
        <option value="white" class="text-white" style="background-color: white;" {{ $FinalProduct_model->color == 'white' ? 'selected' : '' }}>White</option>
        <option value="green" class="text-white" style="background-color: green;" {{ $FinalProduct_model->color == 'green' ? 'selected' : '' }}>Green</option>
        <option value="rgb(50, 177, 164)" class="text-white" style="background-color: rgb(50, 177, 164);" {{ $FinalProduct_model->color == 'rgb(50, 177, 164)' ? 'selected' : '' }}>Greenish Blue</option>
    </select>
    <div class="d-flex @if(Route::is('products.edit')) d-block @else d-none @endif">
        Live:&nbsp;
        <div class="color-div text-center w-100 mt-1 border border-dark" style="background-color: {{ $FinalProduct_model->color }};"></div>
    </div>
</div>

<div class="form-group">
    <label>Available Quantity <span class="text-danger">*</span></label>
    <input name="available_quantity" type="number" class="form-control" value="{{Request::old('available_quantity') ? Request::old('available_quantity') : $FinalProduct_model->available_quantity}}" placeholder="Enter the available quantity here..">
</div>

<div class="form-group @if(auth()->user()->user_type == "supplier") d-none @endif">
    <label>Supplier <span class="text-danger">*</span></label>
    @inject('user', 'App\Models\User')
    {!! Form::select('supplier_id', $user->type('supplier')->pluck('name','id'), Request::old('supplier_id') ? Request::old('supplier_id') : $FinalProduct_model->supplier_id,[
        'placeholder' => '---------- Please select a supplier ----------',
        'class'       => 'form-control select'.( $errors->has('supplier_id') ? ' is-invalid' : '' ),
        ( $FinalProduct_model->supplier_id == $user->id ? 'selected'  : '' ),
        // 'required',
    ]) !!} 
</div>
        
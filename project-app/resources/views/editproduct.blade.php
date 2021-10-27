@extends('layouts.management')

@section('content')
<div>
    <div>
        <div>
            <div>
                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <article>  
                        <div class="headertext">Edit product</div>
                        <div class="subtext" style="color:#000000;">
                            <form method="POST" action="{{url('/stock-in/products/edit/' .$product->productCode)}}">
                            @csrf  
                            @method('PUT')
                            <div class="form-input">
                                <div>
                                    <label style="padding-top: 10px; position: absolute; left:600px; top: 197px;">Product code</label>
                                    <input type="text" name="productCode" value="{{old('productCode') ?? $product->productCode }}" required class="input-box" style="position: absolute; left: 750px; top: 205px;">  
                                </div>
                                <div>
                                <label style="padding-top: 10px; position: absolute; left:665px; top: 240px;">Name</label>
                                    <input type="text" name="productName" value="{{old('productName') ?? $product->productName }}" required class="input-box" style="position: absolute; left: 750px; top: 247px;"> 
                                </div>
                                <div>
                                    <label style="padding-top: 10px; position: absolute; left:683px; top: 284px;">Line</label>
                                    <input type="text" name="productLine" value="{{old('productLine') ?? $product->productLine }}" required class="input-box" style="position: absolute; left: 750px; top: 290px;">
                                </div>
                                <div>
                                <label style="padding-top: 10px; position: absolute; left:669px; top: 328px;">Scale</label>
                                    <input type="text" name="productScale" value="{{old('productScale') ?? $product->productScale }}" required class="input-box" style="position: absolute; left: 750px; top: 335px;">  
                                </div>
                                <div>
                                <label style="padding-top: 10px; position: absolute; left:653px; top: 372px;">Vendor</label>
                                    <input type="text" name="productVendor" value="{{old('productVendor') ?? $product->productVendor }}" required class="input-box" style="position: absolute; left: 750px; top: 380px;"> 
                                </div>
                                <div>
                                    <label style="padding-top: 10px; position: absolute; left:620px; top: 417px;">Description</label>
                                    <input type="text" name="productDescription" value="{{old('productDescription') ?? $product->productDescription }}" required class="input-box" style="position: absolute; left: 750px; top: 425px;">
                                </div>
                                <div>
                                    <label style="padding-top: 10px; position: absolute; left:640px; top: 462px;">Quanitity</label>
                                    <input type="number" min="0" name="quantityInStock" value="{{old('quantityInStock') ?? $product->quantityInStock }}" required class="input-box" style="position: absolute; left: 750px; top: 470px;">
                                </div>
                                <div>
                                    <label style="padding-top: 10px; position: absolute; left:643px; top: 507px;">Buyprice</label>
                                    <input type="number" min="1" name="buyPrice" value="{{old('buyPrice') ?? $product->buyPrice }}" required class="input-box" style="position: absolute; left: 750px; top: 515px;">
                                </div>
                                <div>
                                <label style="padding-top: 10px; position: absolute; left:672px; top: 552px;">MSRP</label>
                                    <input type="number" min="1" name="MSRP" value="{{old('MSRP') ?? $product->MSRP }}" required class="input-box" style="position: absolute; left: 750px; top: 560px;"> 
                                </div>
                                <div>
                                    <label style="padding-top: 10px; position: absolute; left:662px; top: 597px;">Status</label>
                                    <input type="text" name="productStatus" value="{{old('productStatus') ?? $product->productStatus }}" required class="input-box" style="position: absolute; left: 750px; top: 605px;">
                                </div>
                                
                                <button type="submit" class="submit-btn" style="position: absolute; left:920px; top: 655px;">Update</button>
                            </div>
                            </form>
                        </div>
                        <a href="{{ config('app.url')}}/stock-in/products" style="text-decoration: none;"><button class="cancel-btn" style="position: absolute; left:795px; top: 655px;">Cancel</button></a>
                        <form method="POST" action="{{url('/stock-in/products/delete/' .$product->productCode)}}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="delete-btn" style="position: absolute; left:670px; top: 655px;">Delete</button>
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product</title>
</head>
<body>
<div class="content">
        <div class="product-form">
            <form method="POST" action="{{url('/stock-in/products/edit/' .$product->productCode)}}">
            @csrf  
            @method('PUT')
            <div class="form-input">
                <div>
                    <label>Product code</label>
                    <input type="text" name="productCode" value="{{old('productCode') ?? $product->productCode }}" required>  
                </div>
                <div>
                   <label>Name</label>
                    <input type="text" name="productName" value="{{old('productName') ?? $product->productName }}" required> 
                </div>
                <div>
                    <label>Line</label>
                    <input type="text" name="productLine" value="{{old('productLine') ?? $product->productLine }}" required>
                </div>
                <div>
                  <label>Scale</label>
                    <input type="text" name="productScale" value="{{old('productScale') ?? $product->productScale }}" required>  
                </div>
                <div>
                   <label>Vendor</label>
                    <input type="text" name="productVendor" value="{{old('productVendor') ?? $product->productVendor }}" required> 
                </div>
                <div>
                    <label>Description</label>
                    <input type="text" name="productDescription" value="{{old('productDescription') ?? $product->productDescription }}" required>
                </div>
                <div>
                    <label>Quanitity</label>
                    <input type="number" min="0" name="quantityInStock" value="{{old('quantityInStock') ?? $product->quantityInStock }}" required>
                </div>
                <div>
                    <label>Buyprice</label>
                    <input type="number" min="1" name="buyPrice" value="{{old('buyPrice') ?? $product->buyPrice }}" required>
                </div>
                <div>
                   <label>MSRP</label>
                    <input type="number" min="1" name="MSRP" value="{{old('MSRP') ?? $product->MSRP }}" required> 
                </div>
                <div>
                    <label>Status</label>
                    <input type="text" name="productStatus" value="{{old('productStatus') ?? $product->productStatus }}" required>
                </div>
                
                <button type="submit">Update</button>
            </div>
            </form>
        </div>
        <a href="{{ config('app.url')}}/stock-in/products"><button>Cancel</button></a>
        <form method="POST" action="{{url('/stock-in/products/delete/' .$product->productCode)}}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit">Delete</button>
        </form>
    </div>
</body>
</html>
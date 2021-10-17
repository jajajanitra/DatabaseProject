<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
</head>
<body>
    <div class="content">
        <div class="product-form">
            <form method="POST" action="{{ config('app.url')}}/stock-in/products/addproduct">
            @csrf
            <div class="form-input">
                <div>
                    <label>Product code</label>
                    <input type="text" name="productCode" required>  
                </div>
                <div>
                   <label>Name</label>
                    <input type="text" name="productName" required> 
                </div>
                <div>
                    <label>Line</label>
                    <select name="productLine">
                        @foreach ($productlines as $productline)
                        <option value="{{$productline->productLine}}">{{ $productline->productLine }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                  <label>Scale</label>
                    <input type="text" name="productScale" required>  
                </div>
                <div>
                   <label>Vendor</label>
                    <input type="text" name="productVendor" required> 
                </div>
                <div>
                    <label>Description</label>
                    <input type="text" name="productDescription" required>
                </div>
                <div>
                    <label>Quanitity</label>
                    <input type="number" min="0" name="quantityInStock" required>
                </div>
                <div>
                    <label>Buyprice</label>
                    <input type="number" min="1" name="buyPrice" required>
                </div>
                <div>
                   <label>MSRP</label>
                    <input type="number" min="1" name="MSRP" required> 
                </div>
                <div>
                    <label>Status</label>
                    <select name="productStatus">
                        <option value="normal">normal</option>
                        <option value="preorder">perorder</option>
                    </select>
                </div>
                
                <button type="submit">Add</button>
            </div>
            </form>
        </div>
        <a href="{{ config('app.url')}}/stock-in/products"><button>Cancel</button></a>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <div class="product-form">
            <form method="POST" action="{{config('app.url')}}/stock-in/products/createproduct">
            @csrf
            <div class="form-input">
                <div>
                    <label>Product code</label>
                    <input type="text" name="productCode">  
                </div>
                <div>
                   <label>Name</label>
                    <input type="text" name="productName"> 
                </div>
                <div>
                    <label>Line</label>
                    <input type="text" name="productLine">
                </div>
                <div>
                  <label>Scale</label>
                    <input type="text" name="productScale">  
                </div>
                <div>
                   <label>Vendor</label>
                    <input type="text" name="productVendor"> 
                </div>
                <div>
                    <label>Description</label>
                    <input type="text" name="productDescription">
                </div>
                <div>
                    <label>Quanitity</label>
                    <input type="number" min="0" name="quantityInStock">
                </div>
                <div>
                    <label>Buyprice</label>
                    <input type="number" min="1" name="buyPrice">
                </div>
                <div>
                   <label>MSRP</label>
                    <input type="number" min="1" name="MSRP"> 
                </div>
                <div>
                    <label>Status</label>
                    <select name="productStatus">
                        <option value="normal">normal</option>
                        <option value="preorder">perorder</option>
                    </select>
                </div>

                <button>Cancel</button>
                <button type="submit">Submit</button>

            </div>
            </form>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>showproduct</title>
</head>
<body>
    <div class="content">
        <div class="select-table"> 
            <label>catalog</label>
            <select>
                <a href="{{ config('app.url')}}/products" class="select-table"><option>All product</option></a>
                <a href="{{ config('app.url')}}/products/vendor" class="select-table"><option>vendor</option></a>
                <a href="{{ config('app.url')}}/products/scale" class="select-table"><option>scale</option></a>
                <a href="{{ config('app.url')}}/preorder" class="select-table"><option>preorder</option></a>
            </select>
        </div>
        <h2>All Product</h2>
        <div class="table-showproducts">
            <table>
                <thead>
                    <td>Name</td>
                    <td>Scale</td>
                    <td>Vendor</td>
                    <td>Buyprice</td>
                    <td>Status</td>
                    <td></td>
                </thead>
                <tbody>
                    @foreach( $products as $product)
                    <tr>
                        <td>{{ $product ->productName }}</td>
                        <td>{{ $product ->productScale }}</td>
                        <td>{{ $product ->productVendor }}</td>
                        <td>{{ $product ->buyPrice }}</td>
                        <td><a href="{{ config('app.url')}}/products/addtocart" class="button"><button>add to cart</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>


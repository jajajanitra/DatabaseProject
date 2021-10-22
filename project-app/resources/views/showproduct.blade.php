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
            <h1>Catalog</h1>
            <botton><a href="{{ config('app.url')}}/products" class="select-table"><option>All product</option></a></botton>
            <botton><a href="{{ config('app.url')}}/products/vendor" class="select-table"><option>vendor</option></a></botton>
            <botton><a href="{{ config('app.url')}}/products/scale" class="select-table"><option>scale</option></a></botton>
            <botton><a href="{{ config('app.url')}}/preorder" class="select-table"><option>preorder</option></a></botton>
        </div>
        <div class="Dropdown-vendor">
            <label>vendor</label>
            <form action="{{ url('/products/vendor/vendor') }}" method="GET">
                @csrf
                <select name="vendor" id="vendor">
                    <option value="0">Select Vendor</option>
                    @foreach( $productVendor as $vendor)
                    <option value="{{$vendor->productVendor}}">{{ $vendor -> productVendor }}</option>   
                    @endforeach
                </select>
                <input type="submit" class="btn btn-danger btn-sm" value="select">
            </form>
        </div>
        <div class="Dropdown-scale">
            <label>scale</label>
            <form action="{{ url('/products/scale/scale') }}" method="GET">
                @csrf
                <select name="scale" id="scale">
                    <option value="0">Select Scale</option>
                    @foreach( $productScale as $scale)
                    <option value="{{$scale->productScale}}">{{ $scale -> productScale }}</option>   
                    @endforeach
                </select>
                <input type="submit" class="btn btn-danger btn-sm" value="select">
            </form>
        </div>
        <h2>All Product</h2>
        <div class="table-showproducts">
            <table>
                <thead>
                    <th>Name</th>
                    <th>Scale</th>
                    <th>Vendor</th>
                    <th>Buyprice</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach( $products as $product)
                    <tr>
                        <td>{{ $product ->productName }}</td>
                        <td>{{ $product ->productScale }}</td>
                        <td>{{ $product ->productVendor }}</td>
                        <td>{{ $product ->buyPrice }}</td>
                        <td>{{ $product ->productStatus }}</td>
                        <td><a href="{{ config('app.url')}}/products/addtocart" class="button"><button>add to cart</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

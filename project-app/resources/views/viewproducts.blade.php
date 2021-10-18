<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <div class="content">
        <div>
            <a href="{{ config('app.url')}}/stock-in/products/addproduct" class="button"><button>add product</button></a>
            <a href="{{ config('app.url')}}/stock-inadd" class="button"><button>add stockin</button></a>
        </div>
        <div class="table-products">
            <table>
                <thead>
                    <td>Code</td>
                    <td>Name</td>
                    <td>Line</td>
                    <td>Scale</td>
                    <td>Vendor</td>
                    <td>Description</td>
                    <td>Quanitity</td>
                    <td>Buyprice</td>
                    <td>MSRP</td>
                    <td>Status</td>
                    <td></td>
                </thead>
                <tbody>
                    @foreach( $products as $product)
                    <tr>
                        <td>{{ $product ->productCode }}</td>
                        <td>{{ $product ->productName }}</td>
                        <td>{{ $product ->productLine }}</td>
                        <td>{{ $product ->productScale }}</td>
                        <td>{{ $product ->productVendor }}</td>
                        <td>{{ $product ->productDescription }}</td>
                        <td>{{ $product ->quantityInStock }}</td>
                        <td>{{ $product ->buyPrice }}</td>
                        <td>{{ $product ->MSRP }}</td>
                        <td>{{ $product ->productStatus }}</td>
                        <td> <a href="{{url('/stock-in/products/edit/' .$product->productCode)}}"><button> edit </button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
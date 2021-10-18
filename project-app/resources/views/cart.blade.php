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
            @csrf  
            @method('PUT')
            <div class="table-cart">
            <table>
                <thead>
                    <td>Code</td>
                    <td>Name</td>
                    <td>Amount</td>
                    <td>Price</td>
                    <td>total</td>
                </thead>
                <tbody>
                    @foreach( $products as $product)
                    <tr>
                        <td>{{ $product ->productCode }}</td>
                        <td>{{ $product ->productName }}</td>
                        <td>{{ $product ->priceEach}}</td>
                        <td>{{ $product ->buyPrice }}</td>
                        <td>{{ $product ->productStatus }}</td>
                        <td><input type="number" name="quantity" min="0" max="5"value="0"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </form>
    </div>
</body>
</html>
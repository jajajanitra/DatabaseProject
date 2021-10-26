<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Orderdetails</h1>
    <div class="content">
        <div class="table-products">
            <table>
                    <tr><b>Order Number : </b> {{ $orderdetails ->orderNumber}}</tr>
                    <br>
                    <br>
                    <tr><b>Product Code : </b> {{ $orderdetails ->productCode}}</tr>
                    <br>
                    <br>
                    <tr><b>QuantityOrdered : </b> {{ $orderdetails ->quantityOrdered}}</tr>
                    <br>
                    <br>
                    <tr><b>Price Each : </b>{{ $orderdetails ->priceEach}}</tr>
                    <br>
                    <br>
                    <tr><b>Order LineNumber : </b>{{ $orderdetails ->orderLineNumber}}</tr>

            </table>
            <div>
                <br>
                <br>               
                <a href="{{ config('app.url')}}/order"><button>Back</button></a>
            </div>
</div>
    </div>
</body>
</html>
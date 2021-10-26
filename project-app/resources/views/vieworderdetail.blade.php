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
    <b>Order Number :</b> {{$orderdetails ->orderNumber }} 
    <br>
    <?php
    $orderNum = $orderdetails->orderNumber;
    ?>
    <br> 
        <table>
                <thead>
                    <td>Product Code</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>Quantity Ordered</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>Price Each</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>Order LineNumber</td>
                </thead>
                <tbody>
                @foreach( $orderdetail1 as $orderdetail) 
                    @if($orderdetail->orderNumber == $orderNum)
                    <tr>
                        <td>{{ $orderdetail ->productCode }}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>{{ $orderdetail ->quantityOrdered}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>{{ $orderdetail ->priceEach}}</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>{{ $orderdetail ->orderLineNumber}}</td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
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
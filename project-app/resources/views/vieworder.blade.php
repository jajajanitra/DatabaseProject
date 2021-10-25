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
            <div class="table-products">
            <table>
                <thead>
                    <td> </td>
                    <td>Order Number</td>
                    <td> </td>
                    <td>Date</td>
                    <td> </td>
                    <td>required Date</td>
                    <td> </td>
                    <td>shipped Date</td>
                    <td> </td>
                    <td>status</td>
                    <td> </td>
                    <td>comments</td>
                    <td> </td>
                    <td>total</td>
                    <td> </td>
                    <td>point Received</td>
                    <td> </td>
                    <td>order Type</td>
                    <td> </td>
                    <td>Coupon Number</td>
                    <td> </td>
                    <td>Customer Number</td>
                    <td> </td>
                    <td>Payment Number</td>
                </thead>
                <tbody>
                    @foreach( $orders as $order) 
                    <tr>
                        <td> </td>
                        <td><a href="{{url('/payment/create/'.$order->customerNumber)}}"><button> {{ $order ->orderNumber}}</button></a>
                        </td>
                        <td> </td>
                        <td>{{ $order ->orderDate}}</td>
                        <td> </td>
                        <td>{{ $order ->requiredDate }}</td>
                        <td> </td>
                        <td>{{ $order ->shippedDate}}</td>
                        <td> </td>
                        <td>{{ $order ->status}}</td>
                        <td> </td>
                        <td>{{ $order ->comments}}</td>
                        <td> </td>
                        <td>{{ $order ->total}}</td>
                        <td> </td>
                        <td>{{ $order ->pointReceived}}</td>
                        <td> </td>
                        <td>{{ $order ->orderType}}</td>
                        <td> </td>
                        <td>{{ $order ->couponNumber}}</td>
                        <td> </td>
                        <td>{{ $order ->customerNumber}}</td>
                        <td> </td>
                        <td>{{ $order ->paymentNumber}}</td>
                        <td> <a href="{{url('/order/edit/'.$order->orderNumber)}}"><button> edit </button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
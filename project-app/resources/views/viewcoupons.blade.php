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
        <div>
            <a href="{{ config('app.url')}}/coupons/add" class="button"><button>add coupon</button></a>
        </div>
        <table>
            <Thead>
                <td>CouponCode</td>
                <td>Discount</td>
                <td>CouponEXP</td>
            </Thead>
            <tbody>
                @foreach( $coupons as $coupon)
                <tr>
                    <td>{{ $coupon ->couponCode}}</td>
                    <td>{{ $coupon ->discount}}</td>
                    <td>{{ $coupon ->couponEXP}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
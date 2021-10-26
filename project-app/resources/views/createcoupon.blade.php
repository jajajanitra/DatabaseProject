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
        <div class="coupon-form">
            <form method="POST" action="{{ config('app.url')}}/coupons/add">
            @csrf
                <div>
                    <label>Coupon code</label>
                    <input type="text" name="couponCode" required>  
                </div>
                <div>
                    <label>Discount</label>
                    <input type="number" name="discount" required>  
                </div>
                <div>
                    <label>Number of coupons</label>
                    <input type="number" name="couponLimit" required>  
                </div>
                <div>
                    <label>couponEXP</label>
                    <input type="date" name="couponEXP" required>  
                </div>
                <button type="submit"> add</button>
            </form>
        </div>
    </div>
</body>
</html>
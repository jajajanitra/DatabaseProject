<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Payment</h1>
    <div class="content">
        <div class="table-products">
            <table>
                    <tr><b>Customer Number : </b> {{ $payment ->customerNumber}}</tr>
                    <br>
                    <br>
                    <tr><b>checkNumber : </b> {{ $payment ->checkNumber}}</tr>
                    <br>
                    <br>
                    <tr><b>Date : </b> {{ $payment ->paymentDate}}</tr>
                    <br>
                    <br>
                    <tr><b>Amount : </b>{{ $payment ->amount}}</tr>
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
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
            <a href="{{ config('app.url')}}/customer/create" class="button"><button>add Customer</button></a>
        </div>
        <div class="table-products">
            <table>
                <thead>
                    <td>customerNumber</td>
                    <td>customerName</td>
                    <td>contactFirstName</td>
                    <td>contactLastName</td>
                    <td>phone</td>
                    <td>addressLine1</td>
                    <td>addressLine2</td>
                    <td>city</td>
                    <td>state</td>
                    <td>postalCode</td>
                    <td>country</td>
                    <td>salesRepEmployeeNumber</td>
                    <td>creditLimit</td>
                    <td>points</td>
                </thead>
                <tbody>
                    @foreach( $customers as $customer) 
                    <tr>
                        <td>{{ $customer ->customerNumber}}</td>
                        <td>{{ $customer ->customerName}}</td>
                        <td>{{ $customer ->contactFirstName }}</td>
                        <td>{{ $customer ->contactLastName}}</td>
                        <td>{{ $customer ->phone}}</td>
                        <td>{{ $customer ->addressLine1}}</td>
                        <td>{{ $customer ->addressLine2}}</td>
                        <td>{{ $customer ->city}}</td>
                        <td>{{ $customer ->state}}</td>
                        <td>{{ $customer ->postalCode}}</td>
                        <td>{{ $customer ->country}}</td>
                        <td>{{ $customer ->salesRepEmployeeNumber}}</td>
                        <td>{{ $customer ->creditLimit}}</td>
                        <td>{{ $customer ->points}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
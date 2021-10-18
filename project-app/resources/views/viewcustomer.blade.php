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
                    <td> </td>
                    <td>customerNumber</td>
                    <td> </td>
                    <td>customerName</td>
                    <td> </td>
                    <td>contactFirstName</td>
                    <td> </td>
                    <td>contactLastName</td>
                    <td> </td>
                    <td>phone</td>
                    <td> </td>
                    <td>addressLine1</td>
                    <td> </td>
                    <td>addressLine2</td>
                    <td> </td>
                    <td>city</td>
                    <td> </td>
                    <td>state</td>
                    <td> </td>
                    <td>postalCode</td>
                    <td> </td>
                    <td>country</td>
                    <td> </td>
                    <td>salesRepEmployeeNumber</td>
                    <td> </td>
                    <td>creditLimit</td>
                    <td> </td>
                    <td>points</td>
                    <td> </td>
                </thead>
                <tbody>
                    @foreach( $customers as $customer) 
                    <tr>
                        <td> </td>
                        <td>{{ $customer ->customerNumber}}</td>
                        <td> </td>
                        <td>{{ $customer ->customerName}}</td>
                        <td> </td>
                        <td>{{ $customer ->contactFirstName }}</td>
                        <td> </td>
                        <td>{{ $customer ->contactLastName}}</td>
                        <td> </td>
                        <td>{{ $customer ->phone}}</td>
                        <td> </td>
                        <td>{{ $customer ->addressLine1}}</td>
                        <td> </td>
                        <td>{{ $customer ->addressLine2}}</td>
                        <td> </td>
                        <td>{{ $customer ->city}}</td>
                        <td> </td>
                        <td>{{ $customer ->state}}</td>
                        <td> </td>
                        <td>{{ $customer ->postalCode}}</td>
                        <td> </td>
                        <td>{{ $customer ->country}}</td>
                        <td> </td>
                        <td>{{ $customer ->salesRepEmployeeNumber}}</td>
                        <td> </td>
                        <td>{{ $customer ->creditLimit}}</td>
                        <td> </td>
                        <td>{{ $customer ->points}}</td>
                        <td> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
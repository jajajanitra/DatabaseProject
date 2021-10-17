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
                    <td>stockInNumber</td>
                    <td> </td>
                    <td>productCode</td>
                    <td> </td>
                    <td>employeeNumber</td>
                    <td> </td>
                    <td>quantityToOrder</td>
                    <td> </td>
                    <td>date</td>
                    <td> </td>
                </thead>
                <tbody>
                    @foreach( $stockins as $stockin) 
                    <tr>
                        <td> </td>
                        <td>{{ $stockin ->stockInNumber}}</td>
                        <td> </td>
                        <td>{{ $stockin ->productCode}}</td>
                        <td> </td>
                        <td>{{ $stockin ->employeeNumber}}</td>
                        <td> </td>
                        <td>{{ $stockin ->quantityToOrder }}</td>
                        <td> </td>
                        <td>{{ $stockin ->date}}</td>
                        <td> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
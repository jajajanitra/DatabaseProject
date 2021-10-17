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
                    <td>employeeNumber</td>
                    <td> </td>
                    <td>FirstName</td>
                    <td> </td>
                    <td>LastName</td>
                    <td> </td>
                    <td>extension</td>
                    <td> </td>
                    <td>email</td>
                    <td> </td>
                    <td>officeCode</td>
                    <td> </td>
                    <td>reportsTo</td>
                    <td> </td>
                </thead>
                <tbody>
                    @foreach( $employees as $employee) 
                    <tr>
                        <td> </td>
                        <td>{{ $employee ->employeeNumber}}</td>
                        <td> </td>
                        <td>{{ $employee ->firstName}}</td>
                        <td> </td>
                        <td>{{ $employee ->lastName}}</td>
                        <td> </td>
                        <td>{{ $employee ->extension}}</td>
                        <td> </td>
                        <td>{{ $employee ->email}}</td>
                        <td> </td>
                        <td>{{ $employee ->officeCode}}</td>
                        <td> </td>
                        <td>{{ $employee ->reportsTo}}</td>
                        <td> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
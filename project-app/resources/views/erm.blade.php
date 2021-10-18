<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Resource Management</title>
</head>
<body>
    <div class="content">
        <div class="table-erm">
            <table>
                <thead>
                    <td>Employee No.</td>
                    <td>Last name</td>
                    <td>First name</td>
                    <td>Job title</td>
                    <td></td>
                </thead>
                <tbody>
                    @foreach( $employees as $employee)
                    <tr>
                        <td>{{ $employee -> employeeNumber }}</td>
                        <td>{{ $employee -> lastName }}</td>
                        <td>{{ $employee -> firstName }}</td>
                        <td>{{ $employee -> jobTitle }}</td>
                        <td> <a href="{{url('/erm/edit/' .$employee->employeeNumber)}}"><button> edit </button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

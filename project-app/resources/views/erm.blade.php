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
                        <td>{{ $employee -> employeeNumber}}</td>
                        <td>{{ $employee -> lastName}}</td>
                        <td>{{ $employee -> firstName}}</td>
                        <td> 
                        <form method="POST" action="{{url('/erm' .$employee->employeeNumber)}}">
                        @csrf  
                        @method('PUT')
                        <select name="jobTitle" value="{{old('jobTitle') ?? $employee->jobTitle }}">
                        <option value="Sales Manager(APAC)">Sales Manager(APAC)</option>
                        <option value="Sales Manager(EMEA)">Sales Manager(EMEA)</option>
                        <option value="Sales Manager(NA)">Sales Manager(NA)</option>
                        <option value="Sales Rep">Sales Rep</option>
                        </select>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                    <button type="submit">confirm</button>
                    <a href="{{ config('app.url')}}/home"><button>Cancel</button></a>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

//product code all 0
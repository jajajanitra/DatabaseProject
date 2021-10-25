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
        <div class="editerm">
            <div>Employee No. : {{ $filtered -> employeeNumber}}</div>
            <div>Name : {{ $employee -> firstName}} {{ $employee -> lastName}}</div>
            <div>Job title : {{ $employee -> jobTitle }}</div>
            <form method="POST" action="{{url('/erm/edit/' .$employee->employeeNumber)}}">
            @csrf  
            @method('PUT')
            <select name="jobTitle">
                        <option value="Sales Manager (APAC)">Sales Manager (APAC)</option>
                        <option value="Sale Manager (EMEA)">Sale Manager (EMEA)</option>
                        <option value="Sales Manager (NA)">Sales Manager (NA)</option>
                        <option value="Sales Rep">Sales Rep</option>
            </select>
            <div><button type="submit">Update</button></div>
            </form>
            <a href="{{ config('app.url')}}/erm"><button>Cancel</button></a>
        </div>
    </div>
</body>
</html>

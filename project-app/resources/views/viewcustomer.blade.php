@extends('layouts.management')

@section('content')
<div>
    <div>
        <div>
            <div>
                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <article>  
                    <a href="{{ config('app.url')}}/customer/create" class="addbtn-ali" style="text-decoration: none; position: absolute; left: 1220px; top: 150px;"><button class="add-btn">add customer</button></a>
                        <div class="headertext">Customers</div>
                        <div>
                            <table class="table-card" style="width:1120px;">
                                <thead class="table-header">
                                        <td style="width:80px; text-align: center;">customer Number</td>
                                        <td style="width:80px; text-align: center;">customer Name</td>
                                        <td style="width:80px; text-align: center;">contact FirstName</td>
                                        <td style="width:80px; text-align: center;">contact LastName</td>
                                        <td style="width:80px; text-align: center;">phone</td>
                                        <td style="width:80px; text-align: center;">address Line1</td>
                                        <td style="width:80px; text-align: center;">address Line2</td>
                                        <td style="width:80px; text-align: center;">city</td>
                                        <td style="width:80px; text-align: center;">state</td>
                                        <td style="width:80px; text-align: center;">postalCode</td>
                                        <td style="width:80px; text-align: center;">country</td>
                                        <td style="width:80px; text-align: center;">sales Rep</td>
                                        <td style="width:80px; text-align: center;">credit Limit</td>
                                        <td style="width:80px; text-align: center;">points</td>
                                </thead>
                                <tbody>
                                    @foreach( $customers as $customer) 
                                        <tr class="table-row">
                                            <td style="width:80px; text-align:center;" class="text-overflow">{{ $customer ->customerNumber}}</td>
                                            <td style="width:80px; text-align:center" class="text-overflow">{{ $customer ->customerName}}</td>
                                            <td style="width:80px; text-align:center" class="text-overflow">{{ $customer ->contactFirstName }}</td>
                                            <td style="width:80px; text-align:center" class="text-overflow">{{ $customer ->contactLastName}}</td>
                                            <td style="width:80px; text-align:center" class="text-overflow">{{ $customer ->phone}}</td>
                                            <td style="width:80px; text-align:center" class="text-overflow">{{ $customer ->addressLine1}}</td>
                                            <td style="width:80px; text-align:center" class="text-overflow">{{ $customer ->addressLine2}}</td>
                                            <td style="width:80px; text-align:center;" class="text-overflow">{{ $customer ->city}}</td>
                                            <td style="width:80px; text-align:center;" class="text-overflow">{{ $customer ->state}}</td>
                                            <td style="width:80px; text-align:center" class="text-overflow">{{ $customer ->postalCode}}</td>
                                            <td style="width:80px; text-align:center" class="text-overflow">{{ $customer ->country}}</td>
                                            <td style="width:80px; text-align:center" class="text-overflow">{{ $customer ->salesRepEmployeeNumber}}</td>
                                            <td style="width:80px; text-align:center" class="text-overflow">{{ $customer ->creditLimit}}</td>
                                            <td style="width:60px; text-align:center" class="text-overflow">{{ $customer ->points}}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
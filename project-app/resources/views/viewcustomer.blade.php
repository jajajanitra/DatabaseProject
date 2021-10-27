@extends('layouts.app')

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
                    <nav>
                        <div class="nav-header">Management</div>
                        <p class="menubar1"></p>
                        <a href="{{ url('/stock-in') }}" class="nav-subheader-1">stock-in</a>
                        <p class="submenubar1" style></p>
                        <a href="{{ url('/stock-inadd') }}" class="nav-sub-subheader-1">add stock-in</a>
                        <p class="submenubar2" style></p>
                        <a href="{{ url('/stock-in/products') }}" class="nav-sub-subheader-2">edit product</a>
                        <p class="menubar2" style></p>
                        <a href="{{ url('/order') }}" class="nav-subheader-2">order</a>
                        <p class="menubar3" style></p>
                        <a href="{{ url('/customer') }}" class="nav-subheader-3">customer</a>
                        <p class="menubar4" style></p>
                        <a href="{{ url('/employee') }}" class="nav-subheader-4">employee</a>
                        <p class="submenubar3" style></p>
                        <a href="{{ url('/erm/' .Auth::user()->username) }}" class="nav-sub-subheader-3">ERM</a>
                    </nav>
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
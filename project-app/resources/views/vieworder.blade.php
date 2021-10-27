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
                        <div class="headertext">Orders</div>
                        <div>
                            <table class="table-card" style="width: 1105px;">
                                <thead class="table-header">
                                    <td style="width:85px; text-align: center;">Order Number</td>
                                    <td style="width:85px; text-align: center;">Date</td>
                                    <td style="width:85px; text-align: center;">required Date</td>
                                    <td style="width:85px; text-align: center;">shipped Date</td>
                                    <td style="width:85px; text-align: center;">status</td>
                                    <td style="width:85px; text-align: center;">comments</td>
                                    <td style="width:85px; text-align: center;">total</td>
                                    <td style="width:85px; text-align: center;">point Received</td>
                                    <td style="width:85px; text-align: center;">order Type</td>
                                    <td style="width:85px; text-align: center;">Coupon Number</td>
                                    <td style="width:85px; text-align: center;">Customer Number</td>
                                    <td style="width:85px; text-align: center;">Payment Number</td>
                                    <td style="width:85px; text-align: center;"></td>
                                </thead>
                                <tbody>
                                    @foreach( $orders as $order) 
                                        <tr class="table-row" style="height:60px; overflow: scroll;">
                                            <td style="width:84px; text-align: center;" ><a href="{{url('/orderdetail/'.$order->orderNumber)}}" style = "text-decoration: none; color:#000000;">{{ $order ->orderNumber}}</a></td>
                                            <td style="width:84px; text-align: center;">{{ $order ->orderDate}}</td>
                                            <td style="width:84px; text-align: center;">{{ $order ->requiredDate }}</td>
                                            <td style="width:84px; text-align: center;">{{ $order ->shippedDate}}</td>
                                            <td style="width:84px; text-align: center;">{{ $order ->status}}</td>
                                            <td style="width:84px; text-align: center;">{{ $order ->comments}}</td>
                                            <td style="width:84px; text-align: center;">{{ $order ->total}}</td>
                                            <td style="width:84px; text-align: center;">{{ $order ->pointReceived}}</td>
                                            <td style="width:84px; text-align: center;">{{ $order ->orderType}}</td>
                                            <td style="width:84px; text-align: center;">{{ $order ->couponNumber}}</td>
                                            <td style="width:84px; text-align: center;">{{ $order ->customerNumber}}</td>
                                            <td style="width:84px; text-align: center;"><a href="{{url('/mypayment/'.$order->customerNumber)}}" style="text-decoration: none;"><button>{{ $order ->paymentNumber}}</button></a></td>
                                            <td style="width:80px; text-align: center;"> <a href="{{url('/order/edit/'.$order->orderNumber)}}" style="text-decoration: none;"><button class="edit-btn"> edit </button></a></td>
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
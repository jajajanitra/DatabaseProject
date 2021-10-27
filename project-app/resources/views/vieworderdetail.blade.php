
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
                        <div class="headertext">Order detail</div>
                        <div class="contenttext" style="padding-top: 10px; padding-left: 5px;"><b>Order Number :</b> <label style="color:#7E7E7E;">{{$orderdetails ->orderNumber }}</label> </div>
                        <?php $orderNum = $orderdetails->orderNumber; ?>
                        <div class="table-erm" style="padding-top: 10px;">
                            <table class="table-card" style="width:480px;">
                                <thead class="table-header">
                                    <td style="width:120px; text-align:center;">Product Code</td>
                                    <td style="width:120px; text-align:center;">Quantity Ordered</td>
                                    <td style="width:120px; text-align:center;">Price Each</td>
                                    <td style="width:120px; text-align:center;">Order LineNumber</td>
                                </thead>
                                <tbody>
                                    @foreach( $orderdetail1 as $orderdetail) 
                                        @if($orderdetail->orderNumber == $orderNum)
                                        <tr class="table-row">
                                            <td style="width:115px; text-align:center;">{{ $orderdetail ->productCode }}</td>
                                            <td style="width:115px; text-align:center;">{{ $orderdetail ->quantityOrdered}}</td>
                                            <td style="width:115px; text-align:center;">{{ $orderdetail ->priceEach}}</td>
                                            <td style="width:115px; text-align:center;"> {{ $orderdetail ->orderLineNumber}}</td>
                                        </tr>
                                        @endif
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
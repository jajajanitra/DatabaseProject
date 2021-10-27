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
                        <div class="headertext">PreOrders</div>
                        <div>
                            <table class="table-card" style="width: 1105px;">
                                <thead class="table-header">
                                    <td style="width:85px; text-align: center;">PrepreOrder Number</td>
                                    <td style="width:85px; text-align: center;">Customer Number</td>
                                    <td style="width:85px; text-align: center;">Order Number</td>
                                    <td style="width:85px; text-align: center;">Up Front Paid 50%</td>
                                </thead>
                                <tbody>
                                    @foreach( $preorders as $preorder) 
                                        <tr class="table-row" style="height:60px; overflow: scroll;">
                                            <td style="width:84px; text-align: center;">{{ $preorder ->preOrderNumber}}</td>
                                            <td style="width:84px; text-align: center;">{{ $preorder ->customerNumber }}</td>
                                            <td style="width:84px; text-align: center;">{{ $preorder ->orderNumber}}</td>
                                            <td style="width:84px; text-align: center;">{{ $preorder ->upFrontPaid}}</td>
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
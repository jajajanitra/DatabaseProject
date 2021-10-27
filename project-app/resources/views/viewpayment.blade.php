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

            <?php $orderpay = $order->paymentNumber;?>


                        <div class="headertext">Payment detail</div>
                        <div class="subtext">
                    @foreach($payments as $payment)
                    @if( $payment->checkNumber == $orderpay and $orderpay != null)
                        <div style="padding-top: 10px;"><b style="color:#000000;">Customer Number : </b> {{ $payment ->customerNumber}}</div>
                        <div style="padding-top: 5px;"><b style="color:#000000;">checkNumber : </b> {{ $payment ->checkNumber}}</div>
                        <div style="padding-top: 5px;"><b style="color:#000000;">Date : </b> {{ $payment ->paymentDate}}</div>
                        <div style="padding-top: 5px;"><b style="color:#000000;">Amount : </b>{{ $payment ->amount}}</div>
                    @endif
                    @endforeach
                    </div> 
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
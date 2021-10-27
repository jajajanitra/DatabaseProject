@extends('layout')
@section('title', 'Cart')
@section('content')
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        <?php $total = 0 ?>
<!-- by this code session get all product that user chose -->
        @if(session('cart'))
            @foreach(session('cart') as $id => $j)

                <?php $total += $j['buyPrice'] * $j['quantity'] ?>

                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $j['productName'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="buyPrice">${{ $j['buyPrice'] }}</td>
                    <td data-th="Quantity"> {{ $j['quantity'] }}</td>
                    <td data-th="Subtotal" class="text-center">${{ $j['buyPrice'] * $j['quantity'] }}</td>
                    </td>
                </tr>
            @endforeach
            
        @endif
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
            </tr>
        </tfoot>
        <tfoot>
            <div>
                <label>Order :</label>
                <input  type="number" name="orderNumber" value="{{$order -> orderNumber }}" readonly>
            </div>
            <div>
                <label>Point Balance :</label>
                <input  type="number" name="pointReceived" value="{{$order -> pointReceived}}" readonly>
            </div>
            <form action="{{url('/payment/'. $order->orderNumber)}}" method="post">
                <div>
                    @csrf
                    @method('PUT')
                    <div>
                        <label>Customer Number :</label>
                        <input  type="text" name="customerNumber" value="{{$order -> customerNumber}}" readonly>
                    </div>
                    <div>
                        <label>paymentDate :</label>
                        <input  type="date" name="paymentDate" required>
                    </div>
                    <div>
                        <label>amount :</label>
                        <input  type="number" name="amount" value="{{$order -> total}}" readonly>
                    </div>
                    <div>
                    <label>paymentNumber/checkNumber :</label>
                    <input type="text" name="paymentNumber" value="{{$order -> paymentNumber}}" readonly required>
                    </div> 
                    <div>
                        <label for="status">Status :</label>
                            <select name="status"  >
                                <option value="In Process" selected>In Process</option>
                            </select>
                    </div>
                    <div>
                        <label>OrderType :</label>
                        <input  type="text" name="orderType" value="{{$order -> orderType}}" readonly>
                    </div>
                </div>
                <button type="submit">purchase</button>
            </form>
        </tfoot>
    </table>

    </form>

@endsection
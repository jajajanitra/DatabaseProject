@extends('layouts.store')
@section('title', 'Cart')
@section('content')
<article>
    <div class="headertext">Payment</div>
    <div class="contenttext">
    <table id="cart" class="table-card" style="width:1000px;">
        <thead class="table-header">
        <tr style="width:1000px;">
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
        </tr>
        </thead>
        <tbody>

        <?php $total = 0 ?>
<!-- by this code session get all product that user chose -->
        @if(session('cart'))
            @foreach(session('cart') as $id => $j)

                <?php $total += $j['buyPrice'] * $j['quantity'] ?>

                <tr class="table-row" style="width: 1000px; height:80px;">
                    <td data-th="Product" style="width: 51%;">
                        <div class="row">
                            <div class="col-sm-9">
                                <h5 class="nomargin">{{ $j['productName'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="buyPrice" style="align:center; width:14%;">${{ $j['buyPrice'] }}</td>
                    <td data-th="Quantity" style="width: 6%;"> {{ $j['quantity'] }}</td>
                    <td data-th="Subtotal" class="text-center" style="width: 22%;">${{ $j['buyPrice'] * $j['quantity'] }}</td>
                    </td>
                </tr>
            @endforeach
            
        @endif
        </tbody>
        <tfoot>
        <tr style="height:40px; width: 1000px;">
            <td><strong>Total ${{ $total }}</strong></td>
            </tr>
        </tfoot>
        <tfoot>
        <table style="margin-top: 20px; margin-left:20px;">
        <tbody>
            <tr>
                <td>
        <table>
            <tbody>
                <tr>
                    <td>
                        <label>order</label>
                    </td>
                    <td style="padding-left:39px;">
                        <input  type="number" name="orderNumber" value="{{$order -> orderNumber }}" readonly class="input-box" style="width: 135px; height:30px; margin-left:20px;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>point balance</label>
                    </td>
                    <td style="padding-left:39px;">
                        <input  type="number" name="pointReceived" value="{{$order -> pointReceived}}" readonly class="input-box" style="width: 135px; height:30px; margin-left:20px;">
                    </td>
                </tr>
            </tbody>
        </table>
            
            <form action="{{url('/payment/'. $order->orderNumber)}}" method="post">
                <div>
                    @csrf
                    @method('PUT')
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <label>customer number</label>
                                </td>
                                <td>
                                <input  type="text" name="customerNumber" value="{{$order -> customerNumber}}" readonly class="input-box" style="width: 135px; height:30px; margin-left:20px;">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label>paymentDate</label>
                                </td>
                                <td>
                                <input  type="date" name="paymentDate" id=e readonly class="input-box" style="width: 135px; height:30px; margin-left:20px;">
                                <script>document.getElementById('e').value = new Date().toISOString().substring(0, 10);</script>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                        </td>
                        <td style="padding-left:20px;">
                            <table>
                            <tbody>
                            <tr>
                                <td>
                                <label>amount</label>
                                </td>
                                <td>
                                <input  type="number" name="amount" value="{{$order -> total}}" readonly class="input-box" style="width: 135px; height:30px; margin-left:20px;">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label>payment number</label>
                                </td>
                                <td>
                                <input type="text" name="paymentNumber" value="{{$order -> paymentNumber}}" readonly required class="input-box" style="width: 135px; height:30px; margin-left:20px;">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label for="status">Status</label>
                                </td>
                                <td>
                                <select name="status" class="form-select" style="width: 135px; height:30px; margin-left:20px; border: 1px solid #EEEEEE; box-sizing: border-box; border-radius: 15px;">
                                <option value="In Process" selected>In Process</option>
                            </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label>OrderType</label>
                                </td>
                                <td>
                                <input  type="text" name="orderType" value="{{$order -> orderType}}" readonly class="input-box" style="width: 135px; height:30px; margin-left:20px;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
</td>
</tr>
</tbody>
</table>             
                <button type="submit" class="edit-btn" style="width:200px; margin-top:10px; position: absolute; left:1100px; top:700px;">purchase</button>
                <div class="carding"></div>
            </form>
        </tfoot>
    </table>

    </form>
</div>
</article>
@endsection
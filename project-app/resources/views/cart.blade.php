@extends('layouts.store')
@section('title', 'Cart')
@section('content')
<article>
    <div class="headertext">My cart</div>
<div class="contenttext">
    <table id="cart" class="table-card" style="width:1000px; margin-left: auto; margin-right: auto; padding-top: 20px;">
        <thead class="table-header" style="width:1000px;">
        <tr style="width:1000px;">
            <th style="width: 350px;">Product</th>
            <th style="width: 140px;">Price</th>
            <th style="width: 145px;">Status</th>
            <th style="width: 145px;">Quantity</th>
            <th style="width: 100px;">Subtotal</th>
            <th style="width: 100px;"></th>
        </tr>
        </thead>
        <tbody>

        <?php $date = date('Y-m-d', time());?>
        <?php $total = 0 ?>
<!-- by this code session get all product that user chose -->
        <?php $k?>
        <?php $couponCode ?>
        <?php $status = null?>
        <?php $i=0?>
        @if(session('cart'))
            @foreach(session('cart') as $id => $j)

                <?php $total += $j['buyPrice'] * $j['quantity'] ?>
                <?php $i+=1?>
                <tr class="table-row" style="width: 1000px; height:80px;">
                    <td data-th="Product" style="width: 50%;">
                        <div class="row">
                            <div class="col-sm-9">
                                <h5 class="nomargin">{{ $j['productName'] }}</h5>
                            </div>
                        </div>
                    </td>
                    <td data-th="buyPrice" style="align:center; width:20%;">${{ $j['buyPrice'] }}</td>
                    <td data-th="status" style="width: 20%;">{{ $j['productStatus'] }}</td>
                    <td data-th="Quantity" style="width: 20%;"> 
                    @if($j['productStatus']=="Preorder") 
                        <input type="number" value="{{ $j['quantity'] }}" min="0" class="form-control quantity" style="width: 60px; color:#000000;"/>
                    @else   
                        <input type="number" value="{{ $j['quantity'] }}" min="0" max="{{$j['quantityInStock']}}" class="form-control quantity" style="width: 60px; color:#000000; margin-left:10px;"/>
                    @endif
                    </td>
                    <td data-th="Subtotal" class="text-center" style="width: 10%;">${{ $j['buyPrice'] * $j['quantity'] }}</td>
                    <td class="actions" data-th="" style="width: 20%;">
                    <!-- this button is to update card -->
                    
                    <table>
                    <tbody>
                    <tr>
                    <td>
                    <form method="POST">
                    @csrf
                    @method('PUT')
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                    </form>
                    </td>
                    <td>
                    <!-- this button is for update card -->
                    <form method="POST">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-danger btn-sm remove-from-cart delete" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </form>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    <?php $status = $j['productStatus'] ?>
                </tr>
                <?php $k[$i]=[$j['productCode'],$j['buyPrice'],$j['quantity'],$j['productName'],$j['productLine'],$j['quantityInStock'],$j['productScale'],$j['productVendor'],$j['productDescription'],$j['MSRP'],$j['productStatus']]?>
            @endforeach
            @if($status == 'preorder')
                <?php $total = $total/2 
                ?>
            @endif
        @endif
        </td>
        <tr style="height:40px; width: 1000px;">
            <td style="width: 88%;">
            <td style="align:right; width:20%"><strong>Total ${{ $total }}</strong></td>
        </tr>
        </tbody>
        <div>
            <div>
            <form action="{{ url('/usecoupon/couponnum') }}" method="GET">
                @csrf
                <table style="position: absolute; top:150px; left:970px;">
                    <tbody>
                        <tr>
                            <td>
                                <label>coupon</label>
                            </td>
                            <td>
                                <input type="text" name="couponCode" id="couponnum" class="input-box" style="width: 200px; height:30px; margin-left:20px;" Placeholder="code">
                            </td>
                            <td>
                                <button type="submit" class="edit-btn" style="width: 80px; margin-left:20px;"> apply </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            @if(is_null($coupon))
                <div>
                        <?php $totalad = $total?>
                        <?php $couponCode = null?>
                </div>
                @else
                    @if($coupon->discount < $total && $coupon->couponLimit > 0 && $date < $coupon->couponEXP)
                    <div class="sb">
                        coupon is used 
                        discount $ {{$coupon->discount}}
                        <?php $totalad = $total - $coupon->discount?>
                        <?php $couponCode = $coupon->couponNumber?>
                    </div>
                    @else
                    <div class="sb">
                        can not use this coupon
                        <?php $totalad = $total?>
                        <?php $couponCode = null?>
                    </div>
                    @endif
            @endif
            </div>
        <tfoot>
            <form action="{{url('/products/cart')}}" method="post">
            <div>
                @csrf
                @method('POST')
                <table class="contenttext" style="margin-left: auto; margin-right: auto; margin-top: 50px;">
                <tbody>
                    <tr>
                    <td>
                    <table>
                    <tbody>
                        <tr>
                            <td>
                                <label>customer number</label>
                            </td>
                            <td>
                                <input type="number" name="customerNumber" required class="input-box" style="width: 135px; height:30px; margin-left:20px;">                              
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>order date</label>
                            </td>
                            <td>
                                <input type="date" name="orderDate" id=e readonly class="input-box" style="width: 135px; height:30px; margin-left:20px;">
                                <script>document.getElementById('e').value = new Date().toISOString().substring(0, 10);</script>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>required date</label>
                            </td>
                            <td>
                                <input type="date" name="requiredDate" required class="input-box" style="width: 135px; height:30px; margin-left:20px;"> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>shipped date</label>
                            </td>
                            <td>
                                <input type="date" name="shippedDate" required class="input-box" style="width: 135px; height:30px; margin-left:20px;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="status">status</label>
                            </td>
                            <td>
                                <select name="status" class="form-select" style="width: 135px; height:30px; margin-left:20px; border: 1px solid #EEEEEE; box-sizing: border-box; border-radius: 15px;">
                                    <option value="In Process">in process</option> 
                                </select>
                            </td>
                        </tr>
                        </tbody>
                        </table>
                    </td>
                    <td>
                    <table style="margin-left: 20px;">
                    <tbody> 
                        <tr>
                            <td>
                                <label>comment</label>
                            </td>
                            <td>
                                <input type="text" name="comments" class="input-box" style="width: 135px; height:30px; margin-left:20px;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>order type</label>
                            </td>
                            <td>
                                <input type="text" name="orderType"  value="{{$status}}" readonly class="input-box" style="width: 135px; height:30px; margin-left:20px;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>payment number</label>
                            </td>
                            <td>
                                <input type="text" name="paymentNumber" required class="input-box" style="width: 135px; height:30px; margin-left:20px;">  
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>total</label>
                            </td>
                            <td>
                                <input type="number" name="total"  value="{{$totalad}}" readonly class="input-box" style="width: 135px; height:30px; margin-left:20px;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php $totalpoint =  floor($total/100) *3 ?>
                                <label>point received</label>
                            </td>
                            <td>
                            <input  type="number" name="pointReceived" value="{{ $totalpoint }}" readonly class="input-box" style="width: 135px; height:30px; margin-left:20px;">
                            </td>
                        </tr>
                    </tbody>
                    </table> 
                    @for ($p = 1; $p <= $i; $p++)
                    <input type="hidden" type="text" name="productCode[]" value="{{$k[$p][0]}}">
                    <input type="hidden" type="number" name="priceEach[]" value="{{$k[$p][1]}}">
                    <input type="hidden" type="number" name="buyPrice[]" value="{{$k[$p][1]}}">
                    <input type="hidden" type="number" name="quantityOrdered[]" value="{{$k[$p][2]}}">
                    <input type="hidden" type="text" name="productName[]" value="{{$k[$p][3]}}">
                    <input type="hidden" type="text" name="productLine[]" value="{{$k[$p][4]}}">
                    <input type="hidden" type="number" name="quantityInStock[]" value="{{$k[$p][5]}}">
                    <input type="hidden" type="text" name="productScale[]" value="{{$k[$p][6]}}">
                    <input type="hidden" type="text" name="productVendor[]" value="{{$k[$p][7]}}">
                    <input type="hidden" type="text" name="productDescription[]" value="{{$k[$p][8]}}">
                    <input type="hidden" type="number" name="MSRP[]" value="{{$k[$p][9]}}">
                    <input type="hidden" type="text" name="productStatus[]" value="{{$k[$p][10]}}">
                    @endfor
<td style="padding-left:30px;"> 
                    <table>
                        <tbody>
                            <tr>
                    <button type="submit" class="edit-btn" style="width:200px; margin-top:10px;"> Place order </button>
                    </tr>
                    <tr>
                    <button type="button" onClick="location.href='{{config('app.url')}}/products'"class="edit-btn" style="width:200px; margin-top:10px; background: #6B7280;  color: white;">Back to store</button>
</tr>
</tbody>
</table>
</td>
                    </td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </form>
            <div class="carding">
</div>
        </tfoot>
    </table>
</div>
</article>

@endsection

@section('scripts')


    <script type="text/javascript">
// this function is for update card
        $(".update-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ url('/products/cart/updatecart') }}',
                method: "put",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
                success: function (response) {
                    window.location.reload();
                }
            });
        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('/products/cart/removefromcart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                        
                    }
                });
            }
        });
        function autoRefresh() {
            window.location = window.location.href;
        }
    </script>

@endsection
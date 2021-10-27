@extends('layout')
@section('title', 'Cart')
@section('content')
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Status</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        <?php $date = date('Y-m-d', time());?>
        <?php $total = 0 ?>
<!-- by this code session get all product that user chose -->
        <?php $k?>
        <?php $couponCode ?>
        <?php $i=0?>
        @if(session('cart'))
            @foreach(session('cart') as $id => $j)

                <?php $total += $j['buyPrice'] * $j['quantity'] ?>
                <?php $i+=1?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $j['productName'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="buyPrice">${{ $j['buyPrice'] }}</td>
                    <td data-th="status">{{ $j['productStatus'] }}</td>
                    <td data-th="Quantity"> 
                    @if($j['productStatus']=="Preorder") 
                        <input type="number" value="{{ $j['quantity'] }}" min="0" class="form-control quantity" />
                    @else   
                        <input type="number" value="{{ $j['quantity'] }}" min="0" max="{{$j['quantityInStock']}}" class="form-control quantity" />
                    @endif
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $j['buyPrice'] * $j['quantity'] }}</td>
                    <td class="actions" data-th="">
                    <!-- this button is to update card -->
                    <form method="POST" >
                    @csrf
                    @method('PUT')
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                    </form>
                    <!-- this button is for update card -->
                    <form method="POST">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-danger btn-sm remove-from-cart delete" data-id="{{ $id }}"><i class="fa fa-trash-o"></i>DELETE</button>
                    </form>
                    </td>
                </tr>
                <?php $k[$i]=[$j['productCode'],$j['buyPrice'],$j['quantity'],$j['productName'],$j['productLine'],$j['quantityInStock'],$j['productScale'],$j['productVendor'],$j['productDescription'],$j['MSRP'],$j['productStatus']]?>
            @endforeach
        @endif
        <?php $status = $j['productStatus'] ?>
        <tr>
            <td><button type="button" onClick="window.history.back();"class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</button></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
        </tr>
        </tbody>
        <div>
            <div>
                <p> Please apply coupon before insert the form below </p>
            <form action="{{ url('/usecoupon/couponnum') }}" method="GET" >
                @csrf
                    <div>
                        <label>couponCode :</label>
                        <input type="text" name="couponCode" id="couponnum">
                        <button type="submit"> apply </button>
                    </div>
            </form>
            @if(is_null($coupon))
                <div>
                        <?php $totalad = $total?>
                        <?php $couponCode = null?>
                </div>
                @else
                    @if($coupon->discount < $total && $coupon->couponLimit > 0 && $date < $coupon->couponEXP)
                    <div>
                        coupon is used
                        discount $ {{$coupon->discount}}
                        <?php $totalad = $total - $coupon->discount?>
                        <?php $couponCode = $coupon->couponNumber?>
                    </div>
                    @else
                    <div>
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
                    <div class="form-group">
                        <label>Customer Number :</label>
                        <input type="number" name="customerNumber" required>                              
                    </div>
                    <div>
                        <label>order Date :</label>
                        <input type="date" name="orderDate" id=e readonly>
                        <script>document.getElementById('e').value = new Date().toISOString().substring(0, 10);</script>
                        
                    </div>
                    <div>
                        <label>requiredDate :</label>
                        <input type="date" name="requiredDate" required>
                    </div>
                    <div>
                        <label>shippedDate :</label>
                        <input type="date" name="shippedDate" required>
                    </div>
                    <div>
                        <label for="status">State</label>
                            <select name="status"  >
                                <option value="In Process">In Process</option> 
                            </select>
                    </div>
                    <div>
                        <label>comment :</label>
                        <input type="text" name="comments">
                    </div>
                    <div>
                        <label>OrderType</label>
                        <!-- @if($status != NULL){
                            <input type="text" name="orderType"  value="{{$status}}" readonly>
                        }
                        @else{
                            <input type="text" name="orderType"  value=0 readonly>
                        }
                        @endif -->
                    <div>
                        <input type="hidden" type="text" name="couponNumber"  value="{{$couponCode}}" id="couponnum" >
                    </div>
                    <div>
                            <label>paymentNumber/checkNumber :</label>
                            <input type="text" name="paymentNumber" required>                    
                    </div>
                    <div>
                        <label>total after discount : </label>
                        <input type="number" name="total"  value="{{$totalad}}" readonly>
                    </div>
                    <div>
                    <?php $totalpoint =  floor($total/100) *3 ?>
                        <label>pointReceived : </label>
                        <input  type="number" name="pointReceived" value="{{ $totalpoint }}" readonly>
                    </div>
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
                    <button type="submit"> PlaceOrder </button>
                </div>
            </form>
        </tfoot>
    </table>


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
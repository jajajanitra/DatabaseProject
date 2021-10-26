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
        <?php $k?>
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
                    <td data-th="Quantity"> 
                        <input type="number" value="{{ $j['quantity'] }}" class="form-control quantity" />
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
        <tr>
            <td><a href="{{ config('app.url')}}/products" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
        </tr>
        </tbody>
        <div>
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
                        <select name="orderType" required>
                            <option value="normal">normal</option>
                            <option value="preorder">preorder</option>
                        </select>
                    <div>
                        <label>couponNumber :</label>
                        <input type="nymber" name="couponNumber" >
                    </div>
                    <button class="btn btn-info btn-sm update-total" 
                    onclick="window.location.href=window.location.href"><i class="fa fa-refresh"></i></button>
                    <div>
                        <label>paymentNumber :</label>
                        <input type="number" name="paymentNumber" required>
                    </div>
                    <div>
                        <label>total : </label>
                        <input  type="number" name="total" value="{{ $total }}" readonly>
                    </div>
                    <div>
                    <?php $totalpoint =  floor($total/100) ?>
                        <label>pointReceived : </label>
                        <input  type="number" name="pointReceived" value="{{ $totalpoint }}" readonly>
                    </div>
                    @for ($p = 1; $p <= $i; $p++)
                    <input type="text" name="productCode[]" value="{{$k[$p][0]}}">
                    <input type="number" name="priceEach[]" value="{{$k[$p][1]}}">
                    <input type="number" name="buyPrice[]" value="{{$k[$p][1]}}">
                    <input type="number" name="quantityOrdered[]" value="{{$k[$p][2]}}">
                    <input type="text" name="productName[]" value="{{$k[$p][3]}}">
                    <input type="text" name="productLine[]" value="{{$k[$p][4]}}">
                    <input type="number" name="quantityInStock[]" value="{{$k[$p][5]}}">
                    <input type="text" name="productScale[]" value="{{$k[$p][6]}}">
                    <input type="text" name="productVendor[]" value="{{$k[$p][7]}}">
                    <input type="text" name="productDescription[]" value="{{$k[$p][8]}}">
                    <input type="number" name="MSRP[]" value="{{$k[$p][9]}}">
                    <input type="text" name="productStatus[]" value="{{$k[$p][10]}}">
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
        function passIDto(couponnumber,date){    
            window.location.href = '{{ url('/products/cart/usecoupon/') }}' + couponnumber + date ;
        }  
        $(".update-total").click(function (e) {
            var couponnum = document.getElementById("e").value;
            var orderdate = document.getElementById("orderdate").value;
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ url('/products/cart/usecoupon') }}',
                method: "put",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), couponNumber: ele.parents("tr").find(".couponNumber").val()},
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), couponNumber: ele.parents("tr").find(".orderdate").val()},
                success: function (response) {
                    window.location.reload();
                }
            });
        });
    </script>

@endsection
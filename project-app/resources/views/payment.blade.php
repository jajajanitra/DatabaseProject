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
        <label>Customer name : {{ $order -> customerNumber }}</label>
        <label>Point Balance : {{ $order -> pointReceived }}</label>
        <label>Order : {{ $order -> orderNumber }}</label>
        <label>patment number : {{ $order -> paymentNumber }}</label>

        <option value="in process">in process</option>

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
                    <td data-th="Quantity"> 
                        <input type="number" value="{{ $j['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $j['buyPrice'] * $j['quantity'] }}</td>
                    <td class="actions" data-th="">
                    <!-- this button is to update card -->
                    </form>
                    </td>
                </tr>
            @endforeach
            
        @endif
        <div>
            <label>total : ${{ $total }}</label>
        </div>
        </tbody>
        <tfoot>

        <tr>
            <td><a href="{{ config('app.url')}}/products" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
        </tr>
        </tfoot>
        <tfoot>

        <tr>
            <td><a href="{{ config('app.url')}}/order" class="btn btn-warning"><i class="fa fa-primary"></i> PlaceOrder </a></td>
        </tr>
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
    </script>

@endsection

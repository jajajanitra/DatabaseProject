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
                        <button class="btn btn-danger btn-sm remove-from-cart delete" data-id="{{ $id }}"><i class="fa fa-trash-o"></i>bhh</button>
                    </form>
    
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
        <tfoot>

        <tr>
            <td><a href="{{ config('app.url')}}/products" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
        </tr>
        </tfoot>
    </table>

@endsection


@section('scripts')


    <script type="text/javascript">
// this function is for update card
        $(".updatecart").click(function (e) {
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

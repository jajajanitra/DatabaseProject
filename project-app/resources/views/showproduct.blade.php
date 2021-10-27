@extends('layouts.store')
@section('content')
@section('title', 'Products')

<article>
<div class="headertext">Products</div>
    <div class="contenttext">
            <div class="table-showproducts" style="padding-top: 10px;">
                <table class="table-card" style="Width:1100px;">
                    <thead class="table-header">
                    <tr>
                        <th style="width: 400px;">Name</th>
                        <th style="width: 140px;">Scale</th>
                        <th style="width: 180px;">Vendor</th>
                        <th style="width: 130px;">Buyprice</th>
                        <th style="width: 110px;">Status</th>
                        <th style="width: 140px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach( $product as $product)
                        <tr class="table-row">
                        <td style="width: 400px;">{{ $product ->productName }}</td>
                        <td style="width: 120px;">{{ $product ->productScale }}</td>
                        <td style="width: 200px;">{{ $product ->productVendor }}</td>
                        <td style="width: 120px;">{{ $product ->buyPrice }}</td>
                        <td style="width: 140px;">{{ $product ->productStatus }}</td>
                        <td style="width: 120px;"><a href="{{url('/products/cart/addtocart',['id' => $product -> productCode])}}" class="button" style="text-decoration: none;"><button class="edit-btn" style="width:100px;">add to cart</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</article>

@endsection

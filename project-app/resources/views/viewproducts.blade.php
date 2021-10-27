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
                    <a href="{{ config('app.url')}}/stock-in/products/addproduct" class="addbtn-ali" style="text-decoration: none; position: absolute; left: 1220px; top: 150px;"><button class="add-btn">add product</button></a>
                        <div class="headertext">Products</div>
                        <div>
                            <table class="table-card" stlye="width:1100px;">
                                <thead class="table-header">
                                        <td style="width:100px;">Code</td>
                                        <td style="width:100px;">Name</td>
                                        <td style="width:100px;">Line</td>
                                        <td style="width:100px;">Scale</td>
                                        <td style="width:100px;">Vendor</td>
                                        <td style="width:100px;">Description</td>
                                        <td style="width:100px;">Quanitity</td>
                                        <td style="width:100px;">Buyprice</td>
                                        <td style="width:100px;">MSRP</td>
                                        <td style="width:100px;">Status</td>
                                        <td style="width:100px;"></td>
                                </thead>
                                <tbody>
                                    @foreach( $products as $product) 
                                        <tr class="table-row">
                                            <td style="width:100px;">{{ $product ->productCode }}</td>
                                            <td style="width:100px;">{{ $product ->productName }}</td>
                                            <td style="width:100px;">{{ $product ->productLine }}</td>
                                            <td style="width:100px;">{{ $product ->productScale }}</td>
                                            <td style="width:100px;">{{ $product ->productVendor }}</td>
                                            <td style="width:100px;"><span class="text-overflow">{{ $product ->productDescription }}</span></td>
                                            <td style="width:100px;">{{ $product ->quantityInStock }}</td>
                                            <td style="width:100px;">{{ $product ->buyPrice }}</td>
                                            <td style="width:100px;">{{ $product ->MSRP }}</td>
                                            <td style="width:100px;">{{ $product ->productStatus }}</td>
                                            <td style="width:83px;"> <a href="{{url('/stock-in/products/edit/' .$product->productCode)}}" style="text-decoration: none;"><button class="edit-btn"> edit </button></a></td>
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
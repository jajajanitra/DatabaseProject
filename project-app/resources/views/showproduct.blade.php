@extends('layouts.store')
@section('content')
@section('title', 'Products')

<article>
<div class="headertext">Products</div>
    <div class="contenttext">
            <div class="select-table"> 
                <h1>Catalog</h1>
                <botton><a href="{{ config('app.url')}}/products" class="select-table"><option>All product</option></a></botton>
            </div>
            <div class="Dropdown">
                <label>status</label>
                <form action="{{ url('/products/status/status') }}" method="GET">
                    @csrf
                    <select name="status" id="status" class="form-select" style="   border: 1px solid #EEEEEE; box-sizing: border-box; border-radius: 15px;">
                        <option value="0">Select Status</option>
                        @foreach( $productStatus as $status)
                        <option value="{{$status->productStatus}}">{{ $status->productStatus }}</option>   
                        @endforeach
                    </select>
                    <input type="submit" class="btn btn-danger btn-sm" value="select">
                </form>
                
                
            </div>
            <div class="table-showproducts" style="padding-top: 10px;">
                <table class="table-card" style="Width:1000px;">
                    <thead class="table-header">
                    <tr>
                        <th style="width: 400px;">Name</th>
                        <th style="width: 140px;">Scale</th>
                        <th style="width: 180px;">Vendor</th>
                        <th style="width: 130px;">Buyprice</th>
                        <th style="width: 110px;">Status</th>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</article>

@endsection

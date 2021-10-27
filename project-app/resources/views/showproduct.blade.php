<!DOCTYPE html>
<html lang="en">
@extends('layout')
@section('content')
@section('title', 'Products')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>showproduct</title>
</head>
<body>
    <div class="container">
            <div class="select-table"> 
                <h1>Catalog</h1>
                <botton><a href="{{ config('app.url')}}/products" class="select-table"><option>All product</option></a></botton>
            </div>
            <div class="Dropdown">
                <label>status</label>
                <form action="{{ url('/products/status') }}" method="GET">
                    @csrf
                    <select name="status" id="status">
                        <option value="0">Select Status</option>
                        @foreach( $productStatus as $status)
                        <option value="{{$status->productStatus}}">{{ $status->productStatus }}</option>   
                        @endforeach
                    </select>
                    <input type="submit" class="btn btn-danger btn-sm" value="select">
                </form>
                
                
            </div>

            <h2>All Product</h2>
            <div class="table-showproducts">
                <table>
                    <thead>
                        <th>Name</th>
                        <th>Scale</th>
                        <th>Vendor</th>
                        <th>Buyprice</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach( $product as $product)
                        <tr>
                            <td>{{ $product ->productName }}</td>
                            <td>{{ $product ->productScale }}</td>
                            <td>{{ $product ->productVendor }}</td>
                            <td>{{ $product ->buyPrice }}</td>
                            <td>{{ $product ->productStatus }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</body>
</html>

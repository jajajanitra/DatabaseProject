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

            <div class="Dropdown">
                
                <label>vendor</label>
                <form action="{{ url('/products/vendor/vendor') }}" method="GET">
                    @csrf
                    <select name="vendor" id="vendor">
                        <option value="0">Select Vendor</option>
                        @foreach( $productVendor as $vendor)
                        <option value="{{$vendor->productVendor}}">{{ $vendor -> productVendor }}</option>   
                        @endforeach
                    </select>
                    <input type="submit" class="btn btn-danger btn-sm" value="select">
                </form>

                <label>scale</label>
                <form action="{{ url('/products/scale/scale') }}" method="GET">
                    @csrf
                    <select name="scale" id="scale">
                        <option value="0">Select Scale</option>
                        @foreach( $productScale as $scale)
                        <option value="{{$scale->productScale}}">{{ $scale -> productScale }}</option>   
                        @endforeach
                    </select>
                    <input type="submit" class="btn btn-danger btn-sm" value="select">
                </form>

            </div>
        
        <h2>All Category</h2>
        <table class="table table-stripped">
	    	<thead>
	    	<tr>
                <th>Name</th>
                <th>Scale</th>
                <th>Vendor</th>
                <th>Buyprice</th>
	    	</tr>
	    	</thead>
	    	<tbody>
	    		@forelse($filter as $product )
	    		<tr>
	    		    <td>{{ $product ->productName }}</td>
                    <td>{{ $product ->productScale }}</td>
                    <td>{{ $product ->productVendor }}</td>
                    <td>{{ $product ->buyPrice }}</td>
                    <td>{{ $product ->productStatus }}</td>
                    <td><a href="{{url('/products/cart/addtocart',['id' => $product -> productCode])}}" class="button"><button>add to cart</button></a></td>
	    		</tr>
	    		@empty
	    		<p> No data Found </p>
	    		@endforelse
	    	</tbody>
	    </table>
    </div>
</body>
</html>

<script type='text/javascript'>
 (function()
 {
  if( window.localStorage ){
    if(!localStorage.getItem('firstReLoad')){
     localStorage['firstReLoad'] = true;
     window.location.reload();
    } else {
     localStorage.removeItem('firstReLoad');
    }
  }
 })();
</script>


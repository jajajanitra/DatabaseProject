@extends('layouts.store')
@section('content')
@section('title', 'Products')

<article>
    <div>
    <div class="headertext">Catalog</div>
    <div class="contenttext"> 
            <div class="dropdown">
                <form action="{{ url('/products/category/' .$status) }}" method="GET">
                    @csrf
                    <table>
                        <tr>
                            <td><label>vendor</label></td>
                    <td style="padding:10px;">
                    <select name="vendor" id="vendor" class="form-select" style="width:200px; border: 1px solid #EEEEEE; box-sizing: border-box; border-radius: 15px;">
                        <option value="0">Select Vendor</option>
                        @foreach( $productVendor as $vendor)
                        <option value="{{$vendor->productVendor}}">{{ $vendor -> productVendor }}</option>   
                        @endforeach
                    </select>
                    </td>
                    <td><label>scale</label></td>
                    <td style="padding:10px;">
                    <select name="scale" id="scale" class="form-select" style="width:200px; border: 1px solid #EEEEEE; box-sizing: border-box; border-radius: 15px;">
                        <option value="0">Select Scale</option>
                        @foreach( $productScale as $scale)
                        <option value="{{$scale->productScale}}">{{ $scale -> productScale }}</option>   
                        @endforeach
                    </select>
                </td>
                    <td><input type="submit" class="edit-btn" value="select" style="width:100px;"></td>
                </tr>
                </body>
                </form>
            </div>

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
</article>

@endsection

@section('scripts')


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

@endsection

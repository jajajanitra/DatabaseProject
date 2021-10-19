<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>showproduct</title>
</head>
<body>
    <div class="content">
        <div class="select-table"> 
            <h1>Catalog</h1>
                <botton><a href="{{ config('app.url')}}/products" class="select-table"><option>All product</option></a></botton>
                <botton><a href="{{ config('app.url')}}/products/vendor" class="select-table"><option>vendor</option></a></botton>
                <botton><a href="{{ config('app.url')}}/products/scale" class="select-table"><option>scale</option></a></botton>
                <botton><a href="{{ config('app.url')}}/preorder" class="select-table"><option>preorder</option></a></botton>
        </div>
        <div class="Dropdown">
            <form action="{{ route('filter',$vendor->id) }}" method="GET" style="margin-top: 20px;">
                <select name="vendor" id="input" onchange="filter(this.value)">
                    <option value="0">Select Vendor</option>
                    @foreach( $productVendor as $vendor)
                    <a href="{{route('filter',$vendor->id)}}">
                    <option value="{{$vendor->id}}">{{ $vendor->productVendor}}</option> 
                    </a>          
                    @endforeach
                </select>
                <input type="submit" class="btn btn-danger btn-sm" value="filter">
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
                    <td><a href="{{ config('app.url')}}/products/addtocart" class="button"><button>add to cart</button></a></td>
	    		</tr>
	    		@empty
	    		<p> No data Found </p>
	    		@endforelse
	    	</tbody>
	    </table>
    </div>
</body>
</html>

<script>
    function filter(id)
    {
        window.location.href = {{ URL::action('filter') }} + '/' + id;
</script>
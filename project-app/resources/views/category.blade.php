@extends('layouts.store')
@section('content')
@section('title', 'Products')

<article>
    <div>
    <div class="headertext">Catalog</div>
    <div class="contenttext"> 
            <div class="dropdown">
                <form action="{{ url('/products/category/' .$status) }}" method="GET" >
                    @csrf
                    <label>vendor</label>
                    <select name="vendor" id="vendor" class="form-select" style="width: 200px; border: 1px solid #EEEEEE; box-sizing: border-box; border-radius: 15px;">
                        <option value="0">Select Vendor</option>
                        @foreach( $productVendor as $vendor)
                        <option value="{{$vendor->productVendor}}">{{ $vendor -> productVendor }}</option>   
                        @endforeach
                    </select>
                    <label style="padding-top:10px;">scale</label>
                    <select name="scale" id="scale" class="form-select" style="width:200px; border: 1px solid #EEEEEE; box-sizing: border-box; border-radius: 15px;">
                        <option value="0">Select Scale</option>
                        @foreach( $productScale as $scale)
                        <option value="{{$scale->productScale}}">{{ $scale -> productScale }}</option>   
                        @endforeach
                    </select>
                    <div style="padding-top:10px;">
                    <input type="submit" class="edit-btn" value="select" style="width:150px;">
                    </div>
                </form>
            </div>
        

        <table class="table-card" style="Width:1100px; margin-top:10px;">
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
                @forelse($filter as $product )
                <tr class="table-row">
                    <td style="width: 400px;">{{ $product ->productName }}</td>
                    <td style="width: 120px;">{{ $product ->productScale }}</td>
                    <td style="width: 200px;">{{ $product ->productVendor }}</td>
                    <td style="width: 120px;">{{ $product ->buyPrice }}</td>
                    <td style="width: 140px;">{{ $product ->productStatus }}</td>
                    <td style="width: 120px;"><a href="{{url('/products/cart/addtocart',['id' => $product -> productCode])}}" class="button"><button class="edit-btn" style="width:100px;">add to cart</button></a></td>
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


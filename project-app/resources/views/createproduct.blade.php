@extends('layouts.app')

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
                    <nav>
                        <div class="nav-header">Management</div>
                        <p class="menubar1"></p>
                        <a href="{{ url('/stock-in') }}" class="nav-subheader-1">stock-in</a>
                        <p class="submenubar1" style></p>
                        <a href="{{ url('/stock-inadd') }}" class="nav-sub-subheader-1">add stock-in</a>
                        <p class="submenubar2" style></p>
                        <a href="{{ url('/stock-in/products') }}" class="nav-sub-subheader-2">edit product</a>
                        <p class="menubar2" style></p>
                        <a href="{{ url('/order') }}" class="nav-subheader-2">order</a>
                        <p class="menubar3" style></p>
                        <a href="{{ url('/customer') }}" class="nav-subheader-3">customer</a>
                        <p class="menubar4" style></p>
                        <a href="{{ url('/employee') }}" class="nav-subheader-4">employee</a>
                        <p class="submenubar3" style></p>
                        <a href="{{ url('/erm/' .Auth::user()->username) }}" class="nav-sub-subheader-3">ERM</a>
                    </nav>
                    <article>  
                        <div class="headertext">Add product</div>
                        <div class="subtext" style="color:#000000;">
                            <form method="POST" action="{{ config('app.url')}}/stock-in/products/addproduct">
                            @csrf  
                            <div class="form-input">
                                <div>
                                    <label style="padding-top: 10px; position: absolute; left:600px; top: 197px;">Product code</label>
                                    <input type="text" name="productCode" required class="input-box" style="position: absolute; left: 750px; top: 205px;">  
                                </div>
                                <div>
                                <label style="padding-top: 10px; position: absolute; left:665px; top: 240px;">Name</label>
                                    <input type="text" name="productName"  required class="input-box" style="position: absolute; left: 750px; top: 247px;"> 
                                </div>
                                <div>
                                    <label style="padding-top: 10px; position: absolute; left:683px; top: 284px;">Line</label>
                                    <select name="productLine" class="form-select" style=" width:300px; box-sizing: border-box; border: 1px solid #EEEEEE; font-size: 14px; color: #7E7E7E; border-radius: 15px; position: absolute; left: 750px; top: 290px;">
                                    <option value="none" selected disabled hidden> Select product line </option>
                                        @foreach ($productlines as $productline)
                                        <option value="{{$productline->productLine}}">{{ $productline->productLine }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                <label style="padding-top: 10px; position: absolute; left:669px; top: 328px;">Scale</label>
                                    <input type="text" name="productScale" required class="input-box" style="position: absolute; left: 750px; top: 335px;">  
                                </div>
                                <div>
                                <label style="padding-top: 10px; position: absolute; left:653px; top: 372px;">Vendor</label>
                                    <input type="text" name="productVendor" required class="input-box" style="position: absolute; left: 750px; top: 380px;"> 
                                </div>
                                <div>
                                    <label style="padding-top: 10px; position: absolute; left:620px; top: 417px;">Description</label>
                                    <input type="text" name="productDescription" required class="input-box" style="position: absolute; left: 750px; top: 425px;">
                                </div>
                                <div>
                                    <label style="padding-top: 10px; position: absolute; left:640px; top: 462px;">Quanitity</label>
                                    <input type="number" min="0" name="quantityInStock" min=0 required class="input-box" style="position: absolute; left: 750px; top: 470px;">
                                </div>
                                <div>
                                    <label style="padding-top: 10px; position: absolute; left:643px; top: 507px;">Buyprice</label>
                                    <input type="number" min="1" name="buyPrice" min=1 required class="input-box" style="position: absolute; left: 750px; top: 515px;">
                                </div>
                                <div>
                                <label style="padding-top: 10px; position: absolute; left:672px; top: 552px;">MSRP</label>
                                    <input type="number" min="1" name="MSRP" min=1 required class="input-box" style="position: absolute; left: 750px; top: 560px;"> 
                                </div>
                                <div>
                                    <label style="padding-top: 10px; position: absolute; left:662px; top: 597px;">Status</label>
                                    <select name="productStatus" class="form-select" style=" width:300px; box-sizing: border-box; border: 1px solid #EEEEEE; font-size: 14px; color: #7E7E7E; border-radius: 15px; position: absolute; left: 750px; top: 605px;">
                                        <option value="none" selected disabled hidden> Select status </option>
                                        <option value="normal">normal</option>
                                        <option value="preorder">preorder</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="submit-btn" style="position: absolute; left:920px; top: 655px;">Update</button>
                            </div>
                            </form>
                        </div>
                        <a href="{{ config('app.url')}}/stock-in/products" style="text-decoration: none;"><button class="cancel-btn" style="position: absolute; left:795px; top: 655px;">Cancel</button></a>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
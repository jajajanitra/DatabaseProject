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
                        <div class="contenttext">
                        <div class="headertext">Add Stock-In</div>
                        <div class="contentext">
                            <form method="POST" action="{{ config('app.url')}}/stock-inadd">
                            @csrf        
                            <div class="form-input">
                                    <div>
                                        <label style="padding-top: 10px; position: absolute; left:590px; top: 197px;">stockInNumber</label>
                                        <input type="number" name="stockInNumber" class="input-box" style="position: absolute; left: 750px; top: 205px;">  
                                    </div>
                                    <div>
                                        <label style="padding-top: 10px; position: absolute; left:564px; top: 240px;">employeeNumber</label>
                                        <input type="number" name="employeeNumber" class="input-box" style="position: absolute; left: 750px; top: 247px;">  
                                    </div>
                                    <div>
                                        <label style="padding-top: 10px; position: absolute; left:604px; top: 284px;">Product code</label>
                                        <input type="text" name="productCode" class="input-box" style="position: absolute; left: 750px; top: 290px;">  
                                    </div>
                                    <div>
                                        <label style="padding-top: 10px; position: absolute; left:652px; top: 328px;">Amount</label>
                                        <input type="number" min="0" name="quantityToOrder" class="input-box" style="position: absolute; left: 750px; top: 335px;">
                                    </div>
                                    <div>
                                        <label style="padding-top: 10px; position: absolute; left:683px; top: 372px;">Date</label>
                                        <input type="date" name="date" class="input-box" style="position: absolute; left: 750px; top: 380px;">
                                    </div>
                                    <button type="submit" class="submit-btn" style="position: absolute; left:900px; top: 430px;">Confirm</button>
                                </div>
                                <a href="{{ config('app.url')}}/stock-inadd" style="text-overflow: ellipsis;"><button class="cancel-btn" style="position: absolute; left:775px; top: 430px;">Cancel</button></a>
                            </form>
                        </div>  
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
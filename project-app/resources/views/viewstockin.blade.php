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
                    <div> <a href="{{ config('app.url')}}/stock-inadd" class="addbtn-ali" style="text-decoration: none; position: absolute; left: 900px; top: 150px;"><button class="add-btn">add stockin</button></a></div>
                        <div class="headertext">Stock-in</div>
                        <div class="contenttext">
                            <table class="table-card" style="width: 750px;">
                                <thead class="table-header">
                                    <td style="width:150px; text-align:center;">stockInNumber</td>
                                    <td style="width:150px; text-align:center;">productCode</td>
                                    <td style="width:150px; text-align:center;">employeeNumber</td>
                                    <td style="width:150px; text-align:center;">quantityToOrder</td>
                                    <td style="width:150px; text-align:center;">date</td>
                                </thead>
                                <tbody>
                                    @foreach( $stockins as $stockin)
                                    <tr class="table-row">
                                        <td style="width:150px; text-align:center;">{{ $stockin ->stockInNumber}}</td>
                                        <td style="width:150px; text-align:center;">{{ $stockin ->productCode}}</td>
                                        <td style="width:150px; text-align:center;">{{ $stockin ->employeeNumber}}</td>
                                        <td style="width:150px; text-align:center;">{{ $stockin ->quantityToOrder }}</td>
                                        <td style="width:130px; text-align:center;">{{ $stockin ->date}}</td>
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
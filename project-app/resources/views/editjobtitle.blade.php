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
                        <a href="{{ url('/stock-inadd') }}" class="nav-sub-subheader-2">edit product</a>
                        <p class="menubar2" style></p>
                        <a href="{{ url('/order') }}" class="nav-subheader-2">order</a>
                        <p class="menubar3" style></p>
                        <a href="{{ url('/customer') }}" class="nav-subheader-3">customer</a>
                        <p class="menubar4" style></p>
                        <a href="{{ url('/employee') }}" class="nav-subheader-4">employee</a>
                        <p class="submenubar3" style></p>
                        <a href="{{ url('/erm') }}" class="nav-sub-subheader-3">ERM</a>
                    </nav>
                    <article>  
                        <div class="headertext">Employee's information</div>
                            <div class="subtext">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                    <div style="color: #000000; padding-top: 25px;">Employee No. : <label style="color: #7E7E7E;">{{ $employee -> employeeNumber}}</label></div>
                                    <div style="color: #000000; padding-top: 10px;">Name :  <label style="color: #7E7E7E;">{{ $employee -> firstName}} {{ $employee -> lastName}}</label></div>
                                    <div style="color: #000000; padding-top: 10px;">Job title : <label style="color: #7E7E7E;">{{ $employee -> jobTitle }}</label></div>
                                    <form method="POST" action="{{url('/erm/edit/' .$employee->employeeNumber)}}">
                                    @csrf  
                                    @method('PUT')
                                    <label style="color: #000000; padding-top: 10px;">Promote/Demote to :</label>
                                    <select name="jobTitle" class="form-select" style="width:250px;"> 
                                                <option value="none" selected disabled hidden> Select an Option </option>
                                                <option value="Sales Manager (APAC)">Sales Manager (APAC)</option>
                                                <option value="Sale Manager (EMEA)">Sale Manager (EMEA)</option>
                                                <option value="Sales Manager (NA)">Sales Manager (NA)</option>
                                                <option value="Sales Rep">Sales Rep</option>
                                    </select>
                                        <div>
                                            <button type="submit" class="submit-btn" style = "position: absolute; left: 480px; top: 450px;">Update</button>
                                        </div>
                                    </form>
                                    <a href="{{ config('app.url')}}/erm" style="text-decoration: none;">
                                    <button class="cancel-btn" style = "position: absolute; left: 360px; top: 450px;">Cancel</button>
                                    </a>
                            </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
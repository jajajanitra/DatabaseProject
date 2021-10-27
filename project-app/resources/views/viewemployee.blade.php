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
                        <div class="headertext">Employee Information</div>
                        <div>
                            <table class="table-card" style="width:1100px;">
                                <thead class="table-header">
                                    <td style="width:80px; text-align: center;">Emp No.</td>
                                    <td style="width:135px;">First name</td>
                                    <td style="width:135px;">Last name</td>
                                    <td style="width:135px;">extension</td>
                                    <td style="width:220px; text-align: center;">email</td>
                                    <td style="width:115px; text-align: center;">Office code</td>
                                    <td style="width:135px; text-align: center;">Reports to</td>
                                    <td style="width:135px; text-align: center;">Job title</td>
                                </thead>
                                <tbody>
                                    @foreach( $employees as $employee) 
                                        <tr class="table-row">
                                            <td style="width:80px; text-align: center;">{{ $employee ->employeeNumber}}</td>
                                            <td style="width:135px;">{{ $employee ->firstName}}</td>
                                            <td style="width:135px;">{{ $employee ->lastName}}</td>
                                            <td style="width:80px;">{{ $employee ->extension}}</td>
                                            <td style="width:245px; word-wrap: break-word;">{{ $employee ->email}}</td>
                                            <td style="width:115px; text-align: center;">{{ $employee ->officeCode}}</td>
                                            <td style="width:100px; text-align: center;">{{ $employee ->reportsTo}}</td>
                                            <td style="width:190px; text-align: center;">{{ $employee ->jobTitle}}</td>
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
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
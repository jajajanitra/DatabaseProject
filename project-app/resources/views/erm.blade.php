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
                        <div class="headertext">Employee Resource Management</div>
                        <div class="contenttext">
                            <table class="table-card" style="width:620px;">
                                <thead class="table-header">
                                    <td style="width:120px;">Employee No.</td>
                                    <td style="width:120px;">First name</td>
                                    <td style="width:120px;">Last name</td>
                                    <td style="width:120px;">Job title</td>
                                    <td style="width:120px;"></td>
                                </thead>
                                <tbody>
                                    @foreach( $employees as $employee)
                                    <tr class="table-row">
                                        <td style="width:120px; padding-left: 35px;">{{ $employee -> employeeNumber }}</td>
                                        <td style="width:120px;">{{ $employee -> firstName }}</td>
                                        <td style="width:120px;">{{ $employee -> lastName }}</td>
                                        <td style="width:120px;">{{ $employee -> jobTitle }}</td>
                                        <td style="width:120px;"> <a href="{{url('/erm/edit/' .$employee->employeeNumber)}}" style="text-decoration: none;"><button class="edit-btn"> edit </button></a></td>
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
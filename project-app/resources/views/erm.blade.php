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
                        <div class="headertext">Employee Resource Management</div>
                        <div class="table-erm">
                            <table class="tableerm-card">
                                <thead class="tableerm-header">
                                    <td style="width:120px;">Employee No.</td>
                                    <td style="width:120px;">First name</td>
                                    <td style="width:120px;">Last name</td>
                                    <td style="width:120px;">Job title</td>
                                    <td style="width:120px;"></td>
                                </thead>
                                <tbody>
                                    @foreach( $employees as $employee)
                                    <tr class="tableerm-row">
                                        <td style="width:120px; padding-left: 35px;">{{ $employee -> employeeNumber }}</td>
                                        <td style="width:120px;">{{ $employee -> firstName }}</td>
                                        <td style="width:120px;">{{ $employee -> lastName }}</td>
                                        <td style="width:120px;">{{ $employee -> jobTitle }}</td>
                                        <td style="width:120px;"> <a href="{{url('/erm/edit/' .$employee->employeeNumber)}}" style="text-decoration: none;"><button class="edit-button"> edit </button></a></td>
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
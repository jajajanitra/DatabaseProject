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
                                <p style="padding-top: 10px;">Employee No. : {{ $employee -> employeeNumber}}</p>
                                <p>Name : {{ $employee -> firstName }} {{ $employee -> lastName}}</p>
                                <p>Email : {{ $employee -> email}}</p>
                                <p>Job title : {{ $employee -> jobTitle}}</p>
                            </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
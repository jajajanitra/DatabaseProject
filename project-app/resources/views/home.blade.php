@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Employee's information</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5> Name : {{ Auth::user()->name }} </h5>
                    <h5>Email : {{ Auth::user()->email }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

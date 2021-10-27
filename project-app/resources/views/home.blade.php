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
                            <div class="headertext">Login Success!</div>
                            <div class="subtext">Welcome! {{ Auth::user()->name }}</div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
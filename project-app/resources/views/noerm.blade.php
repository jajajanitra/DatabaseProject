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
                        <div class="headertext">Permission Denied!</div>
                            <div class="subtext">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <b>You do not have permission to access this functionality!</b>
                                <p>Only employees in Sales department are allowed to access this functionality.</p>
                            </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
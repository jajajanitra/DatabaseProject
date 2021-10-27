<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Store') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/headerSty.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- cart extension-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>@yield('title')</title>
</head>
<body>
    <div id="app" class="uni">
    <header>    
            <div>
            <div class="dropdown">
                <a class="user" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="outline: none;">
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="border-radius: 15px; border: 1px solid #EEEEEE;">
                    <a class="dropdown-item" href="{{ url('/employee/' .Auth::user()->username)}}" style="text-align:center; pading:2px;">user</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-align:center; pading:2px;">
                {{ __('logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
            </form>
                </div>
                </div>
            <!-- <div class="cart"></div> -->
            <div class="circle"></div>
            <a class="store-text" href="{{ url('/products') }}">{{ __('Store')}} </a>  
            
        </div>
        </header>
        <nav>
                        <div class="nav-header">Explore</div>
                        <p class="menubar1"></p>
                        <a href="{{ url('/products/category/normal') }}" class="nav-subheader-1">catalog</a>
                        <p class="menubar2" style="top:257px;"></p>
                        <a href="{{ url('/products/category/preorder') }}" class="nav-subheader-2" style="top:250px;">pre-order</a>
                    </nav>

        <main>
            @yield('content')
        </main>
        <div>
        @if(session('cart'))
                <a href="{{ url('/products/cart') }}" class="cart">
                    <!-- this code count product of choose tha user choose -->
                    <div class="badge badge-pill badge-danger" style="position: absolute; top: 15px; right: 10px;">{{ count(session('cart')) }}</div>
                </a>
        </div>
        <div class="col-sm-4 text-center">
            @if(session('success'))
            <p class="btn-success  mt-3 mb-3 btn-block session" style='padding: .375rem .75rem;'>{{ session('success') }}</p>
        </div>
            @endif
            <!-- if user dont choose any product -->
            @else
            <a href="" class="cart" role="button">
            </a> 
            @endif 
        </div>
    </div>
    @yield('scripts')

<script>
    $("a").click(function () {
        $(".session").visibility(2);
        });
        
</script>

<style>
    .session{
        visibility:hidden ;
    }
    body{
        background-color: #fff;
    }
</style>
</body>
</html>

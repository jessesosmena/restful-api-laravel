<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        Itm Mobile Shop
    </title>
    <link rel="stylesheet" href="{{asset('dist/css/foundation.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/css/style.css')}}"/>


</head>
<body>
<div style="background-color: teal; border-bottom: teal;" class="top-bar">
    <div style="color:white;padding: 10px;" class="top-bar-right">
           
                <a style="text-decoration: none;" href="{{route('cart.index')}}"> <!--- Route Controller Cart/index -->
                    <i class="fa fa-shopping-cart fa-2x" aria-hidden="true">
                    </i>
                    Cart
                    <span class="alert badge">
                      {{Cart::count()}} <!--- Return Cart count -->
                    </span>
                </a>
    </div>
    <div class="top-bar-left">
        <ol class="menu">
            <li>
                <a style="text-decoration: none;" href="{{route('home')}}">
                    Home
                </a>
            </li>
            @if (!Auth::check())
            <li>
                <a style="text-decoration: none;" href="{{route('login')}}">
                    Login
                </a>
            </li>
            <li>
                <a style="text-decoration: none;" href="{{url('/register')}}">
                    Register
                </a>
            </li>
            @else
            <li>
                <a style="text-decoration: none;" href="{{url('/logout')}}">
                    Logout
                </a>
            </li>
            @endif
        </ol>
    </div>
</div>

@yield('content')

<footer class="footer">
    <div class="row">
             
    &copy Copyright 2016: Design by Jesse Jay
     
    </div>
</footer>

<script src="{{asset('dist/js/vendor/jquery.js')}}"></script>
<script src="{{asset('dist/js/app.js')}}"></script>
</body>
</html>

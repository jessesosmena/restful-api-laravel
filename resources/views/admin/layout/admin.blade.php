<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" href="{{asset('dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/parsley.css')}}">
</head>
<body>

@include('admin.layout.includes.header') <!--- admin/layout/includes/header.blade.php -->

<div class="page-content">
        @if(Session::has('message'))
            <div class="alert alert-info">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    <div class="row">
        @include('admin.layout.includes.sidenav') <!--- admin/layout/includes/sidenav.blade.php -->
        <div class="col-md-10 display-area">
            <div class="row text-center">
                <div class="col-md-10 col-md-offset-1">
                    <div class="content-box-large">
                        @yield('content') 
                    </div>
                </div>
            </div>
        </div><!--/Display area after sidenav-->
    </div>

</div><!--/Page Content-->

<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/parsley.min.js')}}"></script>

<script>

    $(document).ready(function () {
        $(".submenu > a").click(function (event) {
            event.preventDefault();

            var $ul = $(this).next("ul"); 

            $ul.slideToggle(150); 
          
        });

    });

</script>

@yield('js')
</body>
</html>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h3><a href="{{route('admin.index')}}">My Admin</a></h3>
                </div>
            </div>

            <div class="col-md-2 pull-right">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <b class="caret"></b></a> <!--- Displays name of user who logged in -->

                                <ul class="dropdown-menu animated fadeInUp">
                                    <li><a href="{{url('/')}}">Front Page</a></li>
                                    <li><a href="{{url('/logout')}}">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
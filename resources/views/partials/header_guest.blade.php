<div class="page-header-top">
    <div class="container">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{url('/')}}">
                <img src="{{asset('img/FUJI-LOGO.png')}}" alt="logo" class="logo-default" width="160px" height="40px"   >
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler"></a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown dropdown-user dropdown-dark">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="../assets/layouts/layout3/img/avatar9.jpg')}}">
                        <span class="username username-hide-mobile">My account</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                        @if (!Auth::user())
                            <li><a href="{{url('/register')}}"> <i class="icon-user"></i> Sign up</a></li>
                            <li><a href="{{url('/login')}}"><i class="icon-envelope-open"></i>Sign in</a></li>

                        @else
                            @if (Auth::user()->group_id==1)
                                <li><a href="{{url('/admin/stock')}}"><i class="icon-user"></i>Admin : {{Auth::user()->name}}</a></li>

                            @else
                                <li><a href="{{url('/home/stock')}}"><i class="icon-user"></i> User : {{Auth::user()->name}}</a></li>
                            @endif


                            <li>

                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();"><i class="icon-key"></i>
                                    Logout
                                </a>
                                {!! Form::open(['method' => 'POST', 'url' => 'logout','id'=>'logout-form']) !!}



                                {{ csrf_field() }}
                            {!! Form::close() !!}
                            @endif


                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->

                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
</div>
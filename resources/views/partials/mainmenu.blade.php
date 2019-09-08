<div class="page-header-menu">
    <div class="container">

        <!-- BEGIN MEGA MENU -->
        <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
        <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
        <div class="hor-menu  ">
            <ul class="nav navbar-nav">
                <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  ">
                    <img src="{{asset('img/FUJI-LOGO.png')}}" alt="logo" class="logo-default"  height="50px"   >
                        <span class="arrow"></span>
                    </a>

                </li>

                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:;"> Dashboard
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li aria-haspopup="true" class=" ">
                            <a  class="nav-link  ">
                                <i class="icon-bar-chart"></i> Comming Soon 1
                                <span class="badge badge-success">1</span>
                            </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a  class="nav-link  ">
                                <i class="icon-bulb"></i> Comming Soon 2 </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a  class="nav-link  ">
                                <i class="icon-graph"></i> Comming Soon 3
                                <span class="badge badge-danger">3</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  ">
                    <a href="javascript:;"> Service Dept
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li aria-haspopup="true" class=" ">
                            <a href="{{ url('admin/fujiservice') }}"> Head Repair Center </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="{{ url('admin/report') }}"> Report</a>
                        </li>


                    </ul>
                </li>


                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:;"> Inventory
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li aria-haspopup="true" class=" ">
                            <a href="{{ url('admin/stock_advance') }}" class="nav-link  ">Stock</a>
                        </li>

                        <li aria-haspopup="true" class=" ">
                            <a href="{{ url('admin/instock') }}" class="nav-link  ">Instock </a>
                        </li>
                        @if($isAdmin)
                        <li aria-haspopup="true" class=" ">
                            <a href="{{ url('admin/outstock') }}" class="nav-link ">Out & Return stock</a>
                        </li>
                         @endif
                                               
                    </ul>
                </li>
                @if (!Auth::user())
                @elseif(Auth::user()->group_id==1))
                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:;"> Database
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li aria-haspopup="true" class=" ">
                            <a href="{{ url('admin/partpricelist') }}">  Part Price List </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="{{ url('admin/headtype') }}"> Head Type </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="{{ url('admin/customer') }}"> Customer </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="{{ url('admin/user') }}"> User </a>
                        </li>

                    </ul>
                </li>
                @endif
                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:;"> My account
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        @if (!Auth::user())
                            <li><a href="{{url('/register')}}"> <i class="icon-user"></i> Sign up</a></li>
                            <li><a href="{{url('/login')}}"><i class="icon-envelope-open"></i>Sign in</a></li>

                        @else
                            @if (Auth::user()->group_id==1)
                                <li><a href="{{url('/admin/fujiservice')}}"><i class="icon-user"></i> Admin : {{Auth::user()->name}}</a></li>

                            @else
                                <li><a href="{{url('/')}}"><i class="icon-user"></i> User : {{Auth::user()->name}}</a></li>
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

               
            </ul>
        </div>
        <!-- END MEGA MENU -->
    </div>
</div>
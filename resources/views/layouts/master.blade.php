<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Store Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/libs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/libsstyle.css') }}" rel="stylesheet">

    {{--<script src="//cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>--}}

    @yield('styles')

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{url('/')}}" class="site_title"><i class="fa fa-briefcase"></i> <span>Store</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="{{ Auth::user()->photo ? URL::asset(Auth::user()->photo->file) : URL::asset('/images/user.png') }}" alt="" class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{ Auth::user()->name }}</h2>
						<br>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->

                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>{{ Auth::user()->name }}</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-users"></i> Customers <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('customer')}}">Manage Customers</a></li>
                                    <li><a href="{{route('customer.create')}}">Add Customer</a></li>
                                </ul>
                            </li>
                        
                            <li><a><i class="fa fa-cart-plus"></i> Shop <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('shop')}}">Manage Shop</a></li>
                                    <li><a href="{{route('shop.create')}}">Add Shop</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-flag"></i> Company <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('company')}}">Manage Company</a></li>
                                    <li><a href="{{route('company.create')}}">Add Company</a></li>
                                </ul>
                            </li> 
                        
                        </ul>
                    </div>


                </div>
                <!-- /sidebar menu -->

        
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                  
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="{{ Auth::user()->photo ? URL::asset(Auth::user()->photo->file) : URL::asset('/images/user.png') }}" alt="">{{ Auth::user()->name }}
                                <span class="fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                              
                                <li>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                </li>
                            </ul>
                        </li>
                      

                       
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" >
            <div class="content">
            <!-- @include('includes.message') -->
                @yield('content')
            </div>
            
            <div class="bg-footer">
            </div>
        </div>
        <!-- /page content -->
        
        <!-- footer content -->
        <footer>
      
            <div class="clearfix"></div>

            {{-- @yield('footer') --}}
        </footer>
        <!-- /footer content -->
    </div>
</div>

<script src="{{ asset('js/libs.js') }}"></script>
@yield('scripts')
<script>
    $(document).ready(function(){
        //CKEDITOR.replace('body');

        // Initialize tooltip
        $('[data-toggle="tooltip"]').tooltip();

        $alert = $(".alert-message");

        if ($alert) {
            // Fade in alert when closing
            $alert.addClass("in");

            // Set auto fadein
            setTimeout(function(){
                $alert.fadeTo("slow", 0.1).slideUp("slow", function() {
                    $(this).remove();
                });
            }, 3000);
        }
    });
</script>

</body>
</html>
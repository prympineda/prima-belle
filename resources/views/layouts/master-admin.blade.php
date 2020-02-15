<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Primabelle - @yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="{{ asset('dashboard/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    {{-- <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet"> --}}
    <!-- Chartist -->
    <link href="{{ asset('dashboard/plugins/chartist/css/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css"> --}}

    <!-- Custom Stylesheet -->
    {{-- <link href="css/style.css" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('dashboard/plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet"> --}}
    {{-- <link href="./plugins/sweetalert/css/sweetalert.css" rel="stylesheet"> --}}

    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <style>

        /* product area */
.product-wrapper{
    margin-bottom: 50px;
}
.product-wrapper,
.product-img {
    overflow: hidden;
    position: relative;
    min-width: 270px;
    /* max-height: 326px; */
}
.product-img img {
    width: 100%;
}
.product-action {
    bottom: 0px;
    left: 0;
    opacity: 0;
    position: absolute;
    right: 0;
    text-align: center;
    transition: all 0.6s ease 0s;
}
.product-wrapper:hover .product-action {
    bottom: 20px;
    opacity: 1;
}
.product-content {
    padding-top: 15px;
}
.product-content > h4 {
    color: #646464;
    font-size: 16px;
    margin: 0;
}
.product-content > h4 a {
    color: #646464;
}
.product-content > h4 a:hover,
.product-action-style > a:hover {
    color: #f3a395;
}
.product-rating i {
    color: #f3a395;
    font-size: 16px;
    margin: 0 3px;
}
.product-rating {
    margin: 11px 0 9px;
}
.product-price > span.old {
    font-size: 14px;
    font-weight: 400;
    text-decoration: line-through;
}
.product-price > span {
    color: #646464;
    display: inline-block;
    font-size: 20px;
    font-weight: 500;
    margin: 0 2px;
}
.product-action-style {
    background-color: #fff;
    box-shadow: 0 0 8px 1.7px rgba(0, 0, 0, 0.06);
    display: inline-block;
    padding: 16px 2px 12px;
}
.product-action-style > a {
    color: #979797;
    line-height: 1;
    padding: 0 21px;
    position: relative;
}
.product-action-style > a.action-plus {
    font-size: 18px;
}
.product-action-style > a.action-heart {
    font-size: 16px;
}
.product-action-style > a.action-cart {
    font-size: 20px;
    position: relative;
    top: 2px;
}
.product-action-style > a::before {
    background: #d2d2d2 none repeat scroll 0 0;
    content: "";
    height: 28px;
    position: absolute;
    right: 2px;
    top: -5px;
    width: 1px;
}
.product-action-style > a:last-child::before {
    display: none;
}
.product-img > span {
    background-color: #fff;
    box-shadow: 0 0 8px 1.7px rgba(0, 0, 0, 0.06);
    color: #333;
    display: inline-block;
    font-size: 12px;
    font-weight: 500;
    left: 20px;
    letter-spacing: 1px;
    padding: 3px 12px;
    position: absolute;
    text-align: center;
    text-transform: uppercase;
    top: 20px;
}
.product-img img {
    transition: all 1.5s ease 0s;
    width: 100%;
}
.product-wrapper:hover .product-img img {
    transform: scale(1.2);
}
           

    </style>
 @yield('custom-css');
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="#">
                    {{-- <b class="logo-abbr"><img src="dashboard/images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="dashboard/images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="dashboard/images/logo-text.png" alt="">
                    </span> --}}
                    <h2>Primabelle</h2>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="fas fa-bars"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        {{-- <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-2">5</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events near you</h6>
                                                    <span class="notification-text">Within next 5 days</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Started</h6>
                                                    <span class="notification-text">One hour ago</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Ended Successfully</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events to Join</h6>
                                                    <span class="notification-text">After two days</span> 
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li> --}}
                        <li class="icons dropdown"> {{Auth::user()->name}} </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="/dashboard/images/user/form-user.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="{{ route('admin.change-password') }}"><i class="icon-user"></i> <span>Change Password</span></a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        {{-- <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li> --}}
                                        <li>
                                            <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                          
                                     
     
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             @csrf
                                         </form>

                                            <i class="icon-key"></i> <span>   {{ __('Logout') }}</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
    
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href=" {{ route('admin.dashboard') }} " aria-expanded="false">
                            <i class="fas fa-tachometer-alt"></i><span class="nav-text"> Dashboard</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-boxes"></i><span class="nav-text"> Products</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href=" {{route('admin.add-product')}} ">Add Product</a></li>
                            <li><a href=" {{route('admin.view-swen-sole-doll-shoes')}} ">Swen Sole Doll Shoes</a></li>
                            <li><a href=" {{route('admin.view-mules')}} ">Mules</a></li>
                            <li><a href=" {{route('admin.view-doll-shoes')}} ">Doll Shoes</a></li>
                            <li><a href=" {{route('admin.view-half-inch')}} ">Half Inch Heels</a></li>
                            <li><a href=" {{route('admin.view-two-inches')}} ">Two Inches Heels</a></li>
                            <li><a href=" {{route('admin.view-all-products')}} ">All Products</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-shopping-cart"></i><span class="nav-text"> Orders</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href=" {{route('admin.reserved-orders')}} ">Reserved Orders</a></li>
                            <li><a href=" {{route('admin.sold-orders')}} ">Sold Orders</a></li>
                        </ul>
                    </li>
                    @if (Auth::user()->role_id == 1)
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-users"></i><span class="nav-text"> Users</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a >Add User</a></li>
                            <li><a >Manage Users</a></li>
                        </ul>
                    </li>
                    @endif
                    <li>
                        <a href=" {{ route('admin.activity-logs') }} " aria-expanded="false">
                            <i class="fas fa-history"></i><span class="nav-text"> Activity Log</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
             @yield('content')
            <!-- #/ container -->
        </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Primabelle 2020. All Rights Reserved.</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    
    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('dashboard/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/custom.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/settings.js') }}"></script>
    <script src="{{ asset('dashboard/js/gleek.js') }}"></script>
    <script src="{{ asset('dashboard/js/styleSwitcher.js') }}"></script>



{{-- 
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script> --}}

    <!-- Chartjs -->
    <script src="{{ asset('dashboard/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    {{-- <script src="./plugins/chart.js/Chart.bundle.min.js"></script> --}}

    <!-- Circle progress -->
    <script src="{{ asset('dashboard/plugins/circle-progress/circle-progress.min.js') }}"></script>
    {{-- <script src="./plugins/circle-progress/circle-progress.min.js"></script> --}}

    <!-- Datamap -->
    <script src="{{ asset('dashboard/plugins/d3v3/index.js') }}"></script>
    <script src="{{ asset('dashboard/topojson/topojson.min.js') }}"></script>
    <script src="{{ asset('dashboard/datamaps/datamaps.world.min.js') }}"></script>
    {{-- <script src="./plugins/d3v3/index.js"></script>
    <script src="./plugins/topojson/topojson.min.js"></script>
    <script src="./plugins/datamaps/datamaps.world.min.js"></script> --}}

    <!-- Morrisjs -->
    <script src="{{ asset('dashboard/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/morris/morris.min.js') }}"></script>
    {{-- <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script> --}}

    <!-- Pignose Calender -->
    <script src="{{ asset('dashboard/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    {{-- <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script> --}}

    <!-- ChartistJS -->
    <script src="{{ asset('dashboard/plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>
    {{-- <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script> --}}

    <script src="{{ asset('dashboard/js/dashboard/dashboard-1.js') }}"></script>
    {{-- <script src="./js/dashboard/dashboard-1.js"></script> --}}
    <script src="{{ asset('js/all.js') }}"></script>

    {{-- <script src="{{ asset('dashboard/plugins/sweetalert/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/sweetalert/js/sweetalert.init.js') }}"></script> --}}

    {{-- <script src="./plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="./plugins/sweetalert/js/sweetalert.init.js"></script> --}}
    @include('sweetalert::alert')
    @yield('custom-js')

</body>

</html>

<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8" />
        <title>Dashboard Cubic Workspace | @yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports" name="description" />
        <meta content="https://www.facebook.com/navagiaginasta" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/global/plugins/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/global/plugins/simple-line-icons/simple-line-icons.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/global/plugins/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}">
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/global/plugins/morris/morris.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/global/plugins/fullcalendar/fullcalendar.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/global/plugins/jqvmap/jqvmap/jqvmap.css') }}">
        <!-- END PAGE LEVEL PLUGINS -->

        <link href="{{ asset('backend/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/global/css/components.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/global/css/plugins.min.css') }}">
        <!-- END THEME GLOBAL STYLES -->

        <!-- DATEPICKER GLOBAL STYLES -->
        <link href="{{ asset('backend/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/global/plugins/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css" />

        <!-- BEGIN THEME LAYOUT STYLES -->
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/layouts/layout/css/layout.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/layouts/layout/css/themes/darkblue.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/layouts/layout/css/custom.min.css') }}">
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="{{ asset('faviconcubic.png') }}" />
     </head>
    <!-- END HEAD -->
    <body class="page-header-fixed page-footer-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="{{ url('admin') }}">
                            <img src="{{ asset('backend/layouts/layout/img/logo.png') }}" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                          
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <!-- <img alt="" class="img-circle" src="{{ asset('internal/layouts/layout/img/avatar3_small.jpg') }}" /> -->
                                    <span class="username username-hide-on-mobile">{{ Auth::user()->name }}  </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/') }}" target="_blank">
                                            <i class="icon-globe"></i> Website </a>
                                    </li>
                                    <!-- <li>
                                        <a href="app_inbox.html">
                                            <i class="icon-envelope-open"></i> My Inbox
                                            <span class="badge badge-danger"> 3 </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="app_todo.html">
                                            <i class="icon-rocket"></i> My Tasks
                                            <span class="badge badge-success"> 7 </span>
                                        </a>
                                    </li> -->
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i> Log Out </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-quick-sidebar-toggler">
                                <a href="{{ route('logout') }}" class="dropdown-toggle" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="icon-logout"></i>
                                </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            </form>
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <!-- SIDEBAR MENU -->
                        @include('layouts.menu')
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                           @yield('content')
                </div>
                <!-- END CONTENT -->
                <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> 2017 © www.cubicworkspace.com
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>
        <!-- BEGIN QUICK NAV -->
        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
        <script src="{{ asset('backend/global/plugins/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/js.cookie.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/jquery.blockui.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ asset('backend/global/plugins/moment.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/morris/raphael-min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/counterup/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/amcharts/amcharts/amcharts.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/amcharts/amcharts/serial.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/amcharts/amcharts/pie.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/amcharts/amcharts/radar.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/amcharts/amcharts/themes/light.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/amcharts/amcharts/themes/patterns.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/amcharts/amcharts/themes/chalk.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/amcharts/ammap/ammap.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/amcharts/ammap/maps/js/worldLow.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/amcharts/amstockcharts/amstock.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/horizontal-timeline/horizontal-timeline.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/flot/jquery.flot.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/flot/jquery.flot.resize.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/flot/jquery.flot.categories.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/jqvmap/jqvmap/jquery.vmap.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <script src="{{ asset('backend/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}"></script>
        <!-- END PAGE LEVEL PLUGINS -->
         <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ asset('backend/global/scripts/datatable.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ asset('backend/global/scripts/app.min.js') }}"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('backend/pages/scripts/dashboard.min.js') }}"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('backend/pages/scripts/table-datatables-managed.min.js') }}" type="text/javascript"></script>
        
        <script src="{{ asset('backend/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
        

        <!-- BEGIN DATEPICKER LEVEL PLUGINS -->
        <script src="{{ asset('backend/pages/scripts/components-date-time-pickers.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/global/plugins/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/global/plugins/clockface/js/clockface.js') }}" type="text/javascript"></script>
        <!-- END DATEPICKER LEVEL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ asset('backend/layouts/layout/scripts/layout.min.js') }}"></script>
        <script src="{{ asset('backend/layouts/layout/scripts/demo.min.js') }}"></script>
        <script src="{{ asset('backend/layouts/global/scripts/quick-sidebar.min.js') }}"></script>
        <script src="{{ asset('backend/layouts/global/scripts/quick-nav.min.js') }}"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    </body>

    </html>
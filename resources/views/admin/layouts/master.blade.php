<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
@if(app()->getLocale() == 'ar')
    <!-- Start Rtl -->
    @php
        $userPanel = "pull-right";
        $dir = "direction: rtl;"
    @endphp
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('admin/rtl/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/rtl/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin/rtl/dist/css/skins/_all-skins.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin/rtl/plugins/iCheck/flat/blue.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('admin/rtl/plugins/morris/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('admin/rtl/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('admin/rtl/plugins/datepicker/datepicker3.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin/rtl/plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('admin/rtl/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- End Rtl -->
@endif
@if(app()->getLocale() == 'en')
    <!-- Start Ltr -->
        @php
            $userPanel = "pull-left";
        @endphp
    <link rel="stylesheet" href="{{ asset('admin/ltr/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!--  &lt;!&ndash; Font Awesome &ndash;&gt;-->
    <link rel="stylesheet" href="{{ asset('admin/ltr/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!--  &lt;!&ndash; Ionicons &ndash;&gt;-->
    <link rel="stylesheet" href="{{ asset('admin/ltr/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!--  &lt;!&ndash; Theme style &ndash;&gt;-->
    <link rel="stylesheet" href="{{ asset('admin/ltr/dist/css/AdminLTE.min.css') }}">
    <!--  &lt;!&ndash; AdminLTE Skins. Choose a skin from the css/skins-->
    <!--       folder instead of downloading all of them to reduce the load. &ndash;&gt;-->
    <link rel="stylesheet" href="{{ asset('admin/ltr/dist/css/skins/_all-skins.min.css') }}">
    <!--  &lt;!&ndash; Morris chart &ndash;&gt;-->
    <link rel="stylesheet" href="{{ asset('admin/ltr/bower_components/morris.js/morris.css') }}">
    <!--  &lt;!&ndash; jvectormap &ndash;&gt;-->
    <link rel="stylesheet" href="{{ asset('admin/ltr/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!--  &lt;!&ndash; Date Picker &ndash;&gt;-->
    <link rel="stylesheet" href="{{ asset('admin/ltr/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!--  &lt;!&ndash; Daterange picker &ndash;&gt;-->
    <link rel="stylesheet" href="{{ asset('admin/ltr/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!--  &lt;!&ndash; bootstrap wysihtml5 - text editor &ndash;&gt;-->
    <link rel="stylesheet" href="{{ asset('admin/ltr/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <!--  &lt;!&ndash; HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries &ndash;&gt;-->
    <!--  &lt;!&ndash; WARNING: Respond.js doesn't work if you view the page via file:// &ndash;&gt;-->
    <!--  &lt;!&ndash;[if lt IE 9]>-->
    <!--  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <!--  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <!--  <![endif]&ndash;&gt;-->

    <!--  &lt;!&ndash; Google Font &ndash;&gt;-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- End Ltr -->
@endif
    @yield('header')



</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="{{ route('admin.dashboard') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>MIR</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>مدیریت</b> پنل</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('admin/rtl/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('admin/rtl/dist/img/user3-128x128.jpg') }}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                AdminLTE Design Team
                                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('admin/rtl/dist/img/user4-128x128.jpg') }}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Developers
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('admin/rtl/dist/img/user3-128x128.jpg') }}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Sales Department
                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('admin/rtl/dist/img/user4-128x128.jpg') }}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Reviewers
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                            page and may cause design problems
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Create a nice theme
                                                <small class="pull-right">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Some task I need to do
                                                <small class="pull-right">60%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Make beautiful transitions
                                                <small class="pull-right">80%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-globe"></i>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li class="header">
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('admin/rtl/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ asset('admin/rtl/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                                <p>
                                    Alexander Pierce - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    {!! Form::open(['method'=>'POST', 'action'=>'AdminAuth\LoginController@logout']) !!}
                                    {!! Form::submit(trans('admin.sign.out', ['class'=>'btn btn-default btn-flat'])) !!}
                                    {!! Form::close() !!}
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar direction">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="{{ $userPanel }} image">
                    <img src="{{ asset('admin/rtl/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                </div>
                <div class="{{ $userPanel }} info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('admin.online') }}</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="جستجو...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">منو اصلی</li>
                <li class="treeview {{ request()->segment(3) == 'dashboard' || request()->segment(3) == 'setting' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-home"></i> <span>{{ trans('admin.main') }}</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ itemClassActive('admin.dashboard') }}"> <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>{{ trans('admin.dashboard') }}</a></li>
                        <li class="{{ itemClassActive('admin.setting') }}"><a href="{{ route('admin.setting' ) }}"><i class="fa fa-cogs"></i>{{ trans('admin.setting') }}</a></li>
                    </ul>
                </li>
                <li class="treeview {{ menuClassActive(3, 'admin') }}">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>{{ trans('admin.admin.account') }}</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ itemClassActive('admin.index') }}"><a href="{{ route('admin.index') }}"><i class="fa fa-users"></i>{{ trans('admin.admin.account') }}</a></li>
                        <li class="{{ itemClassActive('admin.create') }}"><a href="{{ route('admin.create') }}"><i class="fa fa-user"></i>{{ trans('admin.add.admin') }}</a></li>
                    </ul>
                </li>
                <li class="treeview {{ menuClassActive(3, 'user') }}">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>{{ trans('admin.user.account') }}</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ itemClassActive('user.index') }}"><a href="{{ route('user.index') }}"><i class="fa fa-users"></i>{{ trans('admin.level.users') }}</a></li>
                        <li class="{{ itemClassActive('user.index', 'level=user') }}"><a href="{{ route('user.index' , 'level=user') }}"><i class="fa fa-user"></i>{{ trans('admin.level.user') }}</a></li>
                        <li class="{{ itemClassActive('user.index', 'level=vendor') }}"><a href="{{ route('user.index' , 'level=vendor') }}"><i class="fa fa-shopping-cart"></i>{{ trans('admin.level.vendor') }}</a></li>
                        <li class="{{ itemClassActive('user.index', 'level=company') }}"><a href="{{ route('user.index' , 'level=company') }}"><i class="fa fa-building"></i>{{ trans('admin.level.company') }}</a></li>
                        <li class="{{ itemClassActive('user.create') }}"><a href="{{ route('user.create') }}"><i class="fa fa-user-plus"></i>{{ trans('admin.add.user') }}</a></li>
                    </ul>
                </li>
                <li class="treeview {{ menuClassActive(3, 'country') }}">
                    <a href="#">
                        <i class="fa fa-flag"></i> <span>{{ trans('admin.countries') }}</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ itemClassActive('country.index') }}"> <a href="{{ route('country.index') }}"><i class="fa fa-flag"></i>{{ trans('admin.countries') }}</a></li>
                        <li class="{{ itemClassActive('country.create') }}"><a href="{{ route('country.create' ) }}"><i class="fa fa-plus"></i>{{ trans('admin.plus') }}</a></li>
                    </ul>
                </li>
                <li class="treeview {{ menuClassActive(3, 'city') }}">
                    <a href="#">
                        <i class="fa fa-flag"></i> <span>{{ trans('admin.cities') }}</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ itemClassActive('city.index') }}"> <a href="{{ route('city.index') }}"><i class="fa fa-flag"></i>{{ trans('admin.cities') }}</a></li>
                        <li class="{{ itemClassActive('city.create') }}"><a href="{{ route('city.create' ) }}"><i class="fa fa-plus"></i>{{ trans('admin.plus') }}</a></li>
                    </ul>
                </li>
                <li class="treeview {{ menuClassActive(3, 'state') }}">
                    <a href="#">
                        <i class="fa fa-flag"></i> <span>{{ trans('admin.states') }}</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ itemClassActive('state.index') }}"> <a href="{{ route('state.index') }}"><i class="fa fa-flag"></i>{{ trans('admin.states') }}</a></li>
                        <li class="{{ itemClassActive('state.create') }}"><a href="{{ route('state.create' ) }}"><i class="fa fa-plus"></i>{{ trans('admin.plus') }}</a></li>
                    </ul>
                </li>
                <li class="treeview {{ menuClassActive(3, 'department') }}">
                    <a href="#">
                        <i class="fa fa-align-justify"></i> <span>{{ trans('admin.department') }}</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ itemClassActive('department.index') }}"> <a href="{{ route('department.index') }}"><i class="fa fa-flag"></i>{{ trans('admin.department') }}</a></li>
                        <li class="{{ itemClassActive('department.create') }}"><a href="{{ route('department.create' ) }}"><i class="fa fa-plus"></i>{{ trans('admin.plus') }}</a></li>
                    </ul>
                </li>
                <li class="treeview {{ menuClassActive(3, 'triad') }}">
                    <a href="#">
                        <i class="fa fa-trademark"></i> <span>{{ trans('admin.triad') }}</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ itemClassActive('triad.index') }}"> <a href="{{ route('triad.index') }}"><i class="fa fa-trademark"></i>{{ trans('admin.triad') }}</a></li>
                        <li class="{{ itemClassActive('triad.create') }}"><a href="{{ route('triad.create' ) }}"><i class="fa fa-plus"></i>{{ trans('admin.plus') }}</a></li>
                    </ul>
                </li>
                <li class="treeview {{ menuClassActive(3, 'manufact') }}">
                    <a href="#">
                        <i class="fa fa-align-justify"></i> <span>{{ trans('admin.manufact') }}</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ itemClassActive('manufact.index') }}"> <a href="{{ route('manufact.index') }}"><i class="fa fa-flag"></i>{{ trans('admin.manufact') }}</a></li>
                        <li class="{{ itemClassActive('manufact.create') }}"><a href="{{ route('manufact.create' ) }}"><i class="fa fa-plus"></i>{{ trans('admin.plus') }}</a></li>
                    </ul>
                </li>
                <li class="treeview {{ menuClassActive(3, 'shipping') }}">
                    <a href="#">
                        <i class="fa fa-truck"></i> <span>{{ trans('admin.shipping') }}</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ itemClassActive('shipping.index') }}"> <a href="{{ route('shipping.index') }}"><i class="fa fa-truck"></i>{{ trans('admin.shipping') }}</a></li>
                        <li class="{{ itemClassActive('shipping.create') }}"><a href="{{ route('shipping.create' ) }}"><i class="fa fa-plus"></i>{{ trans('admin.plus') }}</a></li>
                    </ul>
                </li>
                <li class="treeview {{ menuClassActive(3, 'mall') }}">
                    <a href="#">
                        <i class="fa fa-align-justify"></i> <span>{{ trans('admin.malls') }}</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ itemClassActive('mall.index') }}"> <a href="{{ route('mall.index') }}"><i class="fa fa-flag"></i>{{ trans('admin.malls') }}</a></li>
                        <li class="{{ itemClassActive('mall.create') }}"><a href="{{ route('mall.create' ) }}"><i class="fa fa-plus"></i>{{ trans('admin.plus') }}</a></li>
                    </ul>
                </li>
                <li class="treeview {{ menuClassActive(3, 'color') }}">
                    <a href="#">
                        <i class="fa fa-paint-brush"></i> <span>{{ trans('admin.colors') }}</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ itemClassActive('color.index') }}"> <a href="{{ route('color.index') }}"><i class="fa fa-paint-brush"></i>{{ trans('admin.colors') }}</a></li>
                        <li class="{{ itemClassActive('color.create') }}"><a href="{{ route('color.create' ) }}"><i class="fa fa-plus"></i>{{ trans('admin.plus') }}</a></li>
                    </ul>
                </li>
                <li class="treeview {{ menuClassActive(3, 'size') }}">
                    <a href="#">
                        <i class="fa fa-paint-brush"></i> <span>{{ trans('admin.sizes') }}</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ itemClassActive('size.index') }}"> <a href="{{ route('size.index') }}"><i class="fa fa-paint-brush"></i>{{ trans('admin.sizes') }}</a></li>
                        <li class="{{ itemClassActive('size.create') }}"><a href="{{ route('size.create' ) }}"><i class="fa fa-plus"></i>{{ trans('admin.plus') }}</a></li>
                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
        @yield('content')
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.3
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- Start Rtl -->
<!-- jQuery 2.2.0 -->
<script src="{{ asset('admin/rtl/plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('admin/rtl/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('admin/rtl/plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin/rtl/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('admin/rtl/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('admin/rtl/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin/rtl/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('admin/rtl/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('admin/rtl/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('admin/rtl/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('admin/rtl/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin/rtl/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/rtl/dist/js/app.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin/rtl/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/rtl/dist/js/demo.js') }}"></script>
<!-- End Rtl -->

@yield('footer')
</body>
</html>

@extends('layouts.head')
@section('title','base')
@section('body_content')
    <body class="dark-sidenav">
    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{asset('/projects/projects-index.html')}}" class="logo">
                    <span>
                        <img src="{{asset('/assets/images/logo-sm.png')}}" alt="logo-small" class="logo-sm">
                    </span>
                <span>
                        <img src="{{asset('/assets/images/logo.png')}}" alt="logo-large" class="logo-lg logo-light" style="height: 20px">
                        <img src="{{asset('/assets/images/logo-dark2.png')}}" alt="logo-large" class="logo-lg" style="height: 20px">
                    </span>
            </a>
        </div>
        <!--end logo-->
        <!-- Navbar -->
        <nav class="navbar-custom">
            <ul class="list-unstyled topbar-nav float-right mb-0">
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <i class="ti-bell noti-icon"></i>
                        <span class="badge badge-danger badge-pill noti-icon-badge">2</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                        <!-- item-->
                        <h6 class="dropdown-item-text">
                            Notifications (18)
                        </h6>
                        <div class="slimscroll notification-list">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                            </a>
                        </div>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                            View all <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset('/assets/images/users/user-4.jpg')}}" alt="profile-user" class="rounded-circle" />
                        <span class="ml-1 nav-user-name hidden-sm">{{ Auth::user()->name }}<i class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @can('manage-user')
                            <a href="{{route('admin.users.index')}}" class="dropdown-item"><i class="ti-settings text-muted mr-2"></i>
                                User Management
                            </a>
                        @endcan
                        <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i> Settings</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="ti-power-off text-muted mr-2"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </div>
                </li>
                @endguest
            </ul><!--end topbar-nav-->

            <ul class="list-unstyled topbar-nav mb-0">
                <li>
                    <button class="button-menu-mobile nav-link waves-effect waves-light">
                        <i class="ti-menu nav-icon"></i>
                    </button>
                </li>
                <li class="hide-phone app-search">
                    <form role="search" class="">
                        <input type="text" placeholder="Search..." class="form-control">
                        <a href=""><i class="ti-search"></i></a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->

    <div class="page-wrapper">
        <!-- Left Sidenav -->
        <div class="left-sidenav">
            <ul class="metismenu left-sidenav-menu">

                <li>
                    <a href="javascript: void(0);"><i class="ti-bar-chart"></i><span>Dashboard</span><span class="menu-arrow"></span></a>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="ti-layers-alt"></i><span>Post</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="{{route('posts')}}"><i class="ti-control-record"></i>All Post</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('post.create')}}"><i class="ti-control-record"></i>Create Post</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="ti-lock"></i><span>Category</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="{{route('category.create')}}"><i class="ti-control-record"></i>Add new Category</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('categories')}}"><i class="ti-control-record"></i>All Categories</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../analytics/analytics-index-dark-sidenav.html"><i class="ti-palette"></i><span>Dark Sidenav</span></a>
                </li>
            </ul>
        </div>
        <!-- end left-sidenav-->

        <!-- Page Content-->
        <div class="page-content">

            <div class="container-fluid">
                @yield('base-content')
            </div><!-- container -->

            <footer class="footer text-center text-sm-left">
                &copy; 2019 King <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Kingthemes</span>
            </footer><!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
@endsection


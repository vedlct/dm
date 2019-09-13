<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DM</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('public/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('public/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('public/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('public/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('public/dist/css/skins/_all-skins.min.css')}}">
    @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>MR</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Add</b>Market</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="ion ion-ios-cart-outline"></i>
                            <span class="label label-success">{{Cart::session(Auth::user()->userId)->getContent()->count() }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <ul class="menu">
                                    @foreach (Cart::session(Auth::user()->userId)->getContent() as $data)
                                    <li><!-- start message -->
                                        <a href="#">
                                            <h4 style="margin-left: 40%;">
                                                {{$data->name}}
                                            </h4>
                                            <p style="margin-left: 40%;">{{$data->price}}</p>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @if(!Cart::session(Auth::user()->userId)->isEmpty())
                                <li class="footer"><a href="{{url('/checkout')}}">CheckOut</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="{{ route('logout') }}" class="btn btn-primary btn-flat" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();" style="border: none;"><i class="fa fa-sign-out"></i>
                            {{ __('Logout') }}

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    @include('layouts.sidebar')

    @yield('content')

    <footer class="main-footer">
        <strong>Copyright &copy; 2019 <a href="#">TCL</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<script src="{{url('public/js/jquery-3.4.1.min.js')}}" ></script>
<script src="{{url('public/js/bootstrap.min.js')}}" ></script>
<script src="{{url('public/dist/js/adminlte.min.js')}}"></script>

@yield('js')
</body>
</html>

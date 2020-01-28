<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta content="A BLog" name="description" />
    <meta content="Kingthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/metisMenu.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/css/custom.css')}}" rel="stylesheet" type="text/css" />

</head>


@yield('body_content')

<!-- jQuery  -->
<script src="{{asset('/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/assets/js/metisMenu.min.js')}}"></script>
<script src="{{asset('/assets/js/waves.min.js')}}"></script>
<script src="{{asset('/assets/js/jquery.slimscroll.min.js')}}"></script>

@yield('base_script')

<!-- App js -->
<script src="{{asset('/assets/js/app.js')}}"></script>

</body>
</html>

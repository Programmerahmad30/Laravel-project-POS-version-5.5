<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Log in</title>

    <link rel="stylesheet" href="{{asset('dashboard_files/en/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('dashboard_files/en/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dashboard_files/en/dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('dashboard_files/en/bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('dashboard_files/en/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('dashboard_files/en/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('dashboard_files/en/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('dashboard_files/en/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <![endif]-->

    <!-- Google Font -->

@if(app()->getLocale() == 'ar')
    <!-- Bootstrap 3.3.4 (7)-->
        <link rel="stylesheet" href="{{asset('dashboard_files/ar/bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css')}}">
        <!-- Ionicons 2.0.0  (1)-->
        <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dashboard_files/ar/dist/css/AdminLTE.min.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load.(2) -->
        <link rel="stylesheet" href="{{asset('dashboard_files/ar/dist/css/skins/_all-skins.min.css')}}">
        <!-- iCheck (3)-->
        <link rel="stylesheet" href="{{asset('dashboard_files/ar/plugins/iCheck/flat/blue.css')}}">
        <!-- Morris chart (4)-->
        <link rel="stylesheet" href="{{asset('dashboard_files/ar/plugins/morris/morris.css')}}">
        <!-- jvectormap (5)-->
        <link rel="stylesheet" href="{{asset('dashboard_files/ar/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
        <!-- Date Picker (6)-->
        <link rel="stylesheet" href="{{asset('dashboard_files/ar//datepicker/datepicker3.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('dashboard_files/ar/plugins/daterangepicker/daterangepicker-bs3.css')}}">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{asset('dashboard_files/ar/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

        <!--<link rel="stylesheet" href="dist/fonts/fonts-fa.css">-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:400,700">
        <link rel="stylesheet" href="{{asset('dashboard_files/ar/dist/css/bootstrap-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard_files/ar/dist/css/rtl.css')}}">
        <style>
            body,h1,h2,h3,h4,h5,h6{
                font-family: 'Cairo', sans-serif !important;
            }
        </style>
    @else

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="{{asset('dashboard_files/en/bower_components/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard_files/en/dist/css/AdminLTE.min.css')}}">

    @endif
    <script src="{{asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
    <script src="{{asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <!--NOTY-->
    <!--NOTY-->

</head>
<body class="login-page">

<div class="login-box">

    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div><!-- end of login lgo -->

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ route('login') }}" method="post">
            {{ csrf_field() }}
            {{ method_field('post') }}

            @include('partials._errors')

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="@lang('site.email')">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="@lang('site.password')">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group">
                <label style="font-weight: normal;"><input type="checkbox" name="remember"> @lang('site.remember_me')</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('site.login')</button>

        </form><!-- end of form -->

    </div><!-- end of login body -->

</div><!-- end of login-box -->

{{--<!-- jQuery 3 -->--}}
<script src="{{ asset('dashboard_files/js/jquery.min.js') }}"></script>

{{--<!-- Bootstrap 3.3.7 -->--}}
<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>

{{--icheck--}}
<script src="{{ asset('dashboard_files/plugins/icheck/icheck.min.js') }}"></script>

{{--<!-- FastClick -->--}}
<script src="{{ asset('dashboard_files/js/fastclick.js') }}"></script>

</body>
</html>

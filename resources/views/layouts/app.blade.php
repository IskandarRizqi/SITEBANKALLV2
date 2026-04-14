<!DOCTYPE html>
<!--
Template Name: Tinker - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<!-- BEGIN: Head -->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <link href="{{asset('admin/dist/images/logo.svg')}}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Login - Admin Website</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('admin/dist/css/app.css')}}" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    @yield('content')


    <!-- BEGIN: JS Assets-->
    <script src="{{asset('admin/dist/js/app.js')}}">
    </script>
    <!-- END: JS Assets-->
</body>

</html>
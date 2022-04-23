<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content=""/>
    <meta name="keywords"
          content=""/>
{{--    <meta name="author" content="Set Private Limited"/>--}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <!-- Favicon -->
    <link href="" rel="shortcut icon" type="image/png">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/theme1/css/bootstrap.min.css') }}">
    <!-- Calendar CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/theme1/css/jquery.calendar.min.css') }}">
    <!-- toastr alert -->
    <link rel="stylesheet" href="{{asset('notification_assets/css/toastr.min.css')}}" />
    <!-- Import Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/theme1/css/defult.css') }}">
    <!-- Font family CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/custom-font-family.css') }}">
    <!-- Import Custome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/theme1/css/style.css') }}">
    <!-- Import Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/theme1/css/responsive.css') }}">
    @yield('page-css')
</head>

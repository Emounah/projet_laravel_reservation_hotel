<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('titre')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="keywords"
        content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->
    {{-- <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> --}}
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
</head>

<body>

    @include('layoutsAdmin.header')
    @yield('contenue')
    @include('layoutsAdmin.footer')
        <!-- Required Jquery -->
        <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/popper.js/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- jquery slimscroll js -->
        <script type="text/javascript" src="{{ asset('assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <!-- modernizr js -->
        <script type="text/javascript" src="{{ asset('assets/js/modernizr/modernizr.js') }}"></script>
        <!-- am chart -->
        <script src="{{ asset('assets/pages/widget/amchart/amcharts.min.js') }}"></script>
        <script src="{{ asset('assets/pages/widget/amchart/serial.min.js') }}"></script>
        <!-- Todo js -->
        <script type="text/javascript " src="{{ asset('assets/pages/todo/todo.js') }}"></script>
        <!-- Custom js -->
        <script type="text/javascript" src="{{ asset('assets/pages/dashboard/custom-dashboard.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
        <script type="text/javascript " src="{{ asset('assets/js/SmoothScroll.js') }}"></script>
        <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
        <script src="{{ asset('assets/js/demo-12.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script>
            var $window = $(window);
            var nav = $('.fixed-button');
            $window.scroll(function () {
                if ($window.scrollTop() >= 200) {
                    nav.addClass('active');
                }
                else {
                    nav.removeClass('active');
                }
            });
        </script>
</body>

</html>

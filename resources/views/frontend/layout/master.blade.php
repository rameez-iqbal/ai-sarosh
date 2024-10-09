<!DOCTYPE html>

<html class="loading">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="PIXINVENT">
    <link rel="icon" href="{{ asset('app-assets/images/frontend/favicon_logo.png') }}" type="image/x-icon"> 
    <title>{{ env('APP_NAME') }} - @yield('page-title')</title>

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/bootstrap/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/frontend/theme.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/frontend/main.css">




    @yield('custom-css')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body id="scrollbar">
    {{ view('frontend.layout.header') }}

    @yield('content')

    {{ view('frontend.layout.footer') }}
    <script src="{{ asset('app-assets') }}/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/bootstrap/bootstrap.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggler = document.querySelector('.navbar-toggler');

            toggler.addEventListener('click', function() {
                this.classList.toggle('cross');
            });
        });
        
        $(document).ready(function() {

            AOS.init({
                duration: 500,
            });
            function isMobile() {
                return /Mobi|Android/i.test(navigator.userAgent);
            }
            $('#navbarNav .custom-nav li').on('click', function() {
                if (isMobile() && navigator.vibrate) {
                    navigator.vibrate(200);
                }
            });
        });

    </script>
    @yield('custom-js')



</body>
<!-- END: Body-->

</html>

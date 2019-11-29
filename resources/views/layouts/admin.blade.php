<!DOCTYPE HTML>
<html>

<head>
    <title>School Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.css" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="/css/style.css" rel='stylesheet' type='text/css' />

    <!-- font-awesome icons CSS-->
    <link href="/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons CSS-->

    <!-- side nav css file -->
    <link href='/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css' />
    <!-- side nav css file -->


    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <!--//webfonts-->

    <!-- Metis Menu -->

    <link href="/css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->

    @yield('css-plugins')


</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">

            @include('includes/navbar')
            @include('includes/header')

            <div id="page-wrapper">
                <div class="main-page">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>


    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/modernizr.custom.js"></script>
    <script src="/js/metisMenu.min.js"></script>
    <script src="/js/custom.js"></script>
    <script src="/js/jquery.steps.js"></script>
    <script src="/js/jquery.steps.min.js"></script>
    <script src="/js/custom.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.js"> </script>
    <!-- //Bootstrap Core JavaScript -->



    @yield('script-plugins')


</body>

</html>
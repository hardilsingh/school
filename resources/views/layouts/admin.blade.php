<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>School Management System</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">


    <!-- Toastr -->
    <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <script src="/plugins/jquery/jquery.min.js"></script>


    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">







</head>

<body class="hold-transition sidebar-mini layout-fixed">

<style>

    .table {
        text-transform: uppercase;
    }

</style>
    <div class="wrapper">

        @include('includes.nav')
        @include('includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('heading')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


            <section class="content">
                <div class="container-fluid">
                    <button style="display:none" type="button" class="btn btn-success toastrDefaultSuccess">
                        Launch Success Toast
                    </button>
                    <button style="display:none" type="button" class="btn btn-info toastrDefaultInfo">
                        Launch Info Toast
                    </button>

                    <button style="display:none" type="button" class="btn btn-success toastrDefaultSuccess2">
                        Launch Success Toast
                    </button>
                    @yield('content')
                </div>
            </section>

        </div>




    </div>



    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>


    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <!-- Toastr -->
    <script src="/plugins/toastr/toastr.min.js"></script>

    @yield('script-plugins')




    @if(Session::has('created'))
    <script type="text/javascript">
        $(document).ready(function() {
            $(".toastrDefaultSuccess").click();
        });
    </script>
    @endif


    @if(Session::has('updated'))
    <script type="text/javascript">
        $(document).ready(function() {
            $(".toastrDefaultInfo").click();
        });
    </script>
    @endif

    @if(Session::has('deleted'))
    <script type="text/javascript">
        $(document).ready(function() {
            $(".toastrDefaultSuccess2").click();
        });
    </script>
    @endif



    <script>
        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Created Successfully')
        });
    </script>

    <script>
        $('.toastrDefaultSuccess2').click(function() {
            toastr.success('Deleted Successfully')
        });
    </script>

    <script>
        $('.toastrDefaultInfo').click(function() {
            toastr.info('Updated Successfully.')
        });
    </script>


</body>

</html>
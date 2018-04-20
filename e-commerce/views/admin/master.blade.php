<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('/admin') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('/admin') }}/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('/admin') }}/bower_components/Ionicons/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{ asset('/admin') }}/bower_components/jvectormap/jquery-jvectormap.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('/admin') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('/admin') }}/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('/admin') }}/dist/css/skins/_all-skins.min.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{ asset('/admin') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            @include('admin.includes.header')
            <!-- Left side column. contains the logo and sidebar -->
            @include('admin.includes.menu')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        @yield('pageTitle')
                        <small>@yield('pgSubTitle')</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">@yield('pageTitle')</li>
                    </ol>
                </section>
                @yield('content')
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            @include('admin.includes.footer')
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be p                 laced
             immediately after the control             sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./w        rapper -->

        <!-- j        Query 3 -->
        <script src="{{ asset('/admin') }}/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('/admin') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="{{ asset('/admin') }}/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('/admin') }}/dist/js/adminlte.min.js"></script>
        <!-- Sparkline -->
        <script src="{{ asset('/admin') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- jvectormap  -->
        <script src="{{ asset('/admin') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="{{ asset('/admin') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- DataTables -->
        <script src="{{ asset('/admin') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('/admin') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="{{ asset('/admin') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- ChartJS -->
        <script src="{{ asset('/admin') }}/bower_components/Chart.js/Chart.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('/admin') }}/dist/js/pages/dashboard2.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('/admin') }}/dist/js/demo.js"></script>
        <!-- CK Editor -->
        <script src="{{ asset('/admin') }}/bower_components/ckeditor/ckeditor.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ asset('/admin') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        
        <script>
            $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                $('.textarea').wysihtml5()
                CKEDITOR.replace('editor1')
                //bootstrap WYSIHTML5 - text editor
                //$('.textarea').wysihtml5()
            })
        </script>
        <script>
            $(function () {
                $('#example1').DataTable()
                $('#example2').DataTable({
                    'paging': true,
                    'lengthChange': false,
                    'searching': false,
                    'ordering': true,
                    'info': true,
                    'autoWidth': false
                })
            })
        </script>
    </body>
</html>



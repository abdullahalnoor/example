<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Practice</title>
  <!-- Tell the browser to be responsive to screen width -->
 
 @include('practice.includes._css')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 @include('practice.includes.header')
  <!-- Left side column. contains the logo and sidebar -->
 @include('practice.includes.left-sidebar')


  <!-- Content Wrapper. Contains page content -->
 @yield('content')
  <!-- /.content-wrapper -->
 @include('practice.includes.footer')

  <!-- Control Sidebar -->
 @include('practice.includes.right-sidebar')
 
<!-- ./wrapper -->

<!-- jQuery 3 -->
 @include('practice.includes._js')


@yield('js')
</body>
</html>

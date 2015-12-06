<!DOCTYPE html>
<html>
<head>
    <title>Asistencias | Principal</title>
    @include('plantilla.parciales.head')
</head>

<body class="hold-transition layout-boxed skin-blue layout-top-nav">

<!-- Site wrapper -->
<div class="wrapper">

    @include('parciales.message')

    @include('plantilla.parciales.header')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div><!-- /.content-wrapper -->

</div><!-- ./wrapper -->

</body>
</html>
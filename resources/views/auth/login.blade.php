<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Asistencias | Iniciar Sesión</title>
    <link rel="shortcut icon" href="{{ asset('dist/img/login.png') }}" type="image/png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- Mensajes. -->
    <link rel="stylesheet" href="{{ asset('dist/css/mensajes.css') }}">

    <!-- jQuery -->
    <script src="{{ asset('bootstrap/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-box-body">
        <h3 class="login-box-msg">Asistencias</h3>

        @include('parciales.errors')

        <form action="{{ url('/auth/login') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="usuario" placeholder="Usuario" value="{{ old('usuario') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Clave">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block pull-right">Ingresar</button>
                </div><!-- /.col -->
            </div>
        </form>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</body>
</html>
@extends('plantilla.app')

@section('content')
        <!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #fff; font-size: 16px; font-weight: 600;">
            Editar Usuario
        </div>
        <div class="panel-body">
            <div class="col-sm-10 col-sm-offset-1">
                @include('parciales.errors')

                <form class="form-horizontal" role="form" method="POST" action="{{ url('usuario/update') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    <div class="col-sm-7">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ $usuario->id }}">
                        <input type="hidden" name="prefoto" id="prefoto" value="{{ $usuario->foto }}">
                        <input type="hidden" name="foto" id="foto" value="{{ $usuario->foto }}">

                        <div class="form-group">
                            <label class="col-md-3 control-label" style="text-align: left;">DNI</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="dni" value="{{ $usuario->dni }}" autofocus maxlength="8">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" style="text-align: left;">Nombres</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nombres" value="{{ $usuario->nombres }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" style="text-align: left;">Ape. Paterno</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="apellidopaterno" value="{{ $usuario->apellidopaterno }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" style="text-align: left;">Ape. Materno</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="apellidomaterno" value="{{ $usuario->apellidomaterno }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" style="text-align: left;">Sexo</label>
                            <div class="col-md-9">
                                <select class="form-control" name="sexo">
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" style="text-align: left;">Celular</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="celular" value="{{ $usuario->celular }}" maxlength="9">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" style="text-align: left;">Correo</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="email" value="{{ $usuario->email }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" style="text-align: left;">Usuario</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="usuario" value="{{ $usuario->usuario }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" style="text-align: left;">Contraseña</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="form-group" style="margin-bottom:10px;">
                            <div class="col-sm-12">
                                @if(is_null($usuario->foto) || empty($usuario->foto))
                                    @if($usuario->sexo == 'M')
                                        <img id="imagen" src="{{ asset('dist/img/male.png') }}" style="height:350px; width:300px; border: 1px solid #ddd">
                                    @else
                                        <img id="imagen" src="{{ asset('dist/img/female.png') }}" style="height:350px; width:300px; border: 1px solid #ddd">
                                    @endif
                                @else
                                    <img id="imagen" src="{{ asset('dist/img/' . $usuario->foto) }}" style="height:350px; width:300px; border: 1px solid #ddd">
                                @endif
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:10px;">
                            <div class="col-sm-6">
                                <span class="btn btn-default btn-file">
                                    Seleccionar imagen <input type="file" name="imgfile" id="imgfile" accept="image/jpeg,image/x-png">
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-7">
                            <a href="{{ url('usuarios') }}" class="btn btn-danger pull-right" style="margin-left: 5px;">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary pull-right">
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->
@endsection

@section('scripts')
    @include('sistema.usuarios.scripts.image');
    <script>
        $(function () {
            $("#sexo").val('{{ $usuario->sexo }}');
        });
    </script>
@endsection
@extends('plantilla.app')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #fff; font-size: 16px; font-weight: 600;">
            {{ $titulo }}
            <a href="{{ url('usuario/create/' . $titulo) }}" class="btn btn-primary btn-xs pull-right" style="font-size: 14px">Nuevo</a>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped table-hover data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombres</th>
                        <th>A. Paterno</th>
                        <th>A. Materno</th>
                        <th>Usuario</th>
                        <th>Sexo</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->nombres }}</td>
                        <td>{{ $usuario->apellidopaterno }}</td>
                        <td>{{ $usuario->apellidomaterno }}</td>
                        <td>{{ $usuario->usuario }}</td>
                        <td>
                            @if($usuario->sexo == 'F')
                                Femenino
                            @else
                                Masculino
                            @endif
                        </td>
                        <td>{{ $usuario->celular }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td style="text-align: center">
                            <a href="{{ url('usuario/permisos/' . $usuario->id) }}" title="Permisos">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                            &nbsp;&nbsp;
                            <a href="{{ url('usuario/edit/' . $usuario->id) }}" title="Editar" class="text-yellow">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            @if($usuario->id != Auth::user()->id)
                                &nbsp;&nbsp;
                                <a href="{{ url('usuario/destroy/' . $usuario->id) }}" title="Eliminar" class="text-red">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section><!-- /.content -->
@endsection

@section('scripts')
    @include('parciales.datatable')
@endsection
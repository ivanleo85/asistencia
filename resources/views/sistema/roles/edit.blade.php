@extends('plantilla.app')

@section('content')
        <!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #fff; font-size: 16px; font-weight: 600;">
            Editar Rol de Usuario
        </div>
        <div class="panel-body">
            <div class="col-sm-6 col-sm-offset-3">
                @include('parciales.errors')

                <form class="form-horizontal" role="form" method="POST" action="{{ url('rol/update') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $rol->id }}">

                    <div class="form-group">
                        <label class="col-md-2 control-label" style="text-align: left;">Nombre</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="nombre" value="{{ $rol->nombre }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <a href="{{ url('roles') }}" class="btn btn-danger pull-right" style="margin-left: 5px; margin-right: 15px;">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary pull-right">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->
@endsection
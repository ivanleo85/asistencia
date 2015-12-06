@extends('plantilla.app')

@section('content')
<div class="col-sm-4 col-sm-offset-4" style="margin-top: 5%;">
    <div class="panel panel-primary" style="margin:5% auto">
        <div class="panel-heading" style="font-size: 16px; font-weight: 600;">
            Roles Asignados
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    @foreach($roles as $rol)
                        <tr>
                            <td>
                                <a href="{{ url('permiso/' . $rol->id) }}">
                                    {{ $rol->nombre }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
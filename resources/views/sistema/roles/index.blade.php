@extends('plantilla.app')

@section('content')
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #fff; font-size: 16px; font-weight: 600;">
            Roles de Usuario
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-hover data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $rol)
                    <tr>
                        <td style="width: 10px;">{{ $rol->id }}</td>
                        <td>{{ $rol->nombre }}</td>
                        <td style="text-align: center; width: 10px">
                            <a href="{{ url('rol/edit/' . $rol->id) }}" title="Editar" class="text-yellow">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->
@endsection

@section('scripts')
    @include('parciales.datatable')
@endsection
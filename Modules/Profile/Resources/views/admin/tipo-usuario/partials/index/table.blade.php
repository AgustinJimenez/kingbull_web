<?php 
    $columns = ["NOMBRE", "CANTIDAD", "ACCIONES"];
?>
<table class="data-table table table-bordered table-hover table-striped">
    <thead>
        <tr class="bg-primary">
            @foreach ($columns as $column)
                <th>{{ $column }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
    @if( isset($tipos_usuarios) )
        @foreach ($tipos_usuarios as $tipo_usuario)
            <tr>
                <td>
                    <a href="{{ $tipo_usuario->edit_route }}">
                        {{ $tipo_usuario->nombre }}
                    </a>
                </td>
                <td>
                    <a href="{{ $tipo_usuario->edit_route }}">
                        {{ $tipo_usuario->cantidad }}
                    </a>
                </td>
                <td>
                    <div class="btn-group">
                        <a href="{{ $tipo_usuario->edit_route }}" class="btn btn-default btn-flat">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <button class="btn btn-danger btn-flat" onclick="destroy_event( $(this) );" delete-route="{{ $tipo_usuario->destroy_route }}" count-users="{{ $tipo_usuario->profiles->count() }}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
    <tfoot>
        <tr class="bg-primary">
            @foreach ($columns as $column)
                <th>{{ $column }}</th>
            @endforeach
        </tr>
    </tfoot>
</table>
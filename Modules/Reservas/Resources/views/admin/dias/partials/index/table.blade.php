<?php
    $columns = ['ORDEN', 'NOMBRE', 'ACCIONES']
;?>
<style type="text/css" media="screen">
    th, td
    {
        text-align: center;
    }   
</style>
<div class="table-responsive">
    <table class="data-table table table-bordered table-hover">
        <thead class="bg-primary">
            <tr>
                @foreach ($columns as $column)
                    <th>{{ $column }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @if (isset($dias))
                @foreach ($dias as $dia)
                    <tr>
                        <td>
                            <a href="{{ route('admin.reservas.dia.edit', [$dia->id]) }}">
                                {{ $dia->orden }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.reservas.dia.edit', [$dia->id]) }}">
                                {{ $dia->nombre }}
                            </a>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.reservas.dia.edit', [$dia->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.reservas.dia.destroy', [$dia->id]) }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot class="bg-primary">
        <tr>
            @foreach ($columns as $column)
                <th>{{ $column }}</th>
            @endforeach
        </tr>
        </tfoot>
    </table>
</div>
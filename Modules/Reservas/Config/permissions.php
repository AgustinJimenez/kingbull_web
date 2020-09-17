<?php

return [
    'reservas.dias' => [
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy',
    ],
    'reservas.horarios' => [
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy',
        'index_ajax',
        'update_cantidad_maxima_usuarios_horario',
        'get_cantidad_usuarios_default'
    ],
    'reservas.reservas' => 
    [
        'index',
        'usuarios_reservas',
        'usuarios_reservas_ajax'
    ],
// append



];

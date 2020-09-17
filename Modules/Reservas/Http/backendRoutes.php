<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/reservas'], function (Router $router) {
    $router->bind('dia', function ($id) {
        return app('Modules\Reservas\Repositories\DiaRepository')->find($id);
    });
    $router->get('dias', [
        'as' => 'admin.reservas.dia.index',
        'uses' => 'DiaController@index',
        'middleware' => 'can:reservas.dias.index'
    ]);
    $router->get('dias/create', [
        'as' => 'admin.reservas.dia.create',
        'uses' => 'DiaController@create',
        'middleware' => 'can:reservas.dias.create'
    ]);
    $router->post('dias', [
        'as' => 'admin.reservas.dia.store',
        'uses' => 'DiaController@store',
        'middleware' => 'can:reservas.dias.store'
    ]);
    $router->get('dias/{dia}/edit', [
        'as' => 'admin.reservas.dia.edit',
        'uses' => 'DiaController@edit',
        'middleware' => 'can:reservas.dias.edit'
    ]);
    $router->put('dias/{dia}', [
        'as' => 'admin.reservas.dia.update',
        'uses' => 'DiaController@update',
        'middleware' => 'can:reservas.dias.update'
    ]);
    $router->delete('dias/{dia}', [
        'as' => 'admin.reservas.dia.destroy',
        'uses' => 'DiaController@destroy',
        'middleware' => 'can:reservas.dias.destroy'
    ]);
    $router->bind('horario', function ($id) {
        return app('Modules\Reservas\Repositories\HorarioRepository')->find($id);
    });
    $router->get('horarios', [
        'as' => 'admin.reservas.horario.index',
        'uses' => 'HorarioController@index',
        'middleware' => 'can:reservas.horarios.index'
    ]);
    $router->post('horarios/index_ajax', 
    [
        'as' => 'admin.reservas.horario.index_ajax',
        'uses' => 'HorarioController@index_ajax',
        'middleware' => 'can:reservas.horarios.index_ajax'
    ]);
    $router->get('horarios/create', [
        'as' => 'admin.reservas.horario.create',
        'uses' => 'HorarioController@create',
        'middleware' => 'can:reservas.horarios.create'
    ]);
    $router->post('horarios', 
    [
        'as' => 'admin.reservas.horario.store',
        'uses' => 'HorarioController@store',
        'middleware' => 'can:reservas.horarios.store'
    ]);
    $router->get('horarios/{horario}/edit', [
        'as' => 'admin.reservas.horario.edit',
        'uses' => 'HorarioController@edit',
        'middleware' => 'can:reservas.horarios.edit'
    ]);
    $router->put('horarios/{horario}', [
        'as' => 'admin.reservas.horario.update',
        'uses' => 'HorarioController@update',
        'middleware' => 'can:reservas.horarios.update'
    ]);
    $router->delete('horarios/{horario}', [
        'as' => 'admin.reservas.horario.destroy',
        'uses' => 'HorarioController@destroy',
        'middleware' => 'can:reservas.horarios.destroy'
    ]);
    $router->post('horarios/actualizar_cantidad_maxima_usuarios_de_horarios_default', 
    [
        'as' => 'admin.reservas.horario.update_cantidad_maxima_usuarios_horario',
        'uses' => 'HorarioController@update_cantidad_maxima_usuarios_horario',
        'middleware' => 'can:reservas.horarios.update_cantidad_maxima_usuarios_horario'
    ]);
    $router->get('horarios/get_cantidad_usuarios_default', 
    [
        'as' => 'admin.reservas.horario.get_cantidad_usuarios_default',
        'uses' => 'HorarioController@get_cantidad_usuarios_default',
        'middleware' => 'can:reservas.horarios.get_cantidad_usuarios_default'
    ]);
    $router->bind('reserva', function ($id) 
    {
        return \Reserva::find($id);
    });
    $router->get('reservas', 
    [
        'as' => 'admin.reservas.reserva.index',
        'uses' => 'ReservaController@index',
        'middleware' => 'can:reservas.reservas.index'
    ]);
    $router->get('reservas/usuarios_reservas', 
    [
        'as' => 'admin.reservas.reserva.usuarios_reservas',
        'uses' => 'ReservaController@usuarios_reservas',
        'middleware' => 'can:reservas.reservas.usuarios_reservas'
    ]);
    $router->post('reservas/usuarios_reservas_ajax', 
    [
        'as' => 'admin.reservas.reserva.usuarios_reservas_ajax',
        'uses' => 'ReservaController@usuarios_reservas_ajax',
        'middleware' => 'can:reservas.reservas.usuarios_reservas_ajax'
    ]);

});

<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/reservas'], function (Router $router) {
    $router->bind('reserva', function ($id) {
        return app('Modules\Reservas\Repositories\ReservaRepository')->find($id);
    });
    $router->get('reservas', [
        'as' => 'admin.reservas.reserva.index',
        'uses' => 'ReservaController@index',
        'middleware' => 'can:reservas.reservas.index'
    ]);
    $router->get('reservas/create', [
        'as' => 'admin.reservas.reserva.create',
        'uses' => 'ReservaController@create',
        'middleware' => 'can:reservas.reservas.create'
    ]);
    $router->post('reservas', [
        'as' => 'admin.reservas.reserva.store',
        'uses' => 'ReservaController@store',
        'middleware' => 'can:reservas.reservas.store'
    ]);
    $router->get('reservas/{reserva}/edit', [
        'as' => 'admin.reservas.reserva.edit',
        'uses' => 'ReservaController@edit',
        'middleware' => 'can:reservas.reservas.edit'
    ]);
    $router->put('reservas/{reserva}', [
        'as' => 'admin.reservas.reserva.update',
        'uses' => 'ReservaController@update',
        'middleware' => 'can:reservas.reservas.update'
    ]);
    $router->delete('reservas/{reserva}', [
        'as' => 'admin.reservas.reserva.destroy',
        'uses' => 'ReservaController@destroy',
        'middleware' => 'can:reservas.reservas.destroy'
    ]);
// append

});

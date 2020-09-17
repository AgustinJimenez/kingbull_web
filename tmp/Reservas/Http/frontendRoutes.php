<?php
use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => '/api/v1'], function (Router $router) {
    $router->get('reservas-all/{user_id}', ['uses' => 'ReservaApiController@allReserva']);
    $router->post('reservas/crear', ['uses' => 'ReservaApiController@createReserva']);
});
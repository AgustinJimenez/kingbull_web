<?php
use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => '/api/v1', 'middleware' => 'verify_user_token'], function (Router $router) 
{
    $router->get('reservas-all', ['uses' => 'ReservaApiController@allReserva']);
    $router->post('reservas/crear', ['uses' => 'ReservaApiController@createReserva']);
    $router->post('reservas/eliminar', ['uses' => 'ReservaApiController@eliminar']);
    $router->get('search_dia', ['uses' => 'ReservaApiController@search_dia']);
});
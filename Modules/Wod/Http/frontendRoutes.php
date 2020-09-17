<?php
use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => '/api/v1', 'middleware' => 'verify_user_token'], function (Router $router) 
{
    $router->get('wod-all', ['uses' => 'WodApiController@index']);
});
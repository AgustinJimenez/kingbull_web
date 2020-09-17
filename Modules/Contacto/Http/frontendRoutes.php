<?php
use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => '/api/v1', 'middleware' => 'verify_user_token'], function (Router $router) 
{
    //$locale = LaravelLocalization::setLocale() ?: App::getLocale();
    $router->get('contacto', ['uses' => 'ContactoApiController@getContacto']);

});

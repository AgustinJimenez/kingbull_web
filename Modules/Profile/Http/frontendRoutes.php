<?php
use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => '/api/v1', 'middleware' => 'verify_user_token'], function (Router $router) 
{

    $router->get('profile-all', ['uses' => 'ProfileApiController@allProfile']);
    $router->get('profile/get', ['uses' => 'ProfileApiController@getProfile']);

    $router->post('profile/update/', ['uses' => 'ProfileApiController@createOrUpdateProfile']);

    $router->post('profile/img/upload', ['uses' => 'ProfileApiController@uploadProfileImg']);
});
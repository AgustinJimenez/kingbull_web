<?php
use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => '/api/v1', 'middleware' => 'verify_user_token'], function (Router $router) 
{
    $router->get('publicaciones-all', ['uses' => 'PublicacionesApiController@allPub']);
    $router->get('misPubclicaciones', ['uses' => 'PublicacionesApiController@misPub']);
    /*$router->get('misPubclicaciones/detalle/{id}', ['uses' => 'PublicacionesApiController@misPubDetalles']);*/
    $router->post('crear/publicaciones', ['uses' => 'PublicacionesApiController@crearPub']);
//    $router->post('update/publicaciones', ['uses' => 'PublicacionesApiController@updatePub']);
    $router->post('uploadImg/publicaciones', ['uses' => 'PublicacionesApiController@uploadImgPub']);

    $router->post('delete/publicaciones',['uses' => 'PublicacionesApiController@delete']);
});
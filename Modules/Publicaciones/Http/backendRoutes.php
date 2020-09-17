<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/publicaciones'], function (Router $router) {
    $router->bind('publicaciones', function ($id) {
        return app('Modules\Publicaciones\Repositories\PublicacionesRepository')->find($id);
    });
    $router->get('publicaciones', [
        'as' => 'admin.publicaciones.publicaciones.index',
        'uses' => 'PublicacionesController@index',
        'middleware' => 'can:publicaciones.publicaciones.index'
    ]);
    $router->get('publicaciones/create', [
        'as' => 'admin.publicaciones.publicaciones.create',
        'uses' => 'PublicacionesController@create',
        'middleware' => 'can:publicaciones.publicaciones.create'
    ]);
    $router->post('publicaciones', [
        'as' => 'admin.publicaciones.publicaciones.store',
        'uses' => 'PublicacionesController@store',
        'middleware' => 'can:publicaciones.publicaciones.store'
    ]);
    $router->get('publicaciones/{publicaciones}/edit', [
        'as' => 'admin.publicaciones.publicaciones.edit',
        'uses' => 'PublicacionesController@edit',
        'middleware' => 'can:publicaciones.publicaciones.edit'
    ]);
    $router->put('publicaciones/{publicaciones}', [
        'as' => 'admin.publicaciones.publicaciones.update',
        'uses' => 'PublicacionesController@update',
        'middleware' => 'can:publicaciones.publicaciones.update'
    ]);
    $router->delete('publicaciones/{publicaciones}', [
        'as' => 'admin.publicaciones.publicaciones.destroy',
        'uses' => 'PublicacionesController@destroy',
        'middleware' => 'can:publicaciones.publicaciones.destroy'
    ]);
// append

});

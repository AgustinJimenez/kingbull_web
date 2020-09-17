<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/noticias'], function (Router $router) {
    $router->bind('noticia', function ($id) {
        return app('Modules\Noticias\Repositories\NoticiaRepository')->find($id);
    });
    $router->get('noticias', [
        'as' => 'admin.noticias.noticia.index',
        'uses' => 'NoticiaController@index',
        'middleware' => 'can:noticias.noticias.index'
    ]);
    $router->get('noticias/create', [
        'as' => 'admin.noticias.noticia.create',
        'uses' => 'NoticiaController@create',
        'middleware' => 'can:noticias.noticias.create'
    ]);
    $router->post('noticias', [
        'as' => 'admin.noticias.noticia.store',
        'uses' => 'NoticiaController@store',
        'middleware' => 'can:noticias.noticias.store'
    ]);
    $router->get('noticias/{noticia}/edit', [
        'as' => 'admin.noticias.noticia.edit',
        'uses' => 'NoticiaController@edit',
        'middleware' => 'can:noticias.noticias.edit'
    ]);
    $router->put('noticias/{noticia}', [
        'as' => 'admin.noticias.noticia.update',
        'uses' => 'NoticiaController@update',
        'middleware' => 'can:noticias.noticias.update'
    ]);
    $router->delete('noticias/{noticia}', [
        'as' => 'admin.noticias.noticia.destroy',
        'uses' => 'NoticiaController@destroy',
        'middleware' => 'can:noticias.noticias.destroy'
    ]);
// append

});

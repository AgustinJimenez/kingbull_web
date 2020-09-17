<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/contacto'], function (Router $router) {
    $router->bind('contacto', function ($id) {
        return app('Modules\Contacto\Repositories\ContactoRepository')->find($id);
    });
    $router->get('contactos', [
        'as' => 'admin.contacto.contacto.index',
        'uses' => 'ContactoController@index',
        'middleware' => 'can:contacto.contactos.index'
    ]);
    $router->get('contactos/create', [
        'as' => 'admin.contacto.contacto.create',
        'uses' => 'ContactoController@create',
        'middleware' => 'can:contacto.contactos.create'
    ]);
    $router->post('contactos', [
        'as' => 'admin.contacto.contacto.store',
        'uses' => 'ContactoController@store',
        'middleware' => 'can:contacto.contactos.store'
    ]);
    $router->get('contactos/{contacto}/edit', [
        'as' => 'admin.contacto.contacto.edit',
        'uses' => 'ContactoController@edit',
        'middleware' => 'can:contacto.contactos.edit'
    ]);
    $router->put('contactos/{contacto}', [
        'as' => 'admin.contacto.contacto.update',
        'uses' => 'ContactoController@update',
        'middleware' => 'can:contacto.contactos.update'
    ]);
    $router->delete('contactos/{contacto}', [
        'as' => 'admin.contacto.contacto.destroy',
        'uses' => 'ContactoController@destroy',
        'middleware' => 'can:contacto.contactos.destroy'
    ]);
// append

});

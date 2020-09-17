<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/wod'], function (Router $router) {
    $router->bind('wod', function ($id) {
        return app('Modules\Wod\Repositories\WodRepository')->find($id);
    });
    $router->get('wods', [
        'as' => 'admin.wod.wod.index',
        'uses' => 'WodController@index',
        'middleware' => 'can:wod.wods.index'
    ]);
    $router->get('wods/create', [
        'as' => 'admin.wod.wod.create',
        'uses' => 'WodController@create',
        'middleware' => 'can:wod.wods.create'
    ]);
    $router->post('wods', [
        'as' => 'admin.wod.wod.store',
        'uses' => 'WodController@store',
        'middleware' => 'can:wod.wods.store'
    ]);
    $router->get('wods/{wod}/edit', [
        'as' => 'admin.wod.wod.edit',
        'uses' => 'WodController@edit',
        'middleware' => 'can:wod.wods.edit'
    ]);
    $router->put('wods/{wod}', [
        'as' => 'admin.wod.wod.update',
        'uses' => 'WodController@update',
        'middleware' => 'can:wod.wods.update'
    ]);
    $router->delete('wods/{wod}', [
        'as' => 'admin.wod.wod.destroy',
        'uses' => 'WodController@destroy',
        'middleware' => 'can:wod.wods.destroy'
    ]);
// append

});

<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/profile'], function (Router $router) {
    $router->bind('profile', function ($id) {
        return app('Modules\Profile\Repositories\ProfileRepository')->find($id);
    });
    $router->get('profiles', [
        'as' => 'admin.profile.profile.index',
        'uses' => 'ProfileController@index',
        'middleware' => 'can:profile.profiles.index'
    ]);
    $router->get('profiles/create', [
        'as' => 'admin.profile.profile.create',
        'uses' => 'ProfileController@create',
        'middleware' => 'can:profile.profiles.create'
    ]);
    $router->post('profiles', [
        'as' => 'admin.profile.profile.store',
        'uses' => 'ProfileController@store',
        'middleware' => 'can:profile.profiles.store'
    ]);
    $router->get('profiles/{profile}/edit', [
        'as' => 'admin.profile.profile.edit',
        'uses' => 'ProfileController@edit',
        'middleware' => 'can:profile.profiles.edit'
    ]);
    $router->put('profiles/{profile}', [
        'as' => 'admin.profile.profile.update',
        'uses' => 'ProfileController@update',
        'middleware' => 'can:profile.profiles.update'
    ]);
    $router->delete('profiles/{profile}', [
        'as' => 'admin.profile.profile.destroy',
        'uses' => 'ProfileController@destroy',
        'middleware' => 'can:profile.profiles.destroy'
    ]);
    
    $router->bind('tipo_usuario', function ($id) 
    {
        return \TipoUsuario::find($id);
    });

    $router->get('tipos_usuarios',
    [
        'as' => 'admin.profile.tipos_usuarios.index',
        'uses' => 'TipoUsuarioController@index',
        'middleware' => 'can:profile.tipos_usuarios.index'
    ]);
    
    $router->get('tipos_usuarios/create', 
    [
        'as' => 'admin.profile.tipos_usuarios.create',
        'uses' => 'TipoUsuarioController@create',
        'middleware' => 'can:profile.tipos_usuarios.create'
    ]);
    $router->post('tipos_usuarios/store', 
    [
        'as' => 'admin.profile.tipos_usuarios.store',
        'uses' => 'TipoUsuarioController@store',
        'middleware' => 'can:profile.tipos_usuarios.store'
    ]);
    $router->put('tipos_usuarios/{tipo_usuario}', 
    [
        'as' => 'admin.profile.tipos_usuarios.update',
        'uses' => 'TipoUsuarioController@update',
        'middleware' => 'can:profile.tipos_usuarios.update'
    ]);
    $router->get('tipos_usuarios/{tipo_usuario}/edit', 
    [
        'as' => 'admin.profile.tipos_usuarios.edit',
        'uses' => 'TipoUsuarioController@edit',
        'middleware' => 'can:profile.tipos_usuarios.edit'
    ]);

    $router->delete('tipos_usuarios/{tipo_usuario}', 
    [
        'as' => 'admin.profile.tipos_usuarios.destroy',
        'uses' => 'TipoUsuarioController@destroy',
        'middleware' => 'can:profile.tipos_usuarios.destroy'
    ]);
});

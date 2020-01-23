<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function() use ($router){
    $router->get('funcionarios', 'FuncionariosController@index');
    $router->get('funcionarios/{id}', 'FuncionariosController@show');
    $router->post('funcionarios', 'FuncionariosController@store');
    $router->put('funcionarios/{id}', 'FuncionariosController@update');
    $router->delete('funcionarios/{id}', 'FuncionariosController@destroy');
});

<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Str; // import library Str
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//Clara Clarita Yung - 215150700111051

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('/register', ['uses'=> 'AuthController@register']);
    $router->post('/login', ['uses'=> 'AuthController@login']); // route login
    });

    $router->get('/mahasiswa', 'MahasiswaController@getMahasiswa');

    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->get('/mahasiswa/profile', 'MahasiswaController@getMahasiswaByToken');
    });

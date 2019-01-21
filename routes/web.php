<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


Route::get('/graphql', 'GraphQLController@query');
Route::post('/graphql', 'GraphQLController@query');
// Route::put('/graphql', 'GraphQLController@mutation');
// Route::delete('/graphql', 'GraphQLController@mutation');


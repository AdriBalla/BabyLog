<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Dingo\Api\Routing\Router;

$api = app(Router::class);

$api->version('v1', function ($api) {

    $api->get('statut', function () {
        return 'Statut API Babylog : OK';
    });

    /**
     * Bébé
     */
    $api->get('bebes/{id}', 'App\Http\Controllers\BebeController@index');
    $api->get('bebes', 'App\Http\Controllers\BebeController@index');
    $api->post('bebes', 'App\Http\Controllers\BebeController@store');
    $api->post('bebes/{id}', 'App\Http\Controllers\BebeController@update');
    $api->delete('bebes/{id}', 'App\Http\Controllers\BebeController@delete');

    /**
     * Biberon
     */

    $api->get('biberons/{id}', 'App\Http\Controllers\BiberonController@show');
    $api->get('biberons', 'App\Http\Controllers\BiberonController@index');


});


#Route::middleware('auth:api')->get('/user', function (Request $request) {
#    return $request->user();
#});

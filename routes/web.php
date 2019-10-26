<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function(){
    Route::get('/filter', array('as' => 'CarInformationRoute', 'uses' => 'CarInformationController@getInformation'));
    Route::get('/carInformation', array('as' => 'DashboardServiceTypesRoute', 'uses' => 'DashboardController@getServicesTypes'));
});

Route::get('/test', function() {
    $crawler = Goutte::request('GET', 'https://duckduckgo.com/html/?q=Laravel');
    $crawler->filter('.result__title .result__a')->each(function ($node) {
      dump($node->text());
    });
    return view('welcome');
});

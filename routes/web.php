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
$app_url = config('app.url');
$domain = str_replace(':', '', parse_url($app_url)['host']);
$tenantParam = config('tenant.route_param');

Route::domain("{{$tenantParam}}.$domain")->group(function(){

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('category', 'CategoryController')->except([
        'update'
    ]);

    Route::post('/category/{category}', 'CategoryController@update')->name('category.update');
});

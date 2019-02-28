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

$app_url = config('app.url');
$domain = str_replace(':', '', parse_url($app_url)['host']);
$tenantParam = config('tenant.route_param');

Route::domain("{{$tenantParam}}.$domain")
    ->middleware('tenant')
    ->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('/admin')
        ->middleware('auth:web')
        ->group(function(){
            Route::get('/', function () {
                return view('welcome');
            });
            Route::get('/home', 'HomeController@index')->name('home');
        });

    Route::prefix('/app')
    ->middleware('auth:web_tenant')
    ->group(function(){
        Route::resource('category', 'CategoryController')->except([
            'update'
        ]);

        Route::post('/category/{category}', 'CategoryController@update')->name('category.update');
    });
});

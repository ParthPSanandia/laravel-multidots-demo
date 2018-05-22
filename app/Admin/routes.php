<?php

use Illuminate\Routing\Router;

//Admin::registerAuthRoutes();

Route::group(['namespace' => config('admin.route.namespace'), 'prefix' => config('admin.route.prefix')], function () {
    Route::get('/demo', function () {
        return 'hello';
    });
    Route::get('/test', 'TestController@index');
    Route::get('/home', 'HomeController@index');
});

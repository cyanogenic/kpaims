<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('brands', 'BrandController');
    $router->resource('chips', 'ChipController');
    $router->resource('distros', 'DistributionController');
    $router->resource('types', 'TypeController');
    $router->resource('peripherals', 'PeripheralController');
    $router->resource('solutions', 'SolutionController');

});

<?php

use App\Admin\Controllers\AnnouncementController;
use App\Admin\Controllers\BannerController;
use App\Admin\Controllers\UserController;
use Dcat\Admin\Admin;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('announcements', AnnouncementController::class);
    $router->resource('banners', BannerController::class);
    $router->resource('users', UserController::class);
});

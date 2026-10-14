<?php
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
use App\Services\Route;
// home page
Route::get('', 'HomeController', 'index');

//admin routes
Route::get('admin', 'AdminController', 'index', [AuthMiddleware::class]);
Route::get('login', 'AuthController', 'loginView', [GuestMiddleware::class]);
Route::post('login', 'AuthController', 'login', [GuestMiddleware::class]);
Route::get('signup', 'AuthController', 'signupView', [GuestMiddleware::class]);
Route::post('signup', 'AuthController', 'signup', [GuestMiddleware::class]);
//services routes;
Route::get('load-services-paginate', 'ServiceController', 'loadServicePaginate',[AuthMiddleware::class]);
Route::get('service-modal', 'ServiceController', 'serviceModal', [AuthMiddleware::class]);
Route::post('store-service', 'ServiceController', 'store', [AuthMiddleware::class]);
Route::post('update-service', 'ServiceController', 'update', [AuthMiddleware::class]);
Route::post('delete-service', 'ServiceController', 'delete', [AuthMiddleware::class]);
Route::post('change-service-status', 'ServiceController', 'changeServiceStatus', [AuthMiddleware::class]);
//products routes;
Route::get('load-products-paginate', 'ProductController', 'loadProductPaginate',[AuthMiddleware::class]);
Route::get('product-modal', 'ProductController', 'productModal', [AuthMiddleware::class]);
Route::post('store-product', 'ProductController', 'store', [AuthMiddleware::class]);
Route::post('update-product', 'ProductController', 'update', [AuthMiddleware::class]);
Route::post('delete-product', 'ProductController', 'delete', [AuthMiddleware::class]);
Route::post('change-product-status', 'ProductController', 'changeProductStatus', [AuthMiddleware::class]);

//projects routes;
Route::get('load-projects-paginate', 'ProjectController', 'loadProjectPaginate',[AuthMiddleware::class]);
Route::get('project-modal', 'ProjectController', 'projectModal', [AuthMiddleware::class]);
Route::post('store-project', 'ProjectController', 'store', [AuthMiddleware::class]);
Route::post('update-project', 'ProjectController', 'update', [AuthMiddleware::class]);
Route::post('delete-project', 'ProjectController', 'delete', [AuthMiddleware::class]);
Route::post('change-project-status', 'ProjectController', 'changeProjectStatus', [AuthMiddleware::class]);
Route::post('update-row-order', 'AdminController', 'updateRowOrder', [AuthMiddleware::class]);

//default page
Route::get('about', 'HomeController', 'about');
Route::get('services', 'HomeController', 'services');
Route::get('products', 'HomeController', 'products');
Route::get('projects', 'HomeController', 'projects');
Route::get('academy', 'HomeController', 'academy');
Route::get('doctors', 'HomeController', 'doctors');
Route::get('support', 'HomeController', 'support');
Route::get('gallery', 'HomeController', 'gallery');
Route::get('terms', 'HomeController', 'terms');
Route::get('privacy', 'HomeController', 'privacy');
Route::get('contact', 'HomeController', 'contact');
Route::get('cookie', 'HomeController', 'cookie');
Route::get('404', 'HomeController', 'notFound');
Route::get('503', 'HomeController', 'accessDeined');
Route::post('logout', 'HomeController', 'logout', [AuthMiddleware::class]);
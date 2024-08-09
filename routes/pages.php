<?php

namespace Routes;

use App\Application\Router\Route;
use App\Middleware\AuthMiddleware;
use App\Controllers\PagesController;
use App\Middleware\NotAuthMiddleware;
use App\Middleware\RedirectMiddleware;
use App\Middleware\PaginationMiddleware;

Route::dynamic("/home/{page}", PagesController::class, 'home', PaginationMiddleware::class);
Route::page("/home", PagesController::class, 'home', RedirectMiddleware::class);
Route::dynamic("/post/{id}", PagesController::class, 'detail');
Route::dynamic("/post/edit/{id}", PagesController::class, 'edit');
Route::page("/post", PagesController::class, 'post', NotAuthMiddleware::class);
Route::page('/login', PagesController::class, 'login', AuthMiddleware::class);
Route::page('/register', PagesController::class, 'register', AuthMiddleware::class);

<?php

namespace Routes;

use App\Application\Router\Route;
use App\Controllers\PostController;
use App\Controllers\UserController;
use App\Middleware\NotAuthMiddleware;
use App\Controllers\CommentController;

Route::post("/post", PostController::class, 'submit', NotAuthMiddleware::class);
Route::post("/update", PostController::class, 'update', NotAuthMiddleware::class);
Route::post("/comment", CommentController::class, 'submit', NotAuthMiddleware::class);
Route::post('/register', UserController::class, 'register');
Route::post('/login', UserController::class, 'login');
Route::post('/logout', UserController::class, 'logout');

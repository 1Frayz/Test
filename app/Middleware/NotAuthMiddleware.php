<?php

namespace App\Middleware;

use App\Application\Middleware\Middleware;
use App\Application\Auth\Auth;
use App\Application\Router\Redirect;

class NotAuthMiddleware extends Middleware
{
    public function handle()
    {
        if (!Auth::check()) {
            Redirect::to("/login");
            die();
        }
    }
}

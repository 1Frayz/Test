<?php

namespace App\Middleware;

use App\Application\Middleware\Middleware;
use App\Application\Auth\Auth;
use App\Application\Router\Redirect;

class RedirectMiddleware extends Middleware
{
    public function handle()
    {
        Redirect::to("/home/1");
        die();
    }
}
